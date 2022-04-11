<?php
/**
 * Handles home post metabox HTML
 *
 * @package Scripthub
 * @since 1.0
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

global $post;

$prefix = SH_META_PREFIX; // Metabox prefix

// Getting saved values
$bg_video 		= get_post_meta( $post->ID, $prefix.'bg_video', true );
$bg_video_url 	= get_post_meta( $post->ID, $prefix.'bg_video_url', true );
$bg_video_logo 	= get_post_meta( $post->ID, $prefix.'bg_video_logo', true );
$bg_video_title = get_post_meta( $post->ID, $prefix.'bg_video_title', true );


?>


<table class="form-table sh-notification-form sh-setting-tbl">
    <tbody>
    	<tr>
		 	<th><label for="bg_video"><?php _e('Show background video', 'twentytwentyone'); ?></label></th>
			<td class="">
				<input type="checkbox" value="1" name="<?php echo esc_attr($prefix); ?>bg_video" class="bg_video" id="bg_video" <?php checked( $bg_video, 1 ); ?> />
			</td>
		</tr>
		<tr>
			<th><label for="bg_video_url"><?php _e('Select Video', 'twentytwentyone'); ?></label></th>
		 	<td>
				<input id="sh-nt-icon" type="text" name="<?php echo $prefix; ?>bg_video_url" value="<?php echo esc_url($bg_video_url); ?>" class="bg_video_url sh-img-upload-input" />
				<input type="button" class="button button-secondary sh-nt-icon-uploader sh-video-upload" value="<?php _e( 'Choose video', 'twentytwentyone'); ?>" data-pdt-preview="1" />
				<input type="button" class="button button-secondary sh-nt-icon-clear sh-image-clear" value="<?php _e( 'Clear', 'twentytwentyone'); ?>" data-pdt-preview="1" /><br/>
		 	</td>
		</tr>
		<tr>
		 	<th><label for="bg_video_logo"><?php _e('Select logo', 'twentytwentyone'); ?></label></th>
			<td class="">
				<input id="bg_video_logo" type="text" name="<?php echo $prefix; ?>bg_video_logo" value="<?php echo esc_url($bg_video_logo); ?>" class="bg_video_logo sh-img-upload-input" />
				<input type="button" class="button button-secondary sh-nt-icon-uploader sh-image-upload" value="<?php _e( 'Choose logo', 'twentytwentyone'); ?>" data-pdt-preview="1" />
				<input type="button" class="button button-secondary sh-nt-icon-clear sh-image-clear" value="<?php _e( 'Clear', 'twentytwentyone'); ?>" data-pdt-preview="1" /><br/>
			</td>
		</tr>
		<tr>
		 	<th><label for="bg_video_title"><?php _e('Video Title', 'twentytwentyone'); ?></label></th>
			<td class="">
				<input type="text" value="<?php echo $bg_video_title; ?>" name="<?php echo $prefix; ?>bg_video_title" class="sh-home-pdt" id="bg_video_title" />
			</td>
		</tr>
		
    </tbody>
</table>