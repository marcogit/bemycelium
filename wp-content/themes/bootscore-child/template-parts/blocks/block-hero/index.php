<?php
$slides = get_field('hero_slides');
if ($slides):
?>
    <section class="s-hero-banner">
        <nav class="hero-banner__menu">
            <ul>
                <?php foreach ($slides as $i => $slide): ?>
                    <li>
                        <a href="#hero-slide-<?= $i; ?>"><?= esc_html($slide['titulo']); ?></a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </nav>
        <div class="hero-banner__images">
            <?php foreach ($slides as $i => $slide): ?>
                <?php if (!empty($slide['imagen'])): ?>
                    <div class="hero-banner__image<?= $i === 0 ? ' active' : ''; ?>" data-slide="<?= $i; ?>">
                        <?= wp_get_attachment_image($slide['imagen'], 'full'); ?>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
        <div class="hero-banner__slides">
            <?php foreach ($slides as $i => $slide): ?>
                <div class="hero-banner__slide" id="hero-slide-<?= $i; ?>">

                    <div class="hero-banner__content container">

                        <div class="row">
                            <div class="col-xxl-5 col-lg-6">
                                <div class="hero-banner__content---text">
                                    <?php if (!empty($slide['titulo'])): ?>
                                        <h2 class="hero-banner__title"><?= esc_html($slide['titulo']); ?></h2>
                                    <?php endif; ?>
                                    <?php if (!empty($slide['subtitulo'])): ?>
                                        <span class="hero-banner__subtitle h5"><?= esc_html($slide['subtitulo']); ?></span>
                                    <?php endif; ?>
                                    <?php if (!empty($slide['descripcion'])): ?>
                                        <p class="hero-banner__desc"><?= esc_html($slide['descripcion']); ?></p>
                                    <?php endif; ?>
                                    <?php if (!empty($slide['link'])): ?>
                                        <a href="<?= esc_url($slide['link']['url']); ?>"
                                            class="hero-banner__link btn btn-outline-light"
                                            <?php if (!empty($slide['link']['target'])): ?> target="<?= esc_attr($slide['link']['target']); ?>" <?php endif; ?>>
                                            <?= esc_html($slide['link']['title']); ?>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
<?php endif; ?>