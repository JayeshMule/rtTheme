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
 ?>
<div id="footer">
			<div class="row">
				<div class="col-md-8">
                  <?php /*wordpress footer menu*/
                  wp_nav_menu( array( 
                  'container_class'=>'footer-nav' ,
                  'container' =>'nav' , 
                  'theme_location' => 'secondary' 
                  ) );
                  ?>
						<?php /*Theme Option footer text update */
											if ( function_exists( 'ot_get_option' ) )
											{
												$footertext = ot_get_option( 'footer_text' );
												
											} ?>
											<?php if ( $footertext != "" ) {?>
											<p id="copyright"><?php echo $footertext;?></p>
											<?php } else {?>
											<p id="copyright">&copy; 2014 rtPanel.All Rights Are Reserved.Designed By rtCamp</p>
											<?php }?>
				</div>
				<div class="col-md-4">
					<?php /*Theme Option footer LOGO upload */
											if ( function_exists ( 'ot_get_option' ) )
											{
												$footerlogo= ot_get_option( 'footerogo' );
											
											} ?>
											<?php if( $footerlogo!="" ) {?>
											      <h1><a href="#"><img src="<?php echo $footerlogo; ?>"/></a></h1>		
											<?php } else {?>
											       <h1><a href="#"><img src="<?php bloginfo( 'template_directory' );?>/img/footer-logo.png"/></a></h1>
											<?php }?>
				</div>
			</div>	
		</div><!--End Footer-->
	</div><!--End main-->		
</div><!--End Wrapper-->
  
  <script src="<?php bloginfo( 'template_directory' );?>/lib/js/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="<?php bloginfo( 'template_directory' );?>/lib/js/jquery.cycle.all.js" /></script>

<script type="text/javascript">
$('#slider').cycle({ 
    fx:      'scrollVert', 
	pager:   '#pager',
    prev:    '#prev', 
    next:    '#next',
	timeout:  0	
});

$('#show-nav').click(function(){
	$('.main-nav').toggle("slow");
	$('#close-nav').show("slow");
});
$('#close-nav').click(function(){
	$('.main-nav').toggle("slow");
	$('#close-nav').hide("slow");
});

 $('#sub-page-link').find('a').mouseover(function()
    {
    var pagename=$(this).text();
   
    var ajaxurl='<?php echo esc_url( admin_url( 'admin-ajax.php', 'relative' ) ); ?>';
        $.ajax({
        type:'POST',
        url: ajaxurl,
        data: {
            'action': "hover_post",
            'page_name': pagename
        },
        dataType: 'html',
        success:function(data) {
            // This outputs the result of the ajax request
            $('#featuredpage').html(data);
        },
        error: function(errorThrown){
            console.log(errorThrown);
        }
    });  

});
  $('document').ready(function(){
    var pagename='FINDINGS';
   
    var ajaxurl='<?php echo admin_url( 'admin-ajax.php' ); ?>';
     console.log(ajaxurl);
        $.ajax({
        type:'POST',
        url: ajaxurl,
        data: {
            'action': "hover_post",
            'page_name': pagename
        },
        dataType: 'html',
        success:function(data) {
            // This outputs the result of the ajax request
            $('#featuredpage').html(data);
        },
        error: function(errorThrown){
            console.log(errorThrown);
        }
    });  

});   
</script>
<?php wp_footer(); ?>
</body>
</html>
