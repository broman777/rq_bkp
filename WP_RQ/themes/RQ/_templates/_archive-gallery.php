<?php if (!defined('ABSPATH')){exit;} ?>

<?php
$type = get_field('type');
$img = get_field('img');
$video_code = get_field('video_code');
?>

<div class="bg"<?php if(is_array($img) && count($img)): ?> style="background-image:url('<?php echo $img['sizes']['430x320']; ?>')"<?php endif; ?>>
    <?php if($type==8): // видео ?>
        <?php if($video_code): ?><a href="http://www.youtube.com/v/<?php echo $video_code; ?>?fs=1&amp;autoplay=1" class="various fancybox.iframe"></a><?php endif; ?>
    <?php elseif($type==7): // фото ?>
        <?php if(is_array($img) && count($img)): ?><a href="<?php echo $img['sizes']['large']; ?>" class="fancy" rel="gal"></a><?php endif; ?>
    <?php endif; ?>
</div>