

    <?php

    get_header();

    get_template_part('templates/post');

    ?>
        <hr class="mt-5" />
        <?=do_shortcode('[loop_small_posts max="3"]')?>
    <?php

    get_footer();






