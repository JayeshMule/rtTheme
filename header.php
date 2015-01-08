<!DOCTYPE html>
<html lang="en">
<head>
<title>
<?php
/**
 * Wordpress Doc Comment
 *
 * @category Wordpress
 * @package  WP
 * @author   J N MULE <author@example.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     http://www.hashbangcode.com/
 *
 */
/*blog title code */
wp_title( '|' , 'true' , 'right' );
bloginfo( 'name' );
?>
</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="<?php bloginfo( 'template_directory' );?>/lib/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo( 'stylesheet_url' );?>" />

<?php wp_head(); ?>
</head>

<body>
<div id="wrapper">
	<div id="main">
         <div id="header" class="clearfix" >
									<?php /*Theme Option Main LOGO upload */
											if ( function_exists( 'ot_get_option' ) )
											{
												$logo = ot_get_option( 'mainlogo' );
											
											} ?>
											<?php if( $logo != "" ) {?>
											<h1><a href="#"><img src="<?php echo $logo;?>"/></a></h1>		
											<?php } else {?>
											<h1><a href="#"><img src="<?php bloginfo( 'template_directory' );?>/img/logo.png"/></a></h1>
											<?php }?>											
 			
			
			<a href="#" id="menu-icon"></a>	
			
			<?php /*wordpress 2 level primary menu*/
            wp_nav_menu( array(
            'container_class'=>'main-nav' ,
            'container' =>'nav' , 
            'theme_location' => 'primary' 
            ) );
            ?>			 
			
		</div><!--End header-->	