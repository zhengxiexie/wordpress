<?php
/**
 * Category 主题文件
 *
 * @package    YEAHZAN
 * @subpackage ZanBlog
 * @since      ZanBlog 3.0.2
 */
?>

<?php get_header(); ?>
<section id="zan-bodyer">
	<div class="container">
		<div class="row">
			<div class="col-md-8" id="mainstay">
        
        <!-- 面包屑 -->
        <div class="breadcrumb" id="zan-breadcrumb">
          <?php 
            if( function_exists( 'bcn_display' ) ) {
              echo '<i class="fa fa-map-marker"></i> ';
              bcn_display();
            }
          ?>
        </div>
        <!-- 面包屑结束 -->

        <!-- 内容主体 -->
        <div id="article-list">
          <?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
              <?php get_template_part( 'includes/post-format/content', get_post_format() ); ?>
          <?php endwhile; ?>
        </div>
        <!-- 内容主体结束 -->

        <!-- 分页 -->
        <?php if ( function_exists( 'show_paginate' ) ) { show_paginate(); } ?>
        <!-- 分页结束 -->

      </div>
			<?php get_sidebar(); ?>
		</div>
	</div>
</section>
<?php get_footer(); ?>
</body>
</html>