<?php
$taller_id = get_field('select-item');
if (is_array($taller_id)) {
    $taller_id = $taller_id[0] ?? null;
}

if ($taller_id) :
    $taller = get_post($taller_id);
    $title = get_the_title($taller_id);
    $permalink = get_permalink($taller_id);
    $thumbnail = get_the_post_thumbnail_url($taller_id, 'full');
?>
    <section class="s-taller--block">
        <?php if ($thumbnail): ?>
            <div class="s-taller--block---thumb" style="background-image: url('<?= esc_url($thumbnail); ?>');"></div>
        <?php endif; ?>
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="s-taller--block---text">
                        <span class="h6"><?= esc_html__('Taller', 'bootscore-child'); ?></span>
                        <h3 class="bloque-taller__title"><?= esc_html($title); ?></h3>
                        <a href="<?= esc_url($permalink); ?>" class="btn btn-outline-secondary"><?= __('Ver taller', 'bootscore-child'); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php else: ?>
    <p><?= __('Selecciona un taller para mostrar.', 'bootscore-child'); ?></p>
<?php endif; ?>