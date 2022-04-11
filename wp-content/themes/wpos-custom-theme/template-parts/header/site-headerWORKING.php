<?php
/**
 * Displays the site header.
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

$wrapper_classes  = 'site-header';
$wrapper_classes .= has_custom_logo() ? ' has-logo' : '';
$wrapper_classes .= true === get_theme_mod( 'display_title_and_tagline', true ) ? ' has-title-and-tagline' : '';
$wrapper_classes .= has_nav_menu( 'primary' ) ? ' has-menu' : '';

$show_top_header  = twenty_twenty_one_get_theme_mod('header_social');
$phone            = twenty_twenty_one_get_theme_mod('phone');
$email            = twenty_twenty_one_get_theme_mod('email');
$facebook         = twenty_twenty_one_get_theme_mod('facebook');
$twitter          = twenty_twenty_one_get_theme_mod('twitter');
$linkedin         = twenty_twenty_one_get_theme_mod('linkedin');
$instagram        = twenty_twenty_one_get_theme_mod('instagram');
$youtube          = twenty_twenty_one_get_theme_mod('youtube');
$header_text_line = twenty_twenty_one_get_theme_mod('header_text_line');


?>

<div id="wpos-header-sticky">
<?php if( !empty( $show_top_header ) ){ ?>
<div class="wpos-top-main-wrap">   
   <div id="wpos-top-header" class="wpos-top-header site-header">
      <div class="container clearfix">
         <div id="wpos-info">
         	<?php if( is_user_logged_in() ) { 

         		$nickname = get_user_meta( wp_get_current_user()->ID, 'nickname', true );

         		?>
         		<span class="wpos-info-header_text_line wpos-info wpos-welcome-user">
	               Welcome  <?php echo ucfirst($nickname); ?>
	            </span>
	            <span class="wpos-logout wpos-info">
	               <a href="<?php echo wp_logout_url( get_permalink() );; ?>">Log Out</a>    
	            </span>
         	<?php } else { ?>
         		
            <?php if( !empty( $header_text_line ) ) { ?>
            <span class="wpos-info-header_text_line wpos-info">
               <?php echo $header_text_line; ?>   
            </span>
            <?php  } ?>

             <?php if( !empty( $phone ) ) { ?>
            <span class="wpos-info-phone wpos-info">
               <i class="fa fa-phone" aria-hidden="true"></i><a href="tel:<?php echo $phone; ?>"><?php echo $phone; ?></a>    
            </span>
            <?php  } ?>

            <?php if( !empty( $email ) ) { ?>
            <span class="wpos-info-email wpos-info">
               <i class="fa fa-envelope-o" aria-hidden="true"></i><a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a>
            </span>
            <?php  } ?>
        
            <ul class="wpos-top-social">
               <?php if( !empty( $facebook ) ){ ?>
               <li><a href="<?php echo $facebook; ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
               <?php } ?>
               <?php if( !empty( $twitter ) ){ ?>
               <li><a href="<?php echo $twitter; ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
               <?php } ?>
                <?php if( !empty( $linkedin ) ){ ?>
               <li><a href="<?php echo $linkedin; ?>"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
               <?php } ?>
               <?php if( !empty( $instagram ) ){ ?>
               <li><a href="<?php echo $instagram; ?>"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
               <?php } ?>
               <?php if( !empty( $youtube ) ){ ?>
               <li><a href="<?php echo $youtube; ?>"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
               <?php } ?>
            </ul>

        	<?php } ?>
         </div>
      </div>
   </div>
</div>
<?php } ?>
<div class="wpos-header-bottom">
   <header id="masthead" class="<?php echo esc_attr( $wrapper_classes ); ?>" role="banner">

   	<?php get_template_part( 'template-parts/header/site-branding' ); ?>
   	<?php get_template_part( 'template-parts/header/site-nav' ); ?>

   </header><!-- #masthead -->
</div>
</div>
