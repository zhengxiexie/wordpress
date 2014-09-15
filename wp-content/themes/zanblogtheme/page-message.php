<?php
/**
 * Template Name: 留言板
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
				<article class="zan-article">

			    <!-- 面包屑 -->
			    <div class="breadcrumb">
			      <?php 
			        if( function_exists( 'bcn_display' ) ) {
			          echo '<i class="fa fa-map-marker"></i> ';
			          bcn_display();
			        }
			      ?>
			    </div>
			    <!-- 面包屑结束 -->

			    <?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
		       <?php the_content(); ?>
		      <?php endwhile; ?>
			  </article>

				<!-- 读者墙 -->
			  <div class="readers-list">
			  	<?php zan_user_list(18); ?>
				</div>
				<!-- 读者墙结束 -->

		    <?php comments_template(); ?>
	    </div>
	    <?php get_sidebar(); ?>
    </div>	
	</div>
</section>
<?php get_footer(); ?>
</body>
</html>