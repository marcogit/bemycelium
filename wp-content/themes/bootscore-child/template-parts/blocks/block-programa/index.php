<?php
$items = get_field('link_pro_item');

if (!empty($items)) : ?>
    <div class="programs-block">
        <?php foreach ($items as $item) : ?>
            <div class="programs-block--item">
                <a href="<?= esc_url($item['link_pro_item_url']) ?>" class="programs-block--item-link" target="<?= esc_attr($item['link_pro_item_target']) ?>" rel="<?= esc_attr($item['link_pro_item_rel']) ?>">
                    <?php if (!empty($item['link_pro_item_img'])) :
                        $thumb = wp_get_attachment_image_src($item['link_pro_item_img'], 'thumbnail');
                        if ($thumb): ?>
                            <img src="<?= esc_url($thumb[0]) ?>" alt="<?= esc_attr($item['link_pro_item_title']) ?>" class="programa-img" />
                        <?php endif; ?>
                    <?php endif; ?>

                    <div class="programs-block--item-link---content">
                        <?php if (!empty($item['link_pro_item_pre'])) : ?>
                            <span class="program-pretitle"><?= esc_html($item['link_pro_item_pre']) ?></span>
                        <?php endif; ?>

                        <?php if (!empty($item['link_pro_item_title'])) : ?>
                            <span class="program-title"><?= esc_html($item['link_pro_item_title']) ?></span>
                        <?php endif; ?>

                        <?php if (!empty($item['link_pro_item_text'])) : ?>
                            <p class="program-description"><?= esc_html($item['link_pro_item_text']) ?></p>
                        <?php endif; ?>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>