
    <?php

    if ($pages = get_query_var('latest_pages')) {

        ?>
        <h3 class="display-5">
            Pages
        </h3>
        <?php

        foreach ($pages as $item) {
            set_query_var('selected_post', $item);
            get_template_part('templates/post-small');
        }

    }





