<div class="col-lg-3 order-first order-lg-2">
    <aside id="secondary" class="widget-area widget-area-sticky">
        <?php
        $content = get_field('taller_sidebar_content', get_the_ID());
        if ($content) {
            echo apply_filters('the_content', $content);
        }
        dynamic_sidebar('sidebar-talleres');
        ?>
    </aside>
</div>