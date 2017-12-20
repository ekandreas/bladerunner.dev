

    <?php
    get_header();
    ?>

        <div class="page-header">
            <h1>HOME</h1>
        </div>

        <?php
        get_template_part('templates/jumbo');
        ?>

        <?php
        set_query_var('loop_small_posts', model_post_latest('post', 20));
        get_template_part('templates/loop-small-posts');
        ?>


<?php
    echo controller_loop_small_posts([
            'max' => 5,
            'post_type' => 'post',
    ]);




    ?>





    <?php
    get_footer();

MvcRouter::public_connect('posts/{:id:[\d]+}.*', [
    'controller' => 'post_controller', 'action' => 'show'
]);


