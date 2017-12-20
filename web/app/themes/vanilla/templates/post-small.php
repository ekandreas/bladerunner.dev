

    <?php

    $selected_post = get_query_var('selected_post');

    setup_postdata($GLOBALS['post'] =& $selected_post);
    ?>

    <div class="mb-5">

        <h2 class="display-4">
            <?= get_the_title() ?>
        </h2>

        <small class="text-muted">
            <?= get_the_date('Y-m-d') ?>
        </small>

        <p class="lead"><?= get_the_excerpt() ?></p>

        <a href="<?= get_the_permalink() ?>" class="btn btn-info">
            Read more
        </a>

    </div>




