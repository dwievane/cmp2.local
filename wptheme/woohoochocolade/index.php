<?php /* Template Name: index.php temp */ ?>

<?php get_header(); ?>

<div class="container">
    <?php 
        if(have_posts()) 
        {
            while(have_posts())
            {
                the_post();
                //GEEF DE TITEL EN DE CONTENT VAN DE POST WEER
                get_template_part( 'partials/title');
                the_content();
            }
        }
        else
        {   //INDIEN ER GEEN POST / CONTENT IS ECHO ...
            echo 'No content available';
        }
    ?>
</div><!--/. container -->
<?php get_footer(); ?>