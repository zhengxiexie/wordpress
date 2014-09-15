<?php
/**
 * Theme-Functions 主要函数
 *
 * @package 	  ZanBlog
 * @subpackage  Include
 * @since 		  3.0.2
 * @author      YEAHZAN
 */

define( 'THEME_VERSION', '3.0.2' );

// 注册加载JS & CSS文件
add_action( 'wp_enqueue_scripts', 'zan_register_scripts' );

// 设定后台特色图像
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 75, 75, true );
add_image_size( 'medium', 400, 240 );
add_image_size( 'large', 750, 450 );

// 开启链接管理（包括友情链接）
add_filter( 'pre_option_link_manager_enabled', '__return_true' );

// 去除WordPress版本显示
add_filter( 'the_generator', 'remove_version' );

// 禁用谷歌字体链接
add_filter( 'gettext_with_context', 'disable_open_sans', 888, 4 );

// 隐藏admin bar
add_filter( 'show_admin_bar', '__return_false' );

// 搜索结果只显示文章
add_filter('pre_get_posts','search_filter');

// 添加文章的显示形式
add_theme_support( 'post-formats', array( 'status', 'audio', 'video' ));

/**
 * 注册CSS & JS文件
 *
 * @since  3.0.0
 * @return void
 */
function zan_register_scripts() {

	// 注册bootstrap.min.js
	wp_register_script( 'bootstrap', get_template_directory_uri() . '/ui/js/bootstrap.min.js', 'jquery', '3.1.1', true );

	// 注册jquery.flexslider.js
	wp_register_script( 'flexslider', get_template_directory_uri() . '/ui/flexslider/jquery.flexslider.js', 'jquery', THEME_VERSION, true );

	// 注册jquery.validate.js
	wp_register_script( 'validate', get_template_directory_uri() . '/ui/js/jquery.validate.js', 'jquery', THEME_VERSION, true );

  // 注册audiojs.min.js
  wp_register_script( 'audiojs', get_template_directory_uri() . '/ui/audiojs/audio.min.js', 'jquery', THEME_VERSION, true );

  // 注册shine.min.js
  wp_register_script( 'shine', get_template_directory_uri() . '/ui/js/shine.min.js', 'jquery', THEME_VERSION, true );

  // lazyload.js
  wp_register_script( 'lazyload', get_template_directory_uri() . '/ui/js/jquery.lazyload.min.js', 'jquery', '1.7.2', true );

	// 注册zan.js
	wp_register_script( 'zan', get_template_directory_uri() . '/ui/js/zan.js', 'jquery', THEME_VERSION, true );

	// 注册用户自定义custom.js
	wp_register_script( 'custom', get_template_directory_uri() . '/ui/js/custom.js', 'jquery', THEME_VERSION, true );

	// 注册bootstrap.min.css
	wp_register_style( 'bootstrap', get_template_directory_uri() . '/ui/css/bootstrap.min.css', '', '3.1.1' );

	// 注册font-awesome.min.css
	wp_register_style( 'fontawesome', get_template_directory_uri() . '/ui/font-awesome/css/font-awesome.min.css', '', '4.0.1' );

	// 注册flexslider.css
	wp_register_style( 'flexslider', get_template_directory_uri() . '/ui/flexslider/flexslider.css', '', '2.0' );

	// 注册zan.css
	wp_register_style( 'zan', get_template_directory_uri() . '/ui/css/zan.css', '', THEME_VERSION );

	// 注册用户自定义custom.css
	wp_register_style( 'custom', get_template_directory_uri() . '/ui/css/custom.css', '', THEME_VERSION );

	// 调用加载函数
	zan_enqueue_scripts();
}

/**
 * 加载CSS & JS文件
 *
 * @since  3.0.0
 * @return void
 */
function zan_enqueue_scripts() {
  wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'bootstrap' );
  wp_enqueue_script( 'flexslider' );
  wp_enqueue_script( 'validate' );
  wp_enqueue_script( 'audiojs' );
  wp_enqueue_script( 'shine' );
  wp_enqueue_script( 'lazyload' );
	wp_enqueue_script( 'zan' );
	wp_enqueue_script( 'custom' );
	wp_enqueue_style( 'bootstrap' );
	wp_enqueue_style( 'fontawesome' );
  wp_enqueue_style( 'flexslider' );
	wp_enqueue_style( 'zan' );
	wp_enqueue_style( 'custom' );

}

/**
 * 获取最热文章
 *
 * @since 3.0.0
 * @return array [最热文章数组]
 */
