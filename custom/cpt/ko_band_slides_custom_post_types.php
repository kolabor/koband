<?php
/**
 * Koband Slides custom post type and metabox creation file!
 *
 *
 * @package Wordpress 
 * @subpackage Koband
 * @since Koband 1.0
 */

$args = array(
    'labels'  =>  array(
    'menu_name' => 'Slides',
    ),  
    'capabilities'  =>  array(
            'capability_type' => 'posts',
            'create_posts' => 'do_not_allow',
    ),    
    'map_meta_cap' => true, 
    'menu_position' => 4,
    'public'    =>  true
);

//Custom post type function

function ko_band_register_slides() {

  $label = array(
    'name' => 'Slides',
    'singular_name' => 'Slides',
    'add_new' => 'Add Slide',
    'all_items' => 'All Slides',
    'add_new_item' => 'Add Slides',
    'edit_item' => 'Edit Slides',
    'new_item' => 'New Slides',
    'view_item' => 'View Slides',
    'search_item' => 'Search Slides',
    'not_found' => 'No Slides Found',
    'not-found_in_trash' => 'No Slides Found in Trash',
    'parent_item_colon' => 'Parent Slides'
    );
  
  $args = array(
    'menu_icon' => 'dashicons-images-alt',
    'labels' => $label,
    'public' => true,
    'has_archive' => true,
    'publicly_queryable' =>true,
    'query_var' => true,
    'rewrite' => true,
    'hierarchical' => false,
    'supports' => array('title', 'editor', 'thumbnail' ),
    'taxonomies' => array('category', 'post_type'),
    'exclude_from_search' =>false,

  
  );

register_post_type( 'Slides',$args);

}

add_action('init', 'ko_band_register_slides');

add_action('add_meta_boxes', 'ko_band_slides_meta_box_init');

function ko_band_slides_meta_box_init(){
        add_meta_box(
        'ko_band_slides_meta_box',
        'Slides',
        'ko_band_slides_meta_box',
        'slides',
        'normal',
        'default'
    );

}

function ko_band_slides_meta_box($post, $box){

    global $post;
    // Nonce field to validate form request came from current site

    wp_nonce_field( plugin_basename( __FILE__ ), 'ko_band_slides_save_meta_box' );

    // Get the location data if it's already been entered

    $slides_check = get_post_meta( $post->ID, 'ko_band_slides_check', true );
    $slides_video = get_post_meta( $post->ID, 'ko_band_slides_video', true );
    $slides_title = get_post_meta( $post->ID, 'ko_band_slides_title', true );
    $slides_subtitle = get_post_meta( $post->ID, 'ko_band_slides_subtitle', true );
    $slides_button_title = get_post_meta( $post->ID, 'ko_band_slides_button_title', true );
    $slides_button_link = get_post_meta( $post->ID, 'ko_band_slides_button_link', true );

    // Output the field
    echo "<p>If you want video slider please check here:</br></p>";
    echo '<input type="checkbox" name="ko_band_slides_check" value="' . esc_textarea( $slides_check )  . '" class="slidecheck" ></br>';
    
    echo "<p>Video holder:</p>";
    echo '<input type="text" name="ko_band_slides_video" value="' . esc_textarea( $slides_video )  . '" class="slidevideo" style"width:35%;"placeholder="Please paste here embed video"></br>';
    
    echo"<p>Title:</p>";
    echo '<input type="text" name="ko_band_slides_title" value="' . esc_textarea( $slides_title )  . '" class="slidetitle" placeholder="Text title on slide">';
    
    echo"<p>Subtitle:</p>";
    echo '<input type="text" name="ko_band_slides_subtitle" value="' . esc_textarea( $slides_subtitle )  . '" class="slidesub" placeholder="Text subtitle on slide"></br>';
    
    echo"<p>Title:</p>";
    echo '<input type="text" name="ko_band_slides_button_title" value="' . esc_textarea( $slides_button_title )  . '" class="slidebutton" placeholder="Button Title">';
    
    echo"<p>Link:</p>";
    echo '<input type="text" name="ko_band_slides_button_link" value="' . esc_textarea( $slides_button_link )  . '" class="slidebuttonlink" placeholder="Please paste here button link">';



 }


add_action( 'save_post', 'ko_band_slides_save_meta_box' , 1, 2);

function ko_band_slides_save_meta_box( $post_id, $post ) {

/*    if (isset($_POST['ko_band_slides_check'])) {
        if( defiend('DOING_AUTOSAVE') && DOING_AUTOSAVE)
            return;
        wp_verify_nonce( plugin_basename( __FILE__ ), 'ko_band_slides_save_meta_box');

        update_post_meta( $post_id, '_ko_band_slides_check',
            sanitizes_text_field ($POST['ko_band_slides_check']));
        update_post_meta( $post_id, '_ko_band_slides_video',
            sanitizes_text_field ($POST['ko_band_slides_video']));
        update_post_meta( $post_id, '_ko_band_slides_title',
            sanitizes_text_field ($POST['ko_band_slides_title']));
        update_post_meta( $post_id, '_ko_band_slides_subtitle',
            sanitizes_text_field ($POST['ko_band_slides_subtitle']));
        update_post_meta( $post_id, '_ko_band_slides_button_title',
            sanitizes_text_field ($POST['ko_band_slides_button_title']));
        update_post_meta( $post_id, '_ko_band_slides_button_link',
            sanitizes_text_field ($POST['ko_band_slides_button_link']));
    }
}

*/


if( !current_user_can( 'edit_post', $post_id ) ) {
     
        return $post_id;
    }

    if (isset($_POST['ko_band_slides_check'])) {

    // Verify this came from the our screen and with proper authorization,
    // because save_post can be triggered at other times.

    wp_verify_nonce( plugin_basename( __FILE__ ), 'ko_band_slides_save_meta_box' );

    // Now that we're authenticated, time to save the data.
    // This sanitizes the data from the field and saves it into an array $events_meta.
    $slides_meta['ko_band_slides_check'] = esc_textarea( $_POST['ko_band_slides_check'] ); 
    $slides_meta['ko_band_slides_video'] = esc_textarea( $_POST['ko_band_slides_video'] );
    $slides_meta['ko_band_slides_title'] = esc_textarea( $_POST['ko_band_slides_title'] );
    $slides_meta['ko_band_slides_subtitle'] = esc_textarea( $_POST['ko_band_slides_subtitle'] );
    $slides_meta['ko_band_slides_button_title'] = esc_textarea( $_POST['ko_band_slides_button_title'] );
    $slides_meta['ko_band_slides_button_link'] = esc_textarea( $_POST['ko_band_slides_button_link'] ); 
   
    // Cycle through the $events_meta array.
    // Note, in this example we just have one item, but this is helpful if you have multiple.
    foreach ( $slides_meta as $key => $value ) :

        // Don't store custom data twice

        if ( 'revision' === $post->post_type ) {

            return;
        }

        if ( get_post_meta( $post_id, $key, false ) ) {

            // If the custom field already has a value, update it.
            update_post_meta( $post_id, $key, $value );

        } else {

            // If the custom field doesn't have a value, add it.
            add_post_meta( $post_id, $key, $value);

        }

        if ( ! $value ) {

            // Delete the meta key if there's no value
            delete_post_meta( $post_id, $key );

        }

    endforeach;
    
    } 
}

?> 