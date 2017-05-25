<?php

// Als aanmelden noodzakelijk is...
if ( post_password_required() ) {
    return;
}

if ( have_comments() ) :
    //Is er commentaar aan wezig... dan doen we het volgende...
?>
    <h2>
        <?php get_the_title(); ?>
    </h2>
    <?php the_comments_navigation(); ?>

    <ol>
        <?php
        wp_list_comments( array(
            'style'       => 'ol',
            'short_ping'  => true,
            'avatar_size' => 42,
        ) );
        ?>
    </ol>

    <?php the_comments_navigation(); ?>

<?php endif; ?>

<?php
// Als het niet is toegestaan om commentaar te geven, dan tonen we een kleine boodschap...
if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
    ?>
    <p class="no-comments"><?php _e( 'Niet mogelijk om commentaar te geven.', 'mytheme' ); ?></p>
<?php endif; ?>

<?php
comment_form( array(
    'title_reply_before' => '<h2>',
    'title_reply_after'  => '</h2>',
) );