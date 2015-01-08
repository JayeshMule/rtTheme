<?php
/**
 * Required: include OptionTree.
 * MainaPage Doc Comment
 *
 * @category MainaPage
 * @package  MainaPage
 * @author   J N MULE <author@example.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     http://www.hashbangcode.com/
 *
 */

require( trailingslashit( get_template_directory() ) . '/lib/option-tree/ot-loader.php' );  
/**
 * Theme Options
 */
require( trailingslashit( get_template_directory() ) . '/lib/inc/theme-options.php' );

require( trailingslashit( get_template_directory() ) . '/lib/inc/simple_html_dom.php' );

if( function_exists( 'register_nav_menus' ) )
{
	register_nav_menus(
	array(
	'primary' => 'Header Navigation',
	'secondary' => 'Footer Navigation'
	) );
}
if( function_exists( 'add_theme_support' ) )
{
	add_theme_support( 'post-thumbnails' );
}
if( function_exists( 'add_image_size' ) )
{
	add_image_size( 'featured' , 960 , 300 , true );
	
}
if( function_exists( 'register_sidebar' ) )
{
	register_sidebar( array(
	'name'=>'Footer Widgets 1',
	'id' => 'footer-widgets-1',
	'description'=>'place Widgets for the footer here.',	
	) );
	register_sidebar( array(
	'name'=>'Footer Widgets 2',
	'id' => 'footer-widgets-2',
	'description'=>'place Widgets for the footer here.',	
	) );
	register_sidebar( array(
	'name'=>'Footer Widgets 3',
	'id' => 'footer-widgets-3',
	'description'=>'place Widgets for the footer here.',	
	) );
	register_sidebar( array(
	'name'=>'Footer Widgets 4',
	'id' => 'footer-widgets-4',
	'description'=>'place Widgets for the footer here.',	
	) );
	
}
// Changing excerpt more
   function new_excerpt_more( $more ) {
   global $post;
   return '… <a href="'. get_permalink( $post->ID ) . '">' . 'Read More &raquo;' . '</a>';
   }
   add_filter( 'excerpt_more' , 'new_excerpt_more' );
   
   
function catch_that_image() {
  global $post, $posts;
  $first_img = '';
  ob_start();
  ob_end_clean();
  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
  $first_img = $matches[1][0];

  if(empty($first_img)) {
    $first_img = "/path/to/default.png";
  }
  return $first_img;
}

/**
 * Required: set 'ot_theme_mode' filter to true.
 */
add_filter( 'ot_theme_mode' , '__return_true' );

add_action( 'wp_ajax_nopriv_hover_post' , 'hover_posts' ); 
add_action( 'wp_ajax_hover_post' , 'hover_posts' ); 
function hover_posts()
{
global $post;
    $pagename=isset($_REQUEST['page_name']) ? $_REQUEST['page_name'] : 'ENVIRONMENT';
    $obj=get_page_by_title( $pagename, $output = OBJECT, $post_type = 'page' );
     $args = array ( 'orderby' => 'menu_order', // Allows users to set order of subpages //Enter code to display for each subpage here. For example, list items // containing featured thumbnails, page titles and permalinks to // the pages. 
                        'order' => 'ASC',
                        'posts_per_page' => 3,
						'post_parent' => $obj->ID,
						'post_type' => 'page',
						'post_status' => 'publish' );
						$postslist = get_posts($args);
						foreach ( $postslist as $post ) : setup_postdata( $post );
						echo '<div class="col-md-4" id="featuredpage2">';
                        echo the_post_thumbnail( 'featured' );
                        echo '<p id="featuretitle">';
                        echo the_title();
                        echo '</p>';
                        echo '<p id="featuredesc">'.get_the_excerpt().'</p>';
                        echo '</div><!--End Featured-page 1-->';
						endforeach;
      die();

}


?>
	
