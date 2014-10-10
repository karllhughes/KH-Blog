<?php 


/* Jobs post type*/

function post_type_jobs() {
// Add employee user type
add_role( 'employee', 'Employee', array(
    'read' => true,
    'edit_posts' => false,
    'delete_posts' => false
) );

register_post_type(
                    'job', 
                    array( 'public' => true,
					 		'publicly_queryable' => true,
							'has_archive' => true, 
							'hierarchical' => false,
							'menu_icon' => get_stylesheet_directory_uri() . '/images/job.png',
                    		'labels'=>array(
    									'name' => _x('Jobs', 'post type general name'),
    									'singular_name' => _x('Job', 'post type singular name'),
    									'add_new' => _x('Add New', 'Job'),
    									'add_new_item' => __('Add New Job'),
    									'edit_item' => __('Edit Job'),
    									'new_item' => __('New Job'),
    									'view_item' => __('View Job'),
    									'search_items' => __('Search Jobs'),
    									'not_found' =>  __('No Jobs found'),
    									'not_found_in_trash' => __('No Jobs found in Trash'), 
    									'parent_item_colon' => ''
  										),							 
                            'show_ui' => true,
							'menu_position'=>5,
							'query_var' => true,
							'rewrite' => true,
							'rewrite' => array( 'slug' => 'job', 'with_front' => FALSE,),
							'register_meta_box_cb' => 'mytheme_add_box',
							'supports' => array(
							 			'title',
										'thumbnail',
										'custom-fields',
										'comments',
										'editor'
										)
							) 
					);
				} 
add_action('init', 'post_type_jobs');

/* Job type taxonomy */

function create_job_type_taxonomy() {
$labels = array(
    'name' => _x( 'Job types', 'taxonomy general name' ),
    'singular_name' => _x( 'Job type', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Job types' ),
    'all_items' => __( 'All Job types' ),
    'parent_item' => __( 'Parent Job type' ),
    'parent_item_colon' => __( 'Parent Job type:' ),
    'edit_item' => __( 'Edit Job type' ), 
    'update_item' => __( 'Update Job type' ),
    'add_new_item' => __( 'Add New Job type' ),
    'new_item_name' => __( 'New Job type Name' ),
); 	
register_taxonomy('job_type',array('job'), array(
    'hierarchical' => true,
    'labels' => $labels,
      'show_ui' => 'radio',
    'query_var' => true,
    'rewrite' => array( 'slug' => 'job_type' ),
  ));
}

add_action( 'init', 'create_job_type_taxonomy', 0 );

function create_company_taxonomy() {
    $labels = array(
        'name' => _x( 'Companies', 'taxonomy general name' ),
        'singular_name' => _x( 'Company', 'taxonomy singular name' ),
        'search_items' =>  __( 'Search Companies' ),
        'all_items' => __( 'All Companies' ),
        'edit_item' => __( 'Edit Company' ), 
        'update_item' => __( 'Update Company' ),
        'add_new_item' => __( 'Add New Company' ),
        'new_item_name' => __( 'New Company Name' ),
    ); 	
    register_taxonomy('company',array('job','post'), array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => 'radio',
        'query_var' => true,
        'rewrite' => array( 'slug' => 'company' ),
      ));
}
add_action( 'init', 'create_company_taxonomy', 0 );

function create_city_taxonomy() {
    $labels = array(
        'name' => _x( 'Cities', 'taxonomy general name' ),
        'singular_name' => _x( 'City', 'taxonomy singular name' ),
        'search_items' =>  __( 'Search Cities' ),
        'all_items' => __( 'All Cities' ),
        'edit_item' => __( 'Edit City' ), 
        'update_item' => __( 'Update City' ),
        'add_new_item' => __( 'Add New City' ),
        'new_item_name' => __( 'New City Name' ),
    ); 	
    register_taxonomy('city',array('job'), array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => 'radio',
        'query_var' => true,
        'rewrite' => array( 'slug' => 'city' ),
      ));
}
add_action( 'init', 'create_city_taxonomy', 0 );


?>