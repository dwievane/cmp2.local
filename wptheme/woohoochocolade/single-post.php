<?php get_header(); ?>
<div class="container">
    <?php 
        if(have_posts()) 
        {
            while(have_posts())
            {
                the_post();
                //GEEF DE TITEL EN DE CONTENT VAN DE POST WEER
                ?>
                <?php get_template_part( 'partials/title_blog');
                get_template_part( 'partials/content_blog');
                echo get_the_date("Y-m-d");
                echo get_post_meta( get_the_ID(), 'my-info', true );
                //comments toevoegen
                comments_template();
            }
        }
        else
        {   //INDIEN ER GEEN POST / CONTENT IS ECHO ...
            echo 'No content available';
        }
    ?>
</div><!--/. container -->
<?php get_footer(); ?>