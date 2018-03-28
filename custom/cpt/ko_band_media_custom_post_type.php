<?php
/**
 * Koband Media custom post type and metabox creation file!
 *
 *
 * @package Wordpress 
 * @subpackage Koband
 * @since Koband 1.0
 */

$args = array(
    'labels'  =>  array(
    'menu_name' => __ ('Media','koband')
          ),   
    'capabilities'  =>  array(
            'capability_type' => 'posts',
            'create_posts' => 'do_not_allow',
    ),    
    'map_meta_cap' => true, 
    'menu_position' => 6,
    'public'    =>  true
);

//Custom post type function

function ko_band_media_custom_post_type() {

  $label = array(
    'name' => __('Media', 'koband'),
    'singular_name' =>  __ ('Media', 'koband'),
    'add_new' => __ ('Add Media','koband'),
    'all_items' => __ ('All Medias', 'koband'),
    'add_new_item' => __ ('Add Media','koband'),
    'edit_item' => __ ('Edit Media','koband'),
    'new_item' => __ ('New Media','koband'),
    'view_item' => __ ('View Media','koband'),
    'search_item' => __ ('Search Media', 'koband'),
    'not_found' => __ ('Mo Media Found', 'koband'),
    'not-found_in_trash' => __ ('No Media Found in Trash','koband'),
    'parent_item_colon' => __ ('Parent Media','koband'),
    );

  $args = array(
    'menu_icon' => 'dashicons-format-gallery',
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

register_post_type(  __('Media', 'koband'),$args);

}

add_action( 'init', 'ko_band_media_custom_post_type' );

// Gallery Images function

function ko_band_gallery_metabox($post_type) {

    $types = array('custom-post-type');
    {
      add_meta_box(
        'gallery-metabox',
        'Gallery',
        'gallery_meta_callback',
        'media',
        'normal',
        'high'
        );
    }
}
add_action('add_meta_boxes', 'ko_band_gallery_metabox');

function ko_band_enqueue_admin_scripts($hook) {

    if ( 'post.php' == $hook || 'post-new.php' == $hook ) {

          wp_enqueue_script('gallery-metabox', get_template_directory_uri() . '/admin/ko_band_admin.js', array('jquery', 'jquery-ui-sortable'));
          wp_enqueue_style('gallery-metabox', get_template_directory_uri() . '/admin/ko_band_admin.css');
    }
}

add_action( 'admin_enqueue_scripts', 'ko_band_enqueue_admin_scripts' );


function gallery_meta_callback() {
global $post;
    wp_nonce_field( basename(__FILE__), 'gallery_meta_nonce' );
    $ids = get_post_meta($post->ID, 'vdw_gallery_id', true);
    ?>

    <div class="container form-table">
        <div class="row">
            <div class="col-sm">
                <a class="gallery-add button" href="#" data-uploader-title="Add image(s) to gallery" data-uploader-button-text="Add image(s)">Add image(s)</a>
            </div>    
        </div>
        <div id="gallery-metabox-list" class="row">
            <?php if ($ids) : foreach ($ids as $key => $value) : $image = wp_get_attachment_image_src($value); ?>
            <div class="col-sm">
                <input type="hidden" name="vdw_gallery_id[<?php echo $key; ?>]" value="<?php echo $value; ?>">
                <img class="image-preview" src="<?php echo $image[0]; ?>">
                <a class="change-image button button-small" href="#" data-uploader-title="Change image" data-uploader-button-text="Change image">Change image</a><br>
                <small><a class="remove-image" href="#">Remove image</a></small>
            </div>
        <?php endforeach; endif; ?>
        </div>
    </div>

  <?php }

function gallery_meta_save($post_id) {

        if (!isset($_POST['gallery_meta_nonce']) || !wp_verify_nonce($_POST['gallery_meta_nonce'], basename(__FILE__))) return;
        if (!current_user_can('edit_post', $post_id)) return;
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
        if(isset($_POST['vdw_gallery_id'])) {
          update_post_meta($post_id, 'vdw_gallery_id', $_POST['vdw_gallery_id']);
    } 

    else {

        delete_post_meta($post_id, 'vdw_gallery_id');
    }
}

add_action('save_post', 'gallery_meta_save');

//------------------------------------------------Gallery Image Metabox Ends Here---------------------------------------------

//-----------------------------------------------Gallery Video Metabox Starts Here----------------------------------------

function ko_band_get_video_options() {
    $options = array (
        'Youtube'       => 'option1',
        'Vimeo'         => 'option2',
        'DailyMotion'   => 'option3',
        'Others'        => 'option4',
    );
    
    return $options;
}

add_action('add_meta_boxes', 'ko_band_media_meta_box_init');

function ko_band_media_meta_box_init(){
        add_meta_box(
        'ko_band_media_meta_box',
        'Video Gallery',
        'ko_band_media_display_meta_box',
        'media',
        'normal',
        'default'
    );

}
function ko_band_media_display_meta_box($post, $box){
    global $post;

    // Nonce field to validate form request came from current site
//$singles_details = get_post_meta($post->ID, 'ko_band_repetable_singles_details', true);
$video_field = get_post_meta($post->ID, 'ko_band_repetable_video_field', true);
$options = ko_band_get_video_options();
wp_nonce_field( 'ko_band_media_save_meta_box_nonce', 'ko_band_media_save_meta_box_nonce' );
   
?>
<script type="text/javascript">
    jQuery(document).ready(function( $ ){
        $( '#add-row' ).on('click', function() {
            var row = $( '.empty-row.screen-reader-text' ).clone(true);
            row.removeClass( 'empty-row screen-reader-text' );
            row.insertBefore( '#ko_band_repetable_video_field_one .row:last' );
            return false;
        });
    
        $( '.remove-row' ).on('click', function() {
            $(this).parents('.row').remove();
            return false;
        });
    });
</script>

<div class="container" id="ko_band_repetable_video_field_one">
    <div class="row">
        <div class="col-sm">
            Video Link
        </div>
        <div class="col-sm">
            Select
        </div>
    </div>
    <?php if ( $video_field ) :    
    foreach ( $video_field as $field) { ?>
    <div class="row">
        <div class="col-sm">
            <input type="url" class="widefat" name="link[]" value="<?php if($field['link'] != '') echo esc_attr( $field['link'] ); ?>" />
        </div>
        <div class="col-sm">
            <select name="select[]">
                    <?php foreach ( $options as $label => $value ) : ?>
                    <option value="<?php echo $value; ?>"<?php selected( $field['select'], $value ); ?>><?php echo $label; ?></option>
                    <?php endforeach; ?>
            </select>
        </div>
        <div class="col-sm">
            <a class="button remove-row" href="#">Remove</a>
        </div>
    </div>
    <?php } else: ?>
    <div class="row">
        <div class="col-sm">
            <input type="url" class="widefat" name="link[]" />
        </div>
        <div class="col-sm">
            <select name="select[]">
                    <?php foreach ( $options as $label => $value ) : ?>
                    <option value="<?php echo $value; ?>"><?php echo $label; ?></option>
                    <?php endforeach; ?>
            </select>
        </div>
        <div class="col-sm">
            <a class="button remove-row" href="#">Remove</a>
        </div>
    </div>
    <?php endif; ?>
        <!-- empty hidden one for jQuery -->
    <div class="row empty-row screen-reader-text">
        <div class="col-sm">
            <input type="url" class="widefat" name="link[]" />
        </div>
        <div class="col-sm">
            <select name="select[]" >
                    <?php foreach ( $options as $label => $value ) : ?>
                    <option value="<?php echo $value; ?>"><?php echo $label; ?></option>
                    <?php endforeach; ?>
            </select>
        </div>
        <div class="col-sm">
            <a class="button remove-row" href="#">Remove</a>
        </div>
    </div>
</div>
<p><a id="add-row" class="button" href="#">Add another</a></p>
 
<?php 
}


add_action( 'save_post', 'ko_band_media_save_meta_box' , 1, 2);


function ko_band_media_save_meta_box( $post_id, $post ) {

        if ( ! isset( $_POST['ko_band_media_save_meta_box_nonce'] ) || ! wp_verify_nonce( $_POST['ko_band_media_save_meta_box_nonce'], 'ko_band_media_save_meta_box_nonce' ) )

            return;

        if ( ! current_user_can( 'edit_post', $post_id ) ) { return $post_id; }
 


 
    $old = get_post_meta($post_id, 'ko_band_repetable_video_field', true);
    $options = ko_band_get_video_options();
    $new= array();
       if (isset($_POST["link"]))    {

            $url = $_POST['link'];
            $selects = $_POST['select'];
            $count = count( $url );  
            }
    for ( $i = 0; $i < $count; $i++ )  {
        if ( $url[$i] != '' )    {

            $new[$i]['link'] = stripslashes( strip_tags( $url[$i] ) );   
            if ( in_array( $selects[$i], $options ) )
                $new[$i]['select'] = $selects[$i];
            else
                $new[$i]['select'] = '';    }
    }
    if ( !empty( $new ) && $new != $old ) { update_post_meta( $post_id, 'ko_band_repetable_video_field', $new );}
    elseif ( empty($new) && $old ) { delete_post_meta( $post_id, 'ko_band_repetable_video_field', $old ); }

}

?>