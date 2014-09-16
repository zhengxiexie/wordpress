<?php
/*
* Template Name: All posts
* */
?>

<?php get_header(); ?>
<section id="zan-bodyer">
	<div class="container">
		<div class="row">
			<div class="col-md-8" id="mainstay">
				<article class="zan-article">

               <div class="entry">
                    <?php the_content(); ?>
                    <?php
                    $current_date ="";
                    $count_posts = wp_count_posts();
                    $nextpost = 0;
                    $published_posts = $count_posts->publish;
                    $myposts = get_posts(array('posts_per_page'=>$published_posts));
                 foreach($myposts as $post) :
                         $nextpost++;
                         setup_postdata($post);
                         $date = get_the_date("Y.m");
                         if($current_date!=$date):
                              if($nextpost>1): ?>
                                   </ol>
                              <?php endif; ?>
							  <strong><?php echo $date; ?></strong>
							  <br/>
							  <br/>
							  <ol start = "<?php echo $nextpost; ?>">
                              <?php $current_date=$date;
                         endif; ?>
                         <li><?php the_title(); ?> &bull; <a href = "<?php the_permalink(); ?>">link</a></li>
                    <?php endforeach; wp_reset_postdata(); ?>
                    </ol>
              </div>

				</article>
			</div>
			<?php get_sidebar(); ?>
		</div>
	</div>
</section>
<?php get_footer(); ?>
</body>
</html>