function zan_get_hotest_posts($num) {
	$args = array(
		'posts_per_page'   => $num,
		'offset'           => 0,
		'category'         => '',
		'orderby'          => 'comment_count',
		'order'            => 'DESC',
		'include'          => '',
		'exclude'          => '',
		'meta_key'         => '',
		'meta_value'       => '',
		'post_type'        => 'post',
		'post_mime_type'   => '',
		'post_parent'      => '',
		'post_status'      => 'publish',
		'suppress_filters' => true
	);

	return get_posts($args);
}

/**
 * 获取最新文章
 *
 * @since 3.0.0
 * @return array [最新文章数组]
 */
function zan_get_latest_posts($num) {
  $args = array(
    'posts_per_page'   => $num,
    'offset'           => 0,
    'category'         => '',
    'orderby'          => 'post_date',
    'order'            => 'DESC',
    'include'          => '',
    'exclude'          => '',
    'meta_key'         => '',
    'meta_value'       => '',
    'post_type'        => 'post',
    'post_mime_type'   => '',
    'post_parent'      => '',
    'post_status'      => 'publish',
    'suppress_filters' => true
  );

  return get_posts($args);
}

/**
 * 获取随机文章
 *
 * @since 3.0.2
 * @return array [最新文章数组]
 */
function zan_get_rand_posts($num) {
  $args = array(
    'posts_per_page'   => $num,
    'offset'           => 0,
    'category'         => '',
    'orderby'          => 'rand',
    'order'            => 'DESC',
    'include'          => '',
    'exclude'          => '',
    'meta_key'         => '',
    'meta_value'       => '',
    'post_type'        => 'post',
    'post_mime_type'   => '',
    'post_parent'      => '',
    'post_status'      => 'publish',
    'suppress_filters' => true
  );

  return get_posts($args);
}

/**
 * 获取最新评论（排除作者评论）
 *
 * @since 3.0.0
 * @return array [最新评论数组]
 */
function zan_get_latest_comments($num) {
	$args = array(
		'author_email' => '',
		'ID' => '',
		'karma' => '',
		'number' => $num,
		'offset' => '',
		'orderby' => 'comment_date',
		'order' => 'DESC',
		'parent' => '',
		'post_id' => 0,
		'post_author' => '',
		'post_name' => '',
		'post_parent' => '',
		'post_status' => 'publish',
		'post_type' => '',
		'status' => 'approve',
		'type' => 'comment',
		'user_id' => '',
		'search' => '',
		'count' => false,
		'meta_key' => '',
		'meta_value' => '',
		'meta_query' => '',
	); 

	return get_comments($args);
}

/**
 * 获取文章分类列表
 *
 * @since 3.0.0
 * @return array [文章分类列表]
 */
function zan_get_posts_category($exclude) {
  $args = array(
    'show_option_all'    => '',
    'orderby'            => 'name',
    'order'              => 'ASC',
    'style'              => 'none',
    'show_count'         => 0,
    'hide_empty'         => 1,
    'use_desc_for_title' => 1,
    'child_of'           => 0,
    'feed'               => '',
    'feed_type'          => '',
    'feed_image'         => '',
    'exclude'            => $exclude,
    'exclude_tree'       => '',
    'include'            => '',
    'hierarchical'       => 1,
    'title_li'           => __( 'Categories' ),
    'show_option_none'   => '',
    'number'             => null,
    'echo'               => 1,
    'depth'              => 1,
    'current_category'   => 0,
    'pad_counts'         => 0,
    'taxonomy'           => 'category',
    'walker'             => null
  );

  return wp_list_categories($args);
}

/**
 * 获取评论列表
 *
 * @since 3.0.0
 * @return array [评论列表]
 */
function zan_get_commments_list($size) {
	$args = array(
		'walker'            => null,
		'max_depth'         => '',
		'style'             => 'ol',
		'callback'          => null,
		'end-callback'      => null,
		'type'              => 'all',
		'reply_text'        => '回复',
		'page'              => '',
		'avatar_size'       => $size,
		'reverse_top_level' => null,
		'reverse_children'  => '',
		'format'            => 'html5',
		'short_ping'        => false,
    'echo'              => true 
	);

  return wp_list_comments($args);
}

/**
 * 获取评论分页
 *
 * @since 3.0.0
 * @return array [评论分页]
 */
function zan_comments_pagination() {
  $args = array(
    'prev_text'    => __( '«' ),
    'next_text'    => __( '»' )
  );

  return paginate_comments_links($args);
}

/**
 * 评论表单
 *
 * @since 3.0.0
 * @return array [自定义表单]
 */
