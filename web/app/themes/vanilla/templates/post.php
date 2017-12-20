

    <?php the_post(); ?>

    <div class="page-header">
        <h1 class="display-1"><?=the_title()?></h1>
    </div>

    <?=apply_filters('the_content', get_the_content())?>





