<?php get_header(); ?>
<div class="container">
category test template
    <?php 
        if(have_posts()) 
        {
            while(have_posts())
            {
                the_post();
                //GEEF DE TITEL EN DE CONTENT VAN DE POST WEER
               ?>
             <h1>TITEL:  <?php the_title();?></h1>
                <?php the_content();
            }
        }
        else
        {   //INDIEN ER GEEN POST / CONTENT IS ECHO ...
            echo 'No content available';
        }
    ?>
</div><!--/. container -->
<?php get_footer(); ?>