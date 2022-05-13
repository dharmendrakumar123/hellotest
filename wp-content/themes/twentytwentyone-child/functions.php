<?php
add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );
function enqueue_parent_styles() {
   wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
}


/*
* Creating a function to create our CPT
*/
 
function event_post_type() {
 
    // Set UI labels for Custom Post Type
        $labels = array(
            'name'                => _x( 'Events', 'Post Type General Name', 'twentytwentyone' ),
            'singular_name'       => _x( 'Event', 'Post Type Singular Name', 'twentytwentyone' ),
            'menu_name'           => __( 'Events', 'twentytwentyone' ),
            'parent_item_colon'   => __( 'Parent Event', 'twentytwentyone' ),
            'all_items'           => __( 'All Events', 'twentytwentyone' ),
            'view_item'           => __( 'View Event', 'twentytwentyone' ),
            'add_new_item'        => __( 'Add New Event', 'twentytwentyone' ),
            'add_new'             => __( 'Add New', 'twentytwentyone' ),
            'edit_item'           => __( 'Edit Event', 'twentytwentyone' ),
            'update_item'         => __( 'Update Event', 'twentytwentyone' ),
            'search_items'        => __( 'Search Event', 'twentytwentyone' ),
            'not_found'           => __( 'Not Found', 'twentytwentyone' ),
            'not_found_in_trash'  => __( 'Not found in Trash', 'twentytwentyone' ),
        );
         
    // Set other options for Custom Post Type
         
        $args = array(
            'label'               => __( 'events', 'twentytwentyone' ),
            'description'         => __( 'event artist and city', 'twentytwentyone' ),
            'labels'              => $labels,
            // Features this CPT supports in Post Editor
            'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
            // You can associate this CPT with a taxonomy or custom taxonomy. 
            'taxonomies'          => array( 'genres' ),
            /* A hierarchical CPT is like Pages and can have
            * Parent and child items. A non-hierarchical CPT
            * is like Posts.
            */ 
            'hierarchical'        => false,
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'show_in_nav_menus'   => true,
            'show_in_admin_bar'   => true,
            'menu_position'       => 5,
            'can_export'          => true,
            'has_archive'         => true,
            'exclude_from_search' => false,
            'publicly_queryable'  => true,
            'capability_type'     => 'post',
            'show_in_rest' => true,
     
        );
         
        // Registering your Custom Post Type
        register_post_type( 'events', $args );
     
    }
     
     
    add_action( 'init', 'event_post_type');

    function vm_add_post_meta_boxes(){
        add_meta_box(
            "post_metadata_events_post", //div id containing rendered fields
            "Event Date", // display heading as text
            "vm_post_post_meta_boxes", //callback functions to render fields
            "events", //namde of post type
            "side", //location on the screen
            "low" 

        );

    }
    add_action("admin_init", "vm_add_post_meta_boxes");

//save field value
    function vm_save_post_meta_boxes(){
        global $post;
        if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE  ){
            return;    
            }
 update_post_meta($post->ID, "event_date", sanitize_text_field($_POST["event_date"]));
    }

    add_action("save_post", "vm_save_post_meta_boxes");

    //Callback function to render fields
    function vm_post_post_meta_boxes(){
        global $post;
     $custom = get_post_custom($post->ID);
     $fielddata = $custom["event_date"][0];  
     echo "<input type =\"date\" name=\"event_date\" value=\"".$fielddata."\" placeholder = \"Event Date\">";
    }

     add_shortcode("Events_list", "create_event_post");
     function create_event_post(){
         ?>
        <div class="row">
        <?php
          $args = array(
            'post_type'=> 'events',
              'numberposts'    => -1,
              'order'    => 'DESC',
              'orderby'     => 'date',
              );
             $article = new wp_query($args);
             while( $article->have_posts() )
             { $article->the_post();
                ?>
            <div class="col-lg-6">
                <div class="blog-item wow fadeInUp" data-wow-delay="0.1s">
                 
                     
                    <div class="blog-text">
                        <h2><?php echo the_title();?></h2>
                        <div class="blog-meta">
                            <p><i class="far fa-user"></i>Author: <?php echo get_the_author();?></p>
                           
                            <p>Post Content :<?php echo the_content();?></p>
                            <p><i class="far fa-calendar-alt"></i>Date:<?php  the_date();?></p>
                      <p> Post Time: <?php echo get_the_time();?></p>
                      <p>City :<?php echo the_field("city");?></p>
                           
                        </div>
                        <p>
                </div>
            </div>
            <?php }
             wp_reset_postdata();?>
            </div>
        </div>
        <?php
     }
?>
