<?php if (!defined('ABSPATH')){exit;} ?>

<?php
$title = get_the_title();

$day = get_the_time('d');
$month = get_the_time('F');
$year = get_the_time('Y');

$main_img = get_field('main_img');
$description = get_field('description');
?>

<li class="animated">
    <div class="text">
        <div class="cell">
            <div class="in">
                <p class="header"><?php echo $title; ?></p>
                <?php if($description): ?><p><?php echo $description; ?></p><?php endif; ?>
                <a href="<?php the_permalink(); ?>" class="more btn"><?php echo __('Read more', 'RQ'); ?></a>
            </div>
        </div>
        <span class="day"><?php echo $day; ?></span>
    </div>
    <div class="img"<?php if(is_array($main_img) && count($main_img)): ?> style="background-image: url('<?php echo $main_img['sizes']['585x440']; ?>')"<?php endif; ?>>
        <div class="month"><?php echo $month; ?> / <?php echo $year; ?></div>
    </div>
</li>