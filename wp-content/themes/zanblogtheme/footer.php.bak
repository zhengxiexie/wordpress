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
	<section class="zan-link" id="zan-link">
		<div class="container">
      <div class="row">
          <div class="col-md-4">
              <div class="footer-column about">
                  <h4>
                      关于我们
                  </h4>
                  <div class="content">
                      <?php echo stripslashes( get_option( 'zan_about' ) ); ?>
                  </div>
              </div>
              <div class="footer-column about">
                  <h4>
                      联系我们
                  </h4>
                  <div class="content">
                      <?php echo stripslashes( get_option( 'zan_contact' ) ); ?>
                  </div>
              </div>
          </div>
          <div class="col-md-4">
              <div class="footer-column tag">
                  <h4>
                       热门标签
                  </h4>
                  <div class="content clearfix">
                      <?php if( get_option( 'zan_hot_tags' ) ) { ?>
                        <?php wp_tag_cloud( 'smallest=14&largest=14&orderby=count&unit=px&number='.get_option( 'zan_hot_tags' ).'&order=RAND' );?>
                      <?php } else {?>
                        <?php wp_tag_cloud( 'smallest=14&largest=14&orderby=count&unit=px&number=15&order=RAND' );?>
                      <?php } ?>
                  </div>
              </div>
          </div>
          <div class="col-md-4">
               <div class="footer-column friend-link">
                  <h4>
                      友情链接
                  </h4>
                  <div class="content">
                      <ul class="clearfix">
                          <?php wp_list_bookmarks( 'title_li=&categorize=0' ); ?>
                      </ul>
                  </div>
              </div>
          </div>
      </div>
  	</div>
	</section>
	<section class="footer-space">
    <div class="footer-space-line"></div>
  </section>
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