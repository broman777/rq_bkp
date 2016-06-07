<?php if (!defined('ABSPATH')){exit;} ?>

<?php
$title = get_the_title();
$logo = get_field('logo');
?>

<div class="item">
    <div class="info">
        <div class="cell">
            <div class="in">
                <?php if(is_array($logo) && count($logo)): ?>
                    <img src='<?php echo $logo['sizes']['600x0']; ?>' alt='<?php echo $title; ?>'>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>