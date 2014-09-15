<?php
/**
 * Single 主题文件
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

				<?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
					<?php get_template_part( 'includes/post-format/single', get_post_format() ); ?>
				<?php endwhile; wp_reset_query(); ?>
				
				<?php comments_template(); ?>								
			</div>
			<?php get_sidebar(); ?>
		</div>
	</div>
</section>
<?php get_footer(); ?>
<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"1","bdSize":"32"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
</body>
</html>