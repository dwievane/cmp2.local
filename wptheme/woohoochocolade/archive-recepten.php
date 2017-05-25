<?php get_header(); ?>
    <div class="container">
    <h1 class="text-center">- Recepten -</h1>
        <?php dynamic_sidebar('recept-sidebar'); ?>
    <?php
        if(have_posts()) 
        {
            while(have_posts())
            {
            ?>
            <div class="row">
                <div class="recepten_item-tekst col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <?php
                    the_post();
                    //GEEF DE TITEL EN DE CONTENT VAN DE POST WEER
                    get_template_part( 'partials/sub_title');
                    the_content();

                    $typeschocolade = get_the_terms(get_the_ID(), 'type');
                    //var_dump($typechocolade);
                    foreach($typeschocolade as $type){
                    //var_dump($type);
                    echo "<em>Type chocolade: ".$type->name . "</em>";
                    //echo $type->name ." (" . $type->slug  . "), "; inclusief de slug naam
                    //printf( '<pre>%s</pre>', var_export( get_post_custom( get_the_ID() ), true ) );
                    ?>
                    <p class="text-right">Schrijver:
                    <?php
                    echo get_post_meta( get_the_ID(),'naam', true);?></p>
                </div>
            </div>
            <?php
            }
            }
        }
        else
        {   //INDIEN ER GEEN POST / CONTENT IS ECHO ...
            echo 'No content available';
        }
    ?>
</div><!--/. container -->

<?php get_footer(); ?>