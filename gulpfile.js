var gulp = require('gulp'),
    sass = require('gulp-sass'),
    watch = require('gulp-watch'),
    rigger = require('gulp-rigger'),
    neat = require('node-neat').includePaths,
    browserSync = require("browser-sync"),
    reload = browserSync.reload; 

function swallowError (error) {
    console.log(error.toString());
    this.emit('end');
}

var path = {
    build: { //Тут мы укажем куда складывать готовые после сборки файлы
        html: 'web/',
        css: 'web/css/',
        js: 'web/js/'
    },
    src: { //Пути откуда брать исходники
        html: 'src/*.html',
        style: 'src/css/style.scss'
    },
    watch: { //Тут мы укажем, за изменением каких файлов мы хотим наблюдать
        html: 'src/**/*.html',
        style: 'src/css/**/*.scss',
        js: 'web/js/**/*.js',
    }
};
var config = {
    server: {baseDir: "./web"},
    tunnel: false,
    host: 'localhost',
    port: 9000,
    logPrefix: "Frontend"
};

gulp.task('html:build', function () {
    gulp.src(path.src.html)
	.pipe(rigger())
    .pipe(gulp.dest(path.build.html))
    .pipe(reload({stream: true})); //И перезагрузим наш сервер для обновлений
});
gulp.task('style:build', function () {
    gulp.src(path.src.style)
    .pipe(sass({
         includePaths: ['style:build'].concat(neat)
    })).on('error', swallowError)
    .pipe(gulp.dest(path.build.css))
    .pipe(reload({stream: true}));
});

gulp.task('build', [
    'html:build',
    'style:build'
]);

gulp.task('webserver', function () {
    browserSync(config);
    gulp.watch('index.html').on('change', browserSync.reload);
});

gulp.task('watch', function(){
    watch([path.watch.html], function(event, cb) {
        gulp.start('html:build');
    });
    watch([path.watch.style], function(event, cb) {
        gulp.start('style:build');
    });
    watch([path.watch.js], function(event, cb) {
        gulp.src(path.watch.js).pipe(browserSync.stream())
    });
});
gulp.on('err', function(err){
  console.log(err);
});
gulp.task('default', ['build', 'webserver', 'watch']);