function zan_comments_form() {
  $args = array(
    'title_reply'          => '<i class="fa fa-pencil"></i> 欢迎留言',
    'title_reply_to'       => __( '回复 %s' ),
    'cancel_reply_link'    => __( '取消回复' ),
    'fields'               => array(
                        'author' => '<div class="row"><div class="col-sm-4"><div class="input-group"><span class="input-group-addon"><i class="fa fa-user"></i></span><input type="text" name="author" id="author" placeholder="* 昵称"></div></div>',
                        'email'  => '<div class="col-sm-4"><div class="input-group"><span class="input-group-addon"><i class="fa fa-envelope-o"></i></span><input type="text" name="email" id="email" placeholder="* 邮箱"></div></div>',
                        'url'    => '<div class="col-sm-4"><div class="input-group"><span class="input-group-addon"><i class="fa fa-link"></i></span><input type="text" name="url" id="url" placeholder="网站"></div></div></div>'
    ),
    'comment_field'        => '<textarea id="comment" placeholder="赶快发表你的见解吧！" name="comment" cols="45" rows="8" aria-required="true"></textarea>',
    'comment_notes_before' => '<div id="commentform-error" class="alert hidden"></div>',
    'comment_notes_after' => ''

  );
  return comment_form($args);
}

/**
 * 可支持分类的分页功能
 *
 * @since 3.0.0
 * @return void
 */
if ( !function_exists( 'paginate' ) ):
  function paginate( $args = null ) {
    $range_gap = 3;         
    if (get_option( 'zan_paginate_num' ) != '' && intval( get_option( 'zan_paginate_num' ) ) > 0) {
      $range_gap = intval( get_option( 'zan_paginate_num' ) );
    }        
    $defaults = array( 'page'=>null, 'pages'=>null, 'range'=>$range_gap, 'gap'=>$range_gap, 'anchor'=>1, 'echo'=>1 );        
    $r = wp_parse_args( $args, $defaults );
    extract($r, EXTR_SKIP);       
    if ( !$page && !$pages ) {
      global $wp_query;           
      $page = get_query_var( 'paged' );
      $page = ! empty( $page ) ? intval( $page ) : 1;            
      $posts_per_page = intval( get_query_var( 'posts_per_page' ) );
      $pages = intval( ceil( $wp_query->found_posts / $posts_per_page ) );
    }
    
    $output = "";
    if ( $pages > 1 ) {
      $ellipsis = "<li><span>...</span></li>";            
      $min_links = $range * 2 + 1;
      $block_min = min( $page - $range, $pages - $min_links );
      $block_high = max( $page + $range, $min_links );
      $left_gap = ( ( $block_min - $anchor - $gap ) > 0 ) ? true : false;
      $right_gap = ( ( $block_high + $anchor + $gap ) < $pages ) ? true : false;            
      if ( $left_gap && !$right_gap ) {
        $output .= sprintf( '%s%s%s', paginate_loop( 1, $anchor ), $ellipsis, paginate_loop( $block_min, $pages, $page ) );
      } else if ( $left_gap && $right_gap ) {
        $output .= sprintf( '%s%s%s%s%s', paginate_loop( 1, $anchor ), $ellipsis, paginate_loop( $block_min, $block_high, $page ), $ellipsis, paginate_loop( ( $pages - $anchor + 1 ), $pages ) );
      } else if ( $right_gap && !$left_gap ) {
        $output .= sprintf( '%s%s%s', paginate_loop( 1, $block_high, $page ), $ellipsis, paginate_loop( ( $pages - $anchor + 1 ), $pages ) );
      } else {
        $output .= paginate_loop( 1, $pages, $page );
      }
    }        
    if ( $echo ) {
      echo $output;
    }       
    return $output;
  }
endif;
if ( !function_exists( 'paginate_loop' ) ):
  function paginate_loop( $start, $max, $page = 0 ) {
    $output = "";
    for ( $i = $start; $i <= $max; $i++ ) {
      $output .= ( $page === intval( $i ) ) ? "<li class='active'><span>$i</span></li>" : "<li><a href='".get_pagenum_link($i)."'>$i</a></li>";
    }
    return $output;
  }
endif;
if ( !function_exists( 'show_paginate' ) ):
  function show_paginate() {
?>
<div id="zan-page" class="clearfix">
	<ul class="pagination pagination-zan pull-right">
	  <?php
		  echo "<li>";
		  previous_posts_link( __( '&laquo;', '' ), 0 );
		  echo "</li>";
		  if ( function_exists( "paginate" ) )  paginate();

		  echo "<li>";
		  next_posts_link( __( '&raquo;', '' ), 0);
		  echo "</li>";
		  wp_link_pages();
	  ?>
	</ul>
</div>
<?php
}
endif;

