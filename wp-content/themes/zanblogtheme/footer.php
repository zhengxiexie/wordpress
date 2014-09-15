<?php
/**
 * Footer 主题文件
 *
 * @package    YEAHZAN
 * @subpackage ZanBlog
 * @since      ZanBlog 3.0.2
 */
?>

<footer id="zan-footer">
	<section class="zan-copyright">
		<div class="container">
			<?php echo stripslashes( get_option( 'zan_footer' ) ); ?>  Theme By <a href="http://www.zanwp.com/"  target="_blank">ZANWP</a>
		  <!--统计代码开始-->
		  <?php $analytics = get_option( 'zan_analytics' );if ( $analytics != "" ) : ?>
		    <?php echo stripslashes( $analytics ); ?>
		  <?php endif ?>
		  <!--统计代码结束-->
		</div>
	</section>
</footer>
<div id="zan-gotop">
  <div class="gotop visible-lg">
    <i class="fa fa-chevron-up"></i>
  </div>
</div>
<?php wp_footer(); ?>
