<?php
/**
 * Template Name: 网站地图
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
						<section class="sitemap-module">
							<div class="title"><i class="fa fa-folder"></i> 所有分类</div>
							<div class="content">
								<?php
									$terms = get_terms('category', 'orderby=name&hide_empty=0' );
									$count = count($terms);
									if($count > 0){
										foreach ($terms as $term) {
											echo '<a href="'.get_term_link($term, $term->slug).'" class="btn btn-primary">'.$term->name.'</a>';
										}
									}
								?>
							</div>
						</section>

						<section class="sitemap-module tags">
							<div class="title"><i class="fa fa-tags"></i> 所有标签</div>
							<div class="content">
								<?php wp_tag_cloud( 'smallest=14&largest=14&orderby=count&unit=px&order=DESC' );?>
							</div>
						</section>
			    
						<section class="sitemap-module">
							<div class="title"><i class="fa fa-file-code-o"></i> 所有页面</div>
							<div class="content">
								<?php
									$myposts = get_posts('numberposts=-1&orderby=post_date&order=DESC&post_type=page');

									foreach($myposts as $post) :
										setup_postdata($post);
								?>
									<a href="<?php the_permalink(); ?>" class="btn btn-primary"><?php the_title(); ?></a>
								<?php endforeach; ?> 
							</div>
						</section>

						<?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
						<section class="sitemap-module">
							<div class="title"><i class="fa fa-book"></i> 所有文章</div>
							<div class="content">
								<?php
									$myposts = get_posts('numberposts=-1&orderby=post_date&order=DESC');

									foreach($myposts as $post) :
										setup_postdata($post);
								?>
									<a href="<?php the_permalink(); ?>" class="btn btn-primary"><?php the_title(); ?></a>
								<?php endforeach; ?>
							</div>
						</section>

		      <?php endwhile; ?>
			  </article>
	    </div>
	    <?php get_sidebar(); ?>
    </div>	
	</div>
</section>
<?php get_footer(); ?>
</body>
</html>