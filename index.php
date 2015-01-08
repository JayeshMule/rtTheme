<?php
/**
 * MainaPage Doc Comment
 *
 * @category MainaPage
 * @package  MainaPage
 * @author   J N MULE <author@example.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     http://www.hashbangcode.com/
 *
 */
 get_header();?>	
       <div id="wrap1" >
            <div id="controller">
			    <div id="pager"> </div>
				<div id="prev"> </div>
				<div id="next"> </div>
			</div>

			<div id="slider">
			       <?php
                       query_posts(array( 'category_name' => 'featured' , 'posts_per_page'=>5 ));
                       if ( have_posts() ): while( have_posts() ): the_post();
                   ?>
					<div id="items">
                            <?php global $post_id; if ( get_the_post_thumbnail($post_id) != '' ) { the_post_thumbnail('featured'); }
                            else {

 echo '<a href="'; the_permalink(); echo '" class="thumbnail-wrapper">';
 echo '<img src="';
 echo catch_that_image();
 echo '" alt="" />';
 echo '</a>';

}?>
						<div class="info">
							<p class="game-title"><?php the_title();?></p>
<?php if ( $post->post_excerpt ) { 
                 the_excerpt();  
} else {
                 the_content(); 
}
?>
						</div><!--End caption-->
						</div>
						<?php
                            endwhile;
                            endif;
                            wp_reset_query();
                        ?>
			
			</div><!--End slider-->
		</div><!--End Wrap-->
			<div id="Wrap2">
				<div id="featured-Page">
					<div class="row">
						<div class="col-md-3" id="sub-page-link" style="padding-left:0px">    <!--shalmon  -->
							<ul>
                                <?php
                                $children = wp_list_pages( 'title_li=&child_of='.$post->ID.'&=0&depth=1' );
                                if ( $children ) { ?>
                                <?php echo $children; ?>
                                <?php } ?>
							</ul> 
						</div><!--End Sub age Links-->
						<div class="col-xs-9" id="featuredpage">
                         
						</div><!--End col-xs 9 -->
					</div><!--End Featured-rows-->
				</div><!--End Featured-Page-->
			</div><!--End Wrap2-->
		
		<div id="wrap3">
				<div id="Widgets">
					<div id="full-width">
							<div class="row">
									<div class="col-md-3">
									<?php dynamic_sidebar('footer-widgets-1');?>
									</div><!--End Widget1-->
									<div class="col-md-3">
									<?php dynamic_sidebar('footer-widgets-2');?>
									</div><!--End Widget2-->
									<div class="col-md-3" id="socialmedia">
									<div class="widgettitle">
										STAY IN TOUCH
										</div>
								<div id="widget3">
											<ul>
											<?php if ( function_exists ( 'ot_get_option' ) ) {
											         $fb=ot_get_option ( 'facebook' );
											         $tw=ot_get_option ( 'twitter' );
											         $li=ot_get_option ( 'linkedin' );
											         $rss=ot_get_option('rss');
											     } 
											?>
											<?php if($fb!="") {?>
											    <li><a href="<?php echo $fb ?>" target=”_blank”><img src="<?php bloginfo ( 'template_directory' ); ?>/img/facebookhover.jpg"/><img src="<?php bloginfo ( 'template_directory' );?>/img/facebook.jpg"/>Facebook</a></li>
											<?php }?>
											<?php if($tw!="") {?>
											   <li><a href="<?php echo $tw ?>" target=”_blank”><img src="<?php bloginfo ( 'template_directory' ); ?>/img/twitterhover.jpg" /><img src="<?php bloginfo ( 'template_directory' ); ?>/img/twitter.jpg"/>Twitter</a></li>
											<?php }?>
											<?php if($li!="") {?>
											   <li><a href="<?php echo $li ?>" target=”_blank”><img src="<?php bloginfo ( 'template_directory' ); ?>/img/linkedinhover.jpg" /><img src="<?php bloginfo ( 'template_directory' ); ?>/img/linkedin.jpg"/>Linked In</a></li>
											<?php }?>
											<?php if($rss!="") {?>
											   <li><a href="<?php echo $rss ?>" target=”_blank”><img src="<?php bloginfo ( 'template_directory' ); ?>/img/rsshover.jpg" /><img src="<?php bloginfo ( 'template_directory' ); ?>/img/rss.jpg"/>RSS</a></li>
											<?php }?>
											</ul>
										</div>
									</div><!--End Widget3-->
									<div class="col-md-3">
			  						<?php dynamic_sidebar ( 'footer-widgets-4' ); ?>
									</div><!--End Widget4-->
									
							</div><!--End Featured-widget row--> 
						</div><!--End full-widths-->		
		</div><!--End Widgets-->
		</div><!--End Wrap3-->
<?php get_footer();?>		