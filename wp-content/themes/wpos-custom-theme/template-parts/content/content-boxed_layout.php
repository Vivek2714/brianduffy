<?php
/**
 * Template part for displaying page customcontent in page.php
 */

global $post;


$prefix         = SH_META_PREFIX; 
$bg_video       = get_post_meta( $post->ID, $prefix.'bg_video', true );
$bg_video_url   = get_post_meta( $post->ID, $prefix.'bg_video_url', true );
$bg_video_logo  = get_post_meta( $post->ID, $prefix.'bg_video_logo', true );
$bg_video_title = get_post_meta( $post->ID, $prefix.'bg_video_title', true );



?>
<article id="post-<?php the_ID(); ?>" <?php post_class($page_layout); ?>>
  
  <?php if( !empty( $bg_video ) ){ ?>  
  <div class="home-video-wrap">  
  <?php if( !empty( $bg_video_url ) )  { ?>
  	<div class="alignwide">
	  	<div class="wpos-video-content">
		    <?php if( !empty( $bg_video_title ) ) { ?>
			  <h1><?php echo $bg_video_title; ?></h1>
		    <?php } ?>
		</div>
	</div>
	<video autoplay muted loop id="wpos_video">
	  <source src="<?php echo $bg_video_url; ?>" type="video/mp4">
	  Your browser does not support HTML5 video.
	</video>
	<div class="wpos-video-logo">
		<?php if( !empty( $bg_video_logo ) ) { ?>
	    	<img src="<?php echo $bg_video_logo; ?>" />
	    <?php } ?>
	</div>
  <?php } ?>  
  </div>
<?php } ?>
<div class="entry-content wpos-boxed">
	<div class="alignwide">
		<?php the_content(); ?>
	</div>
</div>
<?php if ( get_edit_post_link() ) : ?>
		<div class="wpos-edit-link alignwide">
			<?php
			edit_post_link(
				sprintf(
					/* translators: %s: Name of current post. Only visible to screen readers. */
					esc_html__( 'Edit %s', 'twentytwentyone' ),
					'<span class="screen-reader-text">' . get_the_title() . '</span>'
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</div><!-- .entry-footer -->
	<?php endif; ?>
</article>
