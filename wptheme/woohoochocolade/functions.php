<?php

//SCRIPTS EN CSS TOEVOEGEN
function add_theme_scripts() {
 
 //EERST BOOTSTRAP / FONTAWESOME CSS BINNEHALEN MET GET_TEMPLATE_URL
  wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/bootstrap/css/bootstrap.min.css', array(), '1.1', 'all');
  wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/font-awesome/css/font-awesome.css', array(), '1.1', 'all');
  //TWEDES MIJN EIGEN STYLE.CSS BINNENHALEN
  wp_enqueue_style( 'style', get_stylesheet_uri() );
 
 //SCRIPT JS TOEVOEGEN, EERST JQUERY DAN DE BOOTSTRAP.JS DIE WERKT MET JQUERY-LIBRARY
  wp_enqueue_script( 'script', get_template_directory_uri() . '/js/jquery.easing.1.3.js', array ( 'jquery' ), 1.1, true);
  wp_enqueue_script( 'script', get_template_directory_uri() . '/bootstrap/js/bootstrap.min.js', array ( 'jquery' ), 1.1, true);
 
}
add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );

function wpb_custom_new_menu() {
  register_nav_menus(array(
      'my-custom-menu' => __( 'Main_NL' ),
      'secondary' => __( 'Footer Menu' ),
      'tertiary' => __( 'Social Media Menu' )
    )
  );
}
add_action( 'init', 'wpb_custom_new_menu' );


function add_sidebar(){
  register_sidebar();
}
add_action( 'after_setup_theme', 'add_sidebar' );

//custom logo
function custom_logo_added() {
    $args = array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => array( 'site-title', 'site-description' ),
    );
    add_theme_support( 'custom-logo', $args );
}
add_action( 'after_setup_theme', 'custom_logo_added' );


function mytheme_setup() {
    add_image_size('mytheme-logo', 160, 90);
    add_theme_support('custom-logo', array(
    'size' => 'mytheme-logo'
));
}

add_action('after_setup_theme', 'mytheme_setup');

//CUSTOM POSTTYPE RECEPTEN AANMAKEN
function add_my_custom_posttype_recepten(){
  //LABELS DIFINIËREN
    $labels = array(
        'add_new' => 'Voeg nieuw recept toe',
        'add_new_item' => 'Voeg nieuw recept toe',
        'name' => 'Recepten',
        'singular_name' => 'Recept',
    );
  //ARGUMENTEN DIFINIËREN
	$args = array(
		'labels' => $labels, // de array labels van hier boven linken aan het argument labels
		'Description' => 'Recepten zonder stevia',
		'public' => true,
		'menu_position' => 5,
		'menu_icon' => 'dashicons-welcome-add-page', //Een icoon kiezen
		'supports' => array('title', 'editor'), // Toon enkel de titel als invoermogelijkheid. Tekst (editor) is voor de feature niet nodig.
    'has_archive' => true, //Maak een archief aan (opsomming van alle elementen), anders gaan we archive-recepten.php nooit kunnen aanspreken.
	);
	register_post_type( 'recepten', $args ); 
}
add_action( 'init', 'add_my_custom_posttype_recepten' );

//TAXONOMY AANMAKEN (een extra onderverdeling, zoals categorie)
function my_tax_recept_verdeling(){
	$labels = array(
		'name' => 'Types chocolade',
		'singular_name' => 'Type chocolade',
		'add_new_item' => 'Nieuw type toevoegen',
		'add_new' => 'Nieuw',
	);
	$args = array(
		'labels' => $labels,
		'hierarchical' => true,
	);
	register_taxonomy( 'type', 'recepten', $args );
}
//BIJ HET INITIALIZEREN DE FUNCTIE UITVOEREN
add_action('init', 'my_tax_recept_verdeling', 0);

function register_sidebar_locations() {
    /* Register the 'primary' sidebar. */
    register_sidebar(
        array(
            'id'            => 'blog-sidebar',
            'name'          => __( 'Blog Sidebar' ),
            'description'   => __( 'sidebar op blog' ),
            
        )
    );
        register_sidebar(
        array(
            'id'            => 'recept-sidebar',
            'name'          => __( 'Recept Sidebar' ),
            'description'   => __( 'sidebar op recepten pagina' ),
           
        )
    );
    register_sidebar(
        array(
            'id'            => 'footer',
            'name'          => __( 'Footer' ),
            'description'   => __( 'sidebar in footer' ),
           
        )
    );
    /* Repeat register_sidebar() code for additional sidebars. */
}
add_action( 'widgets_init', 'register_sidebar_locations' );

function dwwp_add_custom_meta() {
    add_meta_box(
      'dwwp_meta',
      'Schrijvers',
      'dwwp_meta_callback',
      'recepten',
      'side',
      'high'
    );
}
add_action( 'add_meta_boxes', 'dwwp_add_custom_meta' );

function dwwp_meta_callback($post){
    wp_nonce_field(basename (__FILE__), 'dwwp_recept_nonce');
    $dwwp_stored_meta = get_post_meta ($post->ID);
?>
    <div class="meta-row">
			<div class="meta-th">
				<label for="naam" class="dwwp-row-title">Naam</label>
			</div>
			<div class="meta-td">
				<input type="text" name="naam" id="naam" value="<?php if ( ! empty ( $dwwp_stored_meta['naam'] ) ) {
					echo esc_attr( $dwwp_stored_meta['naam'][0] );
				} ?>"/>
			</div>
		</div>
<?php
       
}
function dwwp_meta_save($post_id){
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'dwwp_recept_nonce' ] ) && wp_verify_nonce( $_POST[ 'dwwp_recept_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
    
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }
    if(isset($_POST['naam'])){
        update_post_meta($post_id, 'naam', sanitize_text_field($_POST['naam']));
    }
}
add_action('save_post', 'dwwp_meta_save');
?>
