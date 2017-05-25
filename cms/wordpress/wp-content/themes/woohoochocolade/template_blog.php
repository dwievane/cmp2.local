<?php /* Template Name: Template Blog Sidebar */ ?>
<?php get_header(); ?>
<div class="container">
    <?php 
        if(have_posts()) 
        {
            while(have_posts())
            {
                the_post();

                //GEEF DE TITEL EN DE CONTENT VAN DE POST WEER
                get_template_part( 'partials/title');?>
                <div id="wrapper">
                    <div id="sidebar-wrapper">
                        <div class="sidebar-content">
                            <?php dynamic_sidebar('blog-sidebar'); ?>
                        </div>
                    </div>
                    
                    <div id="page-content-wrapper">
                        <div class="page-content">
                            <div class="container">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-7  col-md-8 col-lg-9">
                                        <?php
                                            // the query
                                            $wpb_all_query = new WP_Query(array('post_type'=>'post', 'post_status'=>'publish', 'posts_per_page'=>-1)); ?>
                                            <?php if ( $wpb_all_query->have_posts() ) : ?>
                                                <!-- the loop -->
                                                <?php while ( $wpb_all_query->have_posts() ) : $wpb_all_query->the_post(); ?>
                                                    <div class="blog_item">
                                                        <p class="text-left"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
                                                        <p class="text-right blog_datum"><?php echo get_the_date("Y-m-d"); ?></p>
                                                        <p class="text-right blog_auteur">Auteur: <?php echo get_the_author(); ?></p>
                                                        <p class="blog_bericht">Bericht: <?php echo get_the_content(); ?></p>
                                                    </div>
                                                <?php endwhile; ?>
                                                <!-- end of the loop -->
                                                <?php wp_reset_postdata(); ?>
                                            <?php else : ?>
                                                <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
                                            <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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