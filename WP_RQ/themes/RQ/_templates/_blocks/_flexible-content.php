<?php
$title = get_the_title();
$content = get_field('content');
?>

<?php if(is_array($content) && count($content)): ?>
    <?php foreach($content as $col): ?>
        <?php if($col['acf_fc_layout']=='block_1'): // одна колонка ?>
            <div class="text">
                <?php foreach($col['col'] as $el): ?>
                    <?php if($el['acf_fc_layout']=='h3'): ?>
                        <h3><?php echo $el['text']; ?></h3>
                    <?php elseif($el['acf_fc_layout']=='h4'): ?>
                        <h4><?php echo $el['text']; ?></h4>
                    <?php elseif($el['acf_fc_layout']=='p'): ?>
                        <p><?php echo $el['text']; ?></p>
                    <?php elseif($el['acf_fc_layout']=='quote'): ?>
                        <blockquote><?php echo $el['text']; ?></blockquote>
                    <?php elseif($el['acf_fc_layout']=='img'): ?>
                        <img src="<?php echo $el['img']['sizes']['large']; ?>" alt='<?php echo $title; ?>'>
                    <?php elseif($el['acf_fc_layout']=='ul'): ?>
                        <ul>
                            <?php $items = explode('<br />', $el['list']); foreach($items as $item): ?>
                                <li><?php echo $item; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php elseif($el['acf_fc_layout']=='ol'): ?>
                        <ol>
                            <?php $items = explode('<br />', $el['list']); foreach($items as $item): ?>
                                <li><?php echo $item; ?></li>
                            <?php endforeach; ?>
                        </ol>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        <?php elseif($col['acf_fc_layout']=='block_2'): // две колонки ?>
            <div class="text">
                <div class="col">
                    <?php foreach($col['left_col'] as $el): ?>
                        <?php if($el['acf_fc_layout']=='h3'): ?>
                            <h3><?php echo $el['text']; ?></h3>
                        <?php elseif($el['acf_fc_layout']=='h4'): ?>
                            <h4><?php echo $el['text']; ?></h4>
                        <?php elseif($el['acf_fc_layout']=='p'): ?>
                            <p><?php echo $el['text']; ?></p>
                        <?php elseif($el['acf_fc_layout']=='quote'): ?>
                            <blockquote><?php echo $el['text']; ?></blockquote>
                        <?php elseif($el['acf_fc_layout']=='img'): ?>
                            <img src="<?php echo $el['img']['sizes']['600x0']; ?>" alt='<?php echo $title; ?>'>
                        <?php elseif($el['acf_fc_layout']=='ul'): ?>
                            <ul>
                                <?php $items = explode('<br />', $el['list']); foreach($items as $item): ?>
                                    <li><?php echo $item; ?></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php elseif($el['acf_fc_layout']=='ol'): ?>
                            <ol>
                                <?php $items = explode('<br />', $el['list']); foreach($items as $item): ?>
                                    <li><?php echo $item; ?></li>
                                <?php endforeach; ?>
                            </ol>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
                <div class="col">
                    <?php foreach($col['right_col'] as $el): ?>
                        <?php if($el['acf_fc_layout']=='h3'): ?>
                            <h3><?php echo $el['text']; ?></h3>
                        <?php elseif($el['acf_fc_layout']=='h4'): ?>
                            <h4><?php echo $el['text']; ?></h4>
                        <?php elseif($el['acf_fc_layout']=='p'): ?>
                            <p><?php echo $el['text']; ?></p>
                        <?php elseif($el['acf_fc_layout']=='quote'): ?>
                            <blockquote><?php echo $el['text']; ?></blockquote>
                        <?php elseif($el['acf_fc_layout']=='img'): ?>
                            <img src="<?php echo $el['img']['sizes']['600x0']; ?>" alt='<?php echo $title; ?>'>
                        <?php elseif($el['acf_fc_layout']=='ul'): ?>
                            <ul>
                                <?php $items = explode('<br />', $el['list']); foreach($items as $item): ?>
                                    <li><?php echo $item; ?></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php elseif($el['acf_fc_layout']=='ol'): ?>
                            <ol>
                                <?php $items = explode('<br />', $el['list']); foreach($items as $item): ?>
                                    <li><?php echo $item; ?></li>
                                <?php endforeach; ?>
                            </ol>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>
<?php endif; ?>