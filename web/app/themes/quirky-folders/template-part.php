


<?php

// You wish to make $posts var available to the template part at `content-part.php`
set_query_var( 'posts', get_latest_posts() );
get_template_part( 'content', 'part' );







