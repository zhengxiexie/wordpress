<article class="zan-post clearfix">
  <?php if( is_sticky() && is_home() ) echo '<i class="fa fa-bookmark article-stick"></i>';?>

	<!-- 大型设备文章显示 -->
	<section class="visible-md visible-lg">
    <div class="category-cloud"><?php the_category(' '); ?></div>
		<h3>
			<a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
		</h3>
		<hr>
    <?php if ( has_post_thumbnail() ) { ?>
      <?php if( get_post_meta( $post->ID, "首页显示图片大小:", true ) == "大图" ) { ?>
        <div class="row ">
         <div class="col-md-12"> 
            <figure class="thumbnail"><a href="<?php the_permalink() ?>"><?php the_post_thumbnail( 'large' ); ?></a></figure>  
          </div>      
          <div class="col-md-12 zan-outline">
          <?php if ( !empty($post->post_excerpt) ) { ?>
            <?php the_excerpt() ?>
          <?php } else {?>  
            <?php echo mb_strimwidth( strip_tags( apply_filters( 'the_content', $post->post_content ) ), 0, 180,"..." ); ?>
          <?php } ?>     
          </div>
        </div>
      <?php } else {?>
        <div class="row">
          <div class="col-md-5">
            <figure class="thumbnail zan-thumb"><a href="<?php the_permalink() ?>"><?php the_post_thumbnail( 'medium' ); ?></a></figure>  
          </div>            
          <div class="col-md-7 visible-lg zan-outline">         
            <?php if ( !empty($post->post_excerpt) ) { ?>
              <?php the_excerpt() ?>
            <?php } else {?>  
              <?php echo mb_strimwidth( strip_tags( apply_filters( 'the_content', $post->post_content ) ), 0, 250,"..." ); ?>
            <?php } ?>
          </div>
          <div class="col-md-7 visible-md zan-outline">         
            <?php if ( !empty($post->post_excerpt) ) { ?>
              <?php the_excerpt() ?>
            <?php } else {?>  
              <?php echo mb_strimwidth( strip_tags( apply_filters( 'the_content', $post->post_content ) ), 0, 180,"..." ); ?>
            <?php } ?> 
          </div>
        </div>
      <?php } ?> 
    <?php } else {?>
      <div class="row">
        <div class="col-md-12 zan-outline">          
          <?php if ( !empty($post->post_excerpt) ) { ?>
            <?php the_excerpt() ?>
          <?php } else {?>  
            <?php echo mb_strimwidth( strip_tags( apply_filters( 'the_content', $post->post_content ) ), 0, 250,"..." ); ?>
          <?php } ?> 
        </div>
      </div> 
    <?php } ?>
    <hr>
		<div class="pull-right post-info">
			<span><i class="fa fa-calendar"></i> <?php  the_time( 'm月j日, Y' ); ?></span>
			<span><i class="fa fa-user"></i> <?php the_author_posts_link(); ?></span>
			<span><i class="fa fa-eye"></i> <?php if( function_exists( 'the_views' ) ) { the_views(); print '次'; } ?></span>
      <span><i class="fa fa-comment"></i> <a href="<?php the_permalink() ?>#comments"><?php comments_number( '0', '1', '%' ); ?></a></span>
      <?php edit_post_link( '<span><i class="fa fa-edit"></i> 编辑', ' ', '</span>'); ?>
		</div>
	</section>
	<!-- 大型设备文章显示结束 -->

	<!-- 小型设备文章显示 -->
	<section class="visible-xs  visible-sm">
		<div class="title-article">
			<h4><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h4>
		</div>
		<p class="post-info">
			<span><i class="fa fa-calendar"></i> <?php the_time( 'm月j日, Y' ); ?></span>
			<span><i class="fa fa-eye"></i> <?php if( function_exists( 'the_views' ) ) { the_views(); print '次'; } ?></span>
		</p>
		<div class="content-article">
      <figure class="thumbnail"><a href="<?php the_permalink() ?>"><?php the_post_thumbnail( 'large' ); ?></a></figure>		
			<div class="well">
        <?php if ( !empty($post->post_excerpt) ) { ?>
          <?php the_excerpt() ?>
        <?php } else {?>  
          <?php echo mb_strimwidth( strip_tags( apply_filters( 'the_content', $post->post_content ) ), 0, 150,"..." ); ?>
        <?php } ?>
			</div>
		</div>
		<a class="btn btn-zan-line-pp btn-block" href="<?php the_permalink() ?>"  title="详细阅读 <?php the_title(); ?>">阅读全文 <span class="badge"><?php comments_number( '0', '1', '%' ); ?></span></a>
	</section>
	<!-- 小型设备文章显示结束 -->

</article>