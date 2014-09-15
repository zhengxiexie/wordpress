<article class="zan-article">

	<!-- 面包屑 -->
	<div class="breadcrumb">
    <?php 
    	if(function_exists( 'bcn_display' ) ) {
      	echo '<i class="fa fa-map-marker"></i> ';
      	bcn_display();
    	}
    ?>
	</div>
	<!-- 面包屑结束 -->

  <!-- 大型设备文章显示 -->
  <div class="hidden-xs">
    <p class="post-big-info">
      <span class="label label-zan"><i class="fa fa-calendar"></i> <?php the_time( 'm月j日, Y' ); ?></span>
      <span class="label label-zan"><i class="fa fa-tags"></i> <?php the_category(' '); ?></span>
      <span class="label label-zan"><i class="fa fa-user"></i> <?php the_author_posts_link(); ?></span>
      <span class="label label-zan"><i class="fa fa-eye"></i> <?php if( function_exists( 'the_views' ) ) { the_views(); } ?></span>
    </p>
  </div>
  <!-- 大型设备文章显示结束 -->

  <!-- 小型设备文章显示 -->
  <div class="visible-xs">
    <p class="post-info">
      <span><i class="fa fa-calendar"></i> <?php the_time( 'm月j日, Y' ); ?></span>
      <span><i class="fa fa-eye"></i> <?php if( function_exists( 'the_views' ) ) { the_views(); } ?></span>
    </p>
  </div>
  <!-- 小型设备文章显示结束 -->

	<div class="zan-single-content">				                 
		<?php the_content(); ?>
  </div>
  <div class="zan-share clearfix">

  	<!-- 百度分享 -->
    <div class="bdsharebuttonbox pull-right">
      <a href="#" class="bds_more" data-cmd="more"></a>
      <a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a>
      <a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a>
      <a href="#" class="bds_tqq hidden-xs" data-cmd="tqq" title="分享到腾讯微博"></a>
      <a href="#" class="bds_weixin hidden-xs" data-cmd="weixin" title="分享到微信"></a>
    </div>
    <!-- 百度分享结束 -->

    <!-- 喜欢功能 -->
    <div class="post-like pull-left">
      <a href="javascript:;" data-url="<?php echo admin_url('admin-ajax.php'); ?>"  data-action="ding" data-id="<?php the_ID(); ?>" class="btn btn-zan-line-pp favorite<?php if(isset($_COOKIE['zan_ding_'.$post->ID])) echo ' done';?>">
       	<i class="fa fa-heart"></i>
       	<span class="count">
          <?php if( get_post_meta($post->ID,'zan_ding',true) ){            
            echo get_post_meta($post->ID,'zan_ding',true);
          } else {
            echo '0';
          }?>
      	</span>
      </a>
	 </div>
	 <!-- 喜欢功能结束 -->

  </div>

  <!-- 分页 -->
  <div clas="zan-page">
    <ul class="pager">
      <li class="previous"><?php previous_post_link( '%link', '<i class="fa fa-angle-left"></i> 上一篇', TRUE ); ?></li>
      <li class="next"><?php next_post_link( '%link', '下一篇 <i class="fa fa-angle-right"></i>', TRUE ); ?></li>
    </ul>
  </div>
  <!-- 分页结束 -->
    
</article>