/**
 * 禁用谷歌字体链接
 *
 * @since 3.0.0
 * @return string
 */
function disable_open_sans($translations, $text, $context, $domain) {
    if( 'Open Sans font: on or off' == $context && 'on' == $text ) {
        $translations = 'off';
    }
    return $translations;
}

/**
 * 去除WordPress版本信息
 *
 * @since 3.0.0
 * @return string
 */
remove_action('wp_head','wp_generator');
remove_action('wp_head','rsd_link');
remove_action('wp_head','wlwmanifest_link');
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0 );


/**
 *   文章存档函数
 *
 * @since Zanblog 3.0.1
 * @return archives.
 */
function zan_archives_list() {
  if( !$output = get_option( 'zan_archives_list' ) ){
    $output = '<div id="archives">';      
    $the_query = new WP_Query( 'posts_per_page=-1&ignore_sticky_posts=1' ); 
    $year=0; $mon=0; $i=0; $j=0;
    while ( $the_query->have_posts() ) : $the_query->the_post();
    $year_tmp = get_the_time('Y');
    $mon_tmp = get_the_time('m');
    $y=$year; $m=$mon;
    if ( $mon != $mon_tmp && $mon > 0 ) $output .= '</div></div></div>';
    if ( $year != $year_tmp && $year > 0 ) $output .= '</div>';
    if ( $year != $year_tmp ) {
      $year = $year_tmp;
      $output .= '<h3 class="zan-year">'. $year .' 年 <small>(点击月份展开)</small></h3><div class="panel-group" id="accordion">'; 
    }
    if ( $mon != $mon_tmp ) {
      $mon = $mon_tmp;
      $output .= '<div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" data-toggle="collapse" data-parent="#accordion" href="#collapse'.$year. $mon .'">
                          '. $mon .' 月
                        </a>
                      </h4>
                    </div>
                    <div id="collapse'.$year. $mon .'" class="panel-collapse collapse">
                      <div class="panel-body">'; 
    }
    $output .= '<p>'. get_the_time('d日: ') .'<a class="archivesPostList" href="'. get_permalink() .'">'. get_the_title() .'</a> <span class="badge">'. get_comments_number('0', '1', '%') .'</span></p>';

    endwhile;
    wp_reset_postdata();
    $output .= '</div></div></div></div></div>';
    update_option( 'zan_archives_list', $output );
  }
  echo $output;
}
function clear_zal_cache() {
  update_option( 'zan_archives_list', '' ); 
}
add_action( 'save_post', 'clear_zal_cache' ); 


/**
 * 搜索结果只显示文章
 *
 * @since 3.0.0
 * @return string
 */
function search_filter( $query ) {
  if ( $query->is_search ) {
    $query->set( 'post_type', 'post' );
  }
  return $query;
}

/**
 * 字符串截取
 *
 * @since 3.0.1
 * @return string
 */
function zan_cut_string($string, $sublen, $start = 0, $code = 'UTF-8') {
  if($code == 'UTF-8') {
    $pa = "/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|\xe0[\xa0-\xbf][\x80-\xbf]|[\xe1-\xef][\x80-\xbf][\x80-\xbf]|\xf0[\x90-\xbf][\x80-\xbf][\x80-\xbf]|[\xf1-\xf7][\x80-\xbf][\x80-\xbf][\x80-\xbf]/";
    preg_match_all($pa, $string, $t_string);
    if(count($t_string[0]) - $start > $sublen) return join('', array_slice($t_string[0], $start, $sublen)) . "...";
    return join('', array_slice($t_string[0], $start, $sublen));
  } else {
    $start = $start * 2;
    $sublen = $sublen * 2;
    $strlen = strlen($string);
    $tmpstr = '';  

    for($i = 0; $i < $strlen; $i++) {
      if($i >= $start && $i < ($start + $sublen)) {
        if(ord(substr($string, $i, 1)) > 129) $tmpstr .= substr($string, $i, 2);
        else $tmpstr .= substr($string, $i, 1);
      } 
      if(ord(substr($string, $i, 1)) > 129) $i++;
    }
    if(strlen($tmpstr) < $strlen ) $tmpstr .= "...";
    return $tmpstr;
  }
}

/**
 * 评论头像墙
 *
 * @since 3.0.1
 * @return string
 */
function zan_user_list($avatar_cnt) {
  global $wpdb;
  // 注：大家把comment_author_email后面的邮箱改成自己的。
  $sql = " SELECT COUNT(comment_ID) AS cnt, comment_author, comment_author_url, comment_author_email FROM (SELECT * FROM $wpdb->comments  LEFT OUTER JOIN $wpdb->posts ON ($wpdb->posts.ID=$wpdb->comments.comment_post_ID) WHERE comment_date > date_sub( NOW(), INTERVAL 24 MONTH )  AND comment_author_email != 'benz@yeahzan.com'  AND comment_author_email != 'ketu@yeahzan.com'  AND post_password='' AND comment_approved='1' AND comment_type='') AS tempcmt GROUP BY comment_author_email ORDER BY cnt DESC LIMIT $avatar_cnt ";
  $wall = $wpdb->get_results($sql); 
  $output = '';

  foreach ( $wall as $comment ) {
    if( $comment->comment_author_url ) {
      $url = $comment->comment_author_url;
    }
    else {
      $url = get_the_author_meta( 'url' );
    }

    $avatar = get_avatar( $comment->comment_author_email, $size = '48');
    $tmp = '<li class="col-sm-2 col-xs-4"><a  class="avatar" href="'.$url.'" target="_blank" >'.$avatar.'<span>+'.$comment->cnt.'</span></a><p class="name">'.zan_cut_string(strip_tags($comment->comment_author),5).'</p></li>';
    $output .= $tmp;
  }

  $output = '<ul class="row">'.$output.'</ul>';
  echo $output ;
}

/**
 * 喜欢功能
 *
 * @since 3.0.2
 * @return string
 */
add_action('wp_ajax_nopriv_zan_like', 'zan_like');
add_action('wp_ajax_zan_like', 'zan_like');

function zan_like(){
  global $wpdb,$post;
  $id = $_POST["um_id"];
  $action = $_POST["um_action"];

  if ( $action == 'ding'){
    $zan_raters = get_post_meta($id,'zan_ding',true);
    $expire = time() + 99999999;
    $domain = ($_SERVER['HTTP_HOST'] != 'localhost') ? $_SERVER['HTTP_HOST'] : false; // make cookies work with localhost
    
    setcookie('zan_ding_'.$id,$id,$expire,'/',$domain,false);
    if (!$zan_raters || !is_numeric($zan_raters)) {
      update_post_meta($id, 'zan_ding', 1);
    } 
    else {
      update_post_meta($id, 'zan_ding', ($zan_raters + 1));
    }
    echo get_post_meta($id,'zan_ding',true);
  } 
  
  die;
}

/**
 * 当没有添加特色图像时，将自动调用文章的第一张图像
 *
 * @since 3.0.2
 * @return string
 */
function autoset_featured() {
  global $post;
  
  $already_has_thumb = has_post_thumbnail($post->ID);
  if (!$already_has_thumb)  {
    $attached_image = get_children( "post_parent=$post->ID&post_type=attachment&post_mime_type=image&numberposts=1" );
    if ($attached_image) {
      foreach ($attached_image as $attachment_id => $attachment) {
      set_post_thumbnail($post->ID, $attachment_id);
      }
    }
  }
} 
add_action('the_post', 'autoset_featured');
add_action('save_post', 'autoset_featured');
add_action('draft_to_publish', 'autoset_featured');
add_action('new_to_publish', 'autoset_featured');
add_action('pending_to_publish', 'autoset_featured');
add_action('future_to_publish', 'autoset_featured');


/**
 *Lazyload 改造 img 标签
 *
 * @since 3.0.2
 * @return string
*/
function zan_filter_lazy( $content ) {
  if( is_feed() ) return $content;
  return preg_replace_callback( '/(<\s*img[^>]+)(src\s*=\s*"[^"]+")([^>]+>)/i', 'zan_filter_lazy_replace', $content );
}
//改造 img 标签
function zan_filter_lazy_replace( $matches ) {
  if( !preg_match( '/class\s*=\s*"/i', $matches[0] ) ) $class_attr = 'class="" ';
  $replacement = $matches[1] . $class_attr . 'src="' . get_bloginfo( 'template_directory' ) . '/ui/images/grey.gif' . '" data-original' . substr( $matches[2], 3 ) . $matches[3];
  $replacement = preg_replace( '/class\s*=\s*"/i', 'class="lazy ', $replacement );
  $replacement .= '<noscript>' . $matches[0] . '</noscript>';
    return $replacement;
}
//控制缓冲区
function zan_filter_lazy_html() {
  ob_start( 'zan_filter_lazy' );
}
if( !is_admin() ) add_action( 'wp_loaded', 'zan_filter_lazy_html' );


?>