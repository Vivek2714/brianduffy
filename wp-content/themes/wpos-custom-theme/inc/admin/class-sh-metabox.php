<?php
/**
 * MetaBox Class
 *
 * @package Script Hub
 * @since 1.0
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

class Sh_Metabox {
	
	function __construct() {

		// Action to add metabox
		add_action( 'add_meta_boxes', array($this, 'sh_reg_setting_metabox') );

		// Action to save metabox
		add_action( 'save_post', array($this, 'sh_save_metabox_value') );


	}

	/**
	* Theme Metabox
	* 
	* @package Script Hub
	* @since 1.0
	*/
	function sh_reg_setting_metabox() {
		// Add Product Setting Metabox  
		add_meta_box( 'sh-page-settings-metabox', __( 'Page settings', 'scripthub' ), array($this, 'sh_show_home_metabox') , 'page', 'normal', 'low' );
	}

	/**
	* Setting notification metabox HTML
	* 
	* @package Script Hub
	* @since 1.0
	*/
	function sh_show_home_metabox() {
		require SH_DIR .'/inc/admin/metabox/sh-show-pdt-home.php';
	}

	/**
	* Save metabox value
	* 
	* @package Script Hub
	* @since 1.0
	*/
	function sh_save_metabox_value( $post_id ) {

       global $post_type, $wpdb;
       $prefix = SH_META_PREFIX; 

       if ( ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )               // Check Autosave
       || ( ! isset( $_POST['post_ID'] ) || $post_id != $_POST['post_ID'] ) // Check Revision
       || ( $post_type !=  'page' ) )										// Check if current post type is supported.
       {
			return $post_id;
       }

	   $bg_video 		= isset( $_POST[$prefix.'bg_video'] )?$_POST[$prefix.'bg_video'] : '';
	   $bg_video_url 	= isset( $_POST[$prefix.'bg_video_url'] )?$_POST[$prefix.'bg_video_url'] : '';
	   $bg_video_logo 	= isset( $_POST[$prefix.'bg_video_logo'] )?$_POST[$prefix.'bg_video_logo'] : '';
	   $bg_video_title 	= isset( $_POST[$prefix.'bg_video_title'] )?$_POST[$prefix.'bg_video_title'] : '';
	   
	   

	   update_post_meta( $post_id, $prefix.'bg_video', $bg_video );
	   update_post_meta( $post_id, $prefix.'bg_video_url', $bg_video_url );
	   update_post_meta( $post_id, $prefix.'bg_video_logo', $bg_video_logo );
	   update_post_meta( $post_id, $prefix.'bg_video_title', $bg_video_title );
	   
	 

	}

	
}

$sh_metabox = new Sh_Metabox();