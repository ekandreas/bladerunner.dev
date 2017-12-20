
    <?php

    if ($loop_small_posts = get_query_var('loop_small_posts')) {

        ?>
        <h3 class="display-5">
            Latest Posts
        </h3>
        <?php

        foreach ($loop_small_posts as $item) {
            set_query_var('selected_post', $item);
            get_template_part('templates/post-small');
        }

    }





