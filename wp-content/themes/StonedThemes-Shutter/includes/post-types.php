<?php
add_action( 'init', 'register_posts' );
	function register_posts() {	
		register_post_type( 'service_post',
			array(
				'labels' => array(
					'name' => __( "Services","sth_lang"),
					'singular_name' => __( "Services" ,"sth_lang")
				),
				'public' => true,
				'has_archive' => true,			
				'rewrite' => array('slug' => "service_post", 'with_front' => TRUE),
				'supports' => array('title','editor','thumbnail','page-attributes')					
			)
		);

		register_taxonomy('services_category',array (
		  0 => 'service_post',
		),array( 'hierarchical' => true, 
				 'label' => __('Services Category',"sth_lang"),
				 'show_ui' => true,
				 'query_var' => true,
				 'singular_label' => __('Service Category',"sth_lang")) );
				 
       register_post_type( 'project_post',
			array(
				'labels' => array(
					'name' => __( "Projects","sth_lang"),
					'singular_name' => __( "Projects" ,"sth_lang")
				),
				'public' => true,
				'has_archive' => true,			
				'rewrite' => array('slug' => "projects", 'with_front' => TRUE),
				'supports' => array('title','editor','thumbnail','page-attributes')					
			)
		);

		register_taxonomy('projects_category',array (
		  0 => 'project_post',
		),array( 'hierarchical' => true, 
				 'label' => __('Projects Category',"sth_lang"),
				 'show_ui' => true,
				 'query_var' => true,
				 'singular_label' => __('Project Category',"sth_lang")) );
				 
		register_taxonomy(
		'gallery',
		'project_post',
		array(
			'hierarchical' => true, 
				 'label' => __('Gallery Category',"sth_lang"),
				 'show_ui' => true,
				 'query_var' => true,
				 'singular_label' => __('Gallery Category',"sth_lang")
			)	);

	}
?>