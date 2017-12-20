
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <title><?=wp_title()?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <link rel="stylesheet" href="<?=get_stylesheet_directory_uri()?>/assets/style.css" media="screen">
        <?php wp_head() ?>
    </head>
    <body <?=body_class()?>>

    <?php
        get_template_part('templates/nav');
    ?>

    <div class="container pt-5 mt-5">



