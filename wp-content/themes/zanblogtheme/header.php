<?php
/**
 * Header 主题文件
 *
 * @package    YEAHZAN
 * @subpackage ZanBlog
 * @since      ZanBlog 3.0.2
 */
?>

<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 7 ]><html class="ie ie7" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 8 ]><html class="ie ie8" <?php language_attributes(); ?>><![endif]-->
<!--[if (gte IE 9)|!(IE)]><html <?php language_attributes(); ?>><![endif]-->
<html <?php language_attributes(); ?>>
<head>
<title>
  <?php
    global $page, $paged;
    $site_description = get_bloginfo( 'description', 'display' );
    if ($site_description && ( is_home() || is_front_page() )) {
      bloginfo('name');
      echo " - $site_description";
    } else {
      echo trim(wp_title('',0));
      if ( $paged >= 2 || $page >= 2 )
        echo ' - ' . sprintf( __( '第%s页' ), max( $paged, $page ) );
      echo ' | ' ;
      bloginfo('name');
    }
  ?>
</title>

<?php if (is_home() || is_front_page())
  {
    $description = get_option( 'zan_description' );
    $keywords = get_option( 'zan_keywords' );
  }
  elseif (is_category())
  {
    $description = strip_tags(trim(category_description()));
    $keywords = single_cat_title('', false);
  }
  elseif (is_tag())
  {
    $description = sprintf( __( '与标签 %s 相关联的文章列表'), single_tag_title('', false));
    $keywords = single_tag_title('', false);
  }
  elseif (is_single())
  {
    if ($post->post_excerpt) {$description = $post->post_excerpt;} 
    else {$description = mb_strimwidth(strip_tags($post->post_content),0,110,"");}
    $keywords = "";
    $tags = wp_get_post_tags($post->ID);
    foreach ($tags as $tag ) {$keywords = $keywords . $tag->name . ", ";}
  }
  else
  {
    $description = get_option( 'zan_description' );
    $keywords = get_option( 'zan_keywords' );
  }
?>
<meta name="keywords" content="<?php echo $keywords ?>" />

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<link rel="icon" type="image/x-icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
<?php wp_head(); ?>
<!--[if lt IE 9]>
  <script src="<?php echo get_template_directory_uri(); ?>/ui/js/modernizr.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/ui/js/respond.min.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/ui/js/html5shiv.js"></script>
<![endif]-->
<script>
var _hmt = _hmt || [];
(function() {
	  var hm = document.createElement("script");
	    hm.src = "//hm.baidu.com/hm.js?fe24de568008d193edf3e7fb22846af3";
	    var s = document.getElementsByTagName("script")[0]; 
		  s.parentNode.insertBefore(hm, s);

})();
</script>

</head>
<body <?php body_class(); ?>>
  <header id="zan-header">

    <!-- logo -->
    <div class="header">
<!--<a href="<?php echo get_option('home'); ?>" class="logo" data-toggle="animation"></a> -->
		<div class="headerTexts">
			<h1 class="siteTitle" ><a href="/"><?php bloginfo(name); ?></a></h1>
			<h2 class="siteDescription"><?php bloginfo(description); ?></h2>
		</div>
	</div>
    </div>
    <!-- logo结束 -->
    <!-- 导航 -->
    <nav class="navbar navbar-inverse" id="zan-nav">
      <div class="container clearfix">
        <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="sr-only">下拉框</span>
          <span class="fa fa-reorder fa-lg"></span>
        </button>
		<a href="http://www.feed43.com/2480770485667041.xml">aaa</a>
        <div class="navbar-collapse collapse">
          <?php
            $defaults = array(
              'container' => '',
              'menu_class' => 'nav navbar-nav',
              'walker' => new Zan_Nav_Menu('')
            );
            wp_nav_menu( $defaults );
          ?>
        </div>
      </div>
    </nav>
    <!-- 导航结束 -->
		<img src="http://png.findicons.com/files/icons/1984/woodgrain_a_free_social_media/70/rss.png" >

  </header>
