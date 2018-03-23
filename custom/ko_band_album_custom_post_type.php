<?php 


$args = array(
  'labels'  =>  array(

            'menu_name' => 'Album',
          ),  
    'capabilities'  =>  array(
            'capability_type' => 'posts',
            'create_posts' => 'do_not_allow',
    ),    
    'map_meta_cap' => true, 
    'menu_position' => 3,
    'public'    =>  true
);
//Custom post type function
function ko_band_album_custom_post_type() {

  $label = array(
    'name' => 'Album',
    'singular_name' => 'Album',
    'add_new' => 'Add Album',
    'all_items' => 'All Albums',
    'add_new_item' => 'Add Album',
    'edit_item' => 'Edit Album',
    'new_item' => 'New Album',
    'view_item' => 'View Album',
    'search_item' => 'Search Album',
    'not_found' => 'Mo Album Found',
    'not-found_in_trash' => 'No Album Found in Trash',
    'parent_item_colon' => 'Parent Album'
      );
  $args = array(
    'menu_icon' => 'dashicons-portfolio',
    'labels' => $label,
    'public' => true,
    'has_archive' => true,
    'publicly_queryable' =>true,
    'query_var' => true,
    'rewrite' => true,
    'hierarchical' => false,
    'supports' => array('title', 'editor', 'thumbnail', 'excerpt',  'comments', 'revisions', 'post-formats' ),
    
    'taxonomies' => array('category', 'post_type'),
    'exclude_from_search' =>false,

  
  );

    register_post_type( 'Album',$args);
 }

 add_action( 'init', 'ko_band_album_custom_post_type' );


  function ko_band_get_song_options() {
    $options = array (
        'Youtube' => 'www.youtybe.com',
        'Vevo' => 'www.vevo.com',
        'Option 3' => 'option3',
        'Option 4' => 'option4',
    );
    
    return $options;
}


  
add_action('add_meta_boxes', 'ko_band_album_meta_box_init');



 function ko_band_album_meta_box_init(){
         add_meta_box(
        'ko_band_album_meta_box',
        'Album Details',
        'ko_band_album_meta_box',
        'album',
        'normal',
        'default'
    );


function ko_band_album_meta_box($post_id, $post ) {

global $post;
   // Nonce field to validate form request came from current site
   wp_nonce_field(plugin_basename( __FILE__ ), 'album_fields' );
    // Get the location data if it's already been entered
   
      

      $album_date_release = get_post_meta( $post->ID, 'ko_band_album_date_release', true );
      $album_length = get_post_meta( $post->ID, 'ko_band_album_length', true );
      $album_buy = get_post_meta( $post->ID, 'ko_band_album_buy', true );
     $album_store_name = get_post_meta( $post->ID, 'ko_band_album_store_name', true );
 
 
    // Output the field
 
     echo "<p>  Date Release: </p>";
    echo '<input type="date" name="ko_band_album_date_release" value="' . esc_html( $album_date_release )  . '" class="widefat" >';  
     
       echo "<p>  Album Length: </p>";
    echo '<input type="range" name="ko_band_album_length" value="' . esc_html( $album_length )  . '" class="widefat" >';    

        echo "<p>  Buy Album: </p>";
    echo '<input type="url" name="ko_band_album_name" value="' . esc_url( $album_buy )  . '" class="widefat" >';  
     
      echo "<p>  Store Name: </p>";
   echo '<input type="text" name="ko_band_album_store_name" value="' . esc_textarea( $album_store_name )  . '" class="widefat" placeholder="Store Name">'; 

  

    $repeatable_fields = get_post_meta($post->ID, 'ko_band_album_meta_box', true);
    $options = ko_band_get_song_options();
    ?>

   
    <script type="text/javascript">
    jQuery(document).ready(function( $ ){
        $( '#add-row' ).on('click', function() {
            var row = $( '.empty-row.screen-reader-text' ).clone(true);
            row.removeClass( 'empty-row screen-reader-text' );
            row.insertBefore( '#ko_band_album_meta_box_one tbody>tr:last' );
            return false;
        });
    
        $( '.remove-row' ).on('click', function() {
            $(this).parents('tr').remove();
            return false;
        });
    });
    </script>
  
    <table id="ko_band_album_meta_box_one" width="100%">
    <thead>
        <tr>
            <th width="30%">Song Name</th>
            <th width="30%">Song Length</th>
            <th width="12%">Link</th>
            
            <th width="20%">Song Detail</th>
            <th width="8%"></th>
        </tr>
    </thead>
    <tbody>
    <?php
    
    if ( $repeatable_fields ) :
    
    foreach ( $repeatable_fields as $field ) {
    ?>
    <tr>
        <td><input type="text" class="widefat" name="name[]" value="<?php if($field['name'] != '') echo esc_attr( $field['name'] ); ?>" /></td>

        <td><input type="text" class="widefat" name="length[]" value="<?php if($field['length'] != '') echo esc_attr( $field['length'] ); ?>" /></td>
        <td><input type="file" class="widefat" id="fileupload" name="files[]" value="<?php if($field['files'] != '') echo esc_attr( $field['files'] ); ?>" /></td>
         
      
    
        <td><input type="text" class="widefat" name="detail[]" value="<?php if($field['detail'] != '') echo esc_attr( $field['detail'] ); ?>" /></td>
    
        <td><a class="button remove-row" href="#">Remove</a></td>
    </tr>
    <?php
    }
    else :
    // show a blank one
    ?>
    <tr>
        <td><input type="text" class="widefat" name="name[]" /></td>
        <td><input type="text" class="widefat" name="length[]" /></td>
        <td><input type="file" class="widefat" name="files[]" /></td>
        
        <td><input type="text" class="widefat" name="detail[]" /></td>
    
        <td><a class="button remove-row" href="#">Remove</a></td>
    </tr>
    <?php endif; ?>
    
    <!-- empty hidden one for jQuery -->
    <tr class="empty-row screen-reader-text">
        <td><input type="text" class="widefat" name="name[]" /></td>
        <td><input type="text" class="widefat" name="length[]" /></td>
        <td><input type="file" class="widefat" name="files[]" /></td>
      
        <td><input type="text" class="widefat" name="detail[]" /></td>
    
        <td><a class="button remove-row" href="#">Remove</a></td>
    </tr>
    </tbody>
    </table>
    
    <p><a id="add-row" class="button" href="#">Add another</a></p>
 
<?php 
}

add_action( 'save_post', 'ko_band_album_save_meta_box' , 1, 2);

function ko_band_album_save_meta_box( $post_id, $post ) 

{



 if ( ! current_user_can( 'edit_post', $post_id ) ) {

        return $post_id;

    }

    // Verify this came from the our screen and with proper authorization,
    // because save_post can be triggered at other times.
 if (isset($_POST['ko_band_album_title'])) {
     wp_verify_nonce(plugin_basename(__FILE__), 'ko_band_album_save_meta_box' );

        return $post_id;



   // Now that we're authenticated, time to save the data.
    // This sanitizes the data from the field and saves it into an array $events_meta.
    $album_date_release['ko_band_album_date_release'] = esc_datetime( $_POST['ko_band_album_date_release'] );
    $album_length['ko_band_album_length'] = esc_html( $_POST['ko_band_album_length'] );
    $album_buy['ko_band_album_name'] = esc_url( $_POST['ko_band_album_name'] );
    $album_store_name['ko_band_album_store_name'] = esc_textarea( $_POST['ko_band_album_store_name'] );
  

        foreach ( $album_meta as $key => $value ) :

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



    $old = get_post_meta($post_id, 'ko_band_album_meta_box', true);
    $new = array();
    $options = ko_band_get_song_options();
    
    $names = $_POST['name'];
    $length = $_POST['length'];
    $file = $_POST['file'];
    $urls = $_POST['url'];
    
    $count = count( $names );
  
    
    for ( $i = 0; $i < $count; $i++ )
     {
        if ( $names[$i] != '' ) 
        {
            $new[$i]['name'] = stripslashes( strip_tags( $names[$i] ) );
        }
        if ( $length[$i] != '' ) {
            $new[$i]['length'] = stripslashes( strip_tags( $length[$i] ) );
        }
        if ( $file[$i] != '' ) {

            $new[$i]['file'] = stripslashes( strip_tags( $file[$i] ) );    
        
            if ( $urls[$i] == 'http://' )
                {
                $new[$i]['url'] = '';
                }
            else
            {
                $new[$i]['url'] = stripslashes( $urls[$i] ); // and however you want to sanitize
            }
        }
        
                 
    if ( !empty( $new ) && $new != $old )
    {
        update_post_meta( $post_id, 'ko_band_album_meta_box', $new );
    }
    elseif ( empty($new) && $old )
    {
        delete_post_meta( $post_id, 'ko_band_album_meta_box', $old );
    }

}
}

}
}

?>


 
