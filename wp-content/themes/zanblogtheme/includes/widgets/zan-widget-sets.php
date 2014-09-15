<?php
/**
 * ZanBlog 集合组件
 *
 * @package    ZanBlog
 * @subpackage Widget
 */
 
class Zan_Sets extends WP_Widget {

  // 设定小工具信息
  function Zan_Sets() {
    $widget_options = array(
          'name'        => '集合组件（ZanBlog）', 
          'description' => 'ZanBlog 集合组件，包含最热文章、最新文章、随机文章' 
    );
    parent::WP_Widget( false, false, $widget_options );  
  }

  // 设定小工具结构
  function widget( $args, $instance ) {  
  	extract($args);

    @$title1 = $instance['title1'] ? $instance['title1'] : '最热文章';
    @$title2 = $instance['title2'] ? $instance['title2'] : '最新文章';
    @$title3 = $instance['title3'] ? $instance['title3'] : '随机文章';
    @$num = $instance['num'] ? $instance['num'] : 8;
    echo $before_widget;
    ?>

    <div class="panel panel-zan  widget-sets hidden-xs">
      <ul class="nav nav-pills pills-zan">
        <li class="active"><a href="#sidebar-hot" data-toggle="tab"><?php echo $title1; ?></a></li>
        <li><a href="#sidebar-new" data-toggle="tab"><?php echo $title2; ?></a></li>
        <li><a href="#sidebar-rand" data-toggle="tab"><?php echo $title3; ?></a></li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane active nav bs-sidenav fade in" id="sidebar-hot">
          <ul class="list-group">
            <?php 
              // 设置全局变量，实现post整体赋值
              global $post;
              $posts = zan_get_hotest_posts( $num );
              foreach ( $posts as $post ) :
              setup_postdata( $post );
            ?>
              <li class="list-group-item clearfix">
                <a href="<?php the_permalink();?>">
                  <?php the_title(); ?>
                </a>
                <span class="badge">
                  <?php if( function_exists( 'the_views' ) ) { the_views(); } ?>
                </span>
              </li>
            <?php
              endforeach;
              wp_reset_postdata();
            ?>
          </ul>
        </div>
        <div class="tab-pane fade" id="sidebar-new">
          <ul class="list-group">
            <?php 
              // 设置全局变量，实现post整体赋值
              global $post;
              $posts = zan_get_latest_posts( $num );
              foreach ( $posts as $post ) :
              setup_postdata($post);
            ?>
              <li class="list-group-item clearfix">
                <a href="<?php the_permalink();?>">
                  <?php the_title(); ?>
                </a>
                <span class="badge">
                  <?php if( function_exists( 'the_views' ) ) { the_views(); } ?>
                </span>
              </li>
            <?php
              endforeach;
              wp_reset_postdata();
            ?>
          </ul>
        </div>
        <div class="tab-pane nav bs-sidenav fade" id="sidebar-rand">
          <ul class="list-group">
            <?php 
              // 设置全局变量，实现post整体赋值
              global $post;
              $posts = zan_get_rand_posts( $num );
              foreach ( $posts as $post ) :
              setup_postdata($post);
            ?>
              <li class="list-group-item clearfix">
                <a href="<?php the_permalink();?>">
                  <?php the_title(); ?>
                </a>
                <span class="badge">
                  <?php if( function_exists( 'the_views' ) ) { the_views(); } ?>
                </span>
              </li>
            <?php
              endforeach;
              wp_reset_postdata();
            ?>
          </ul>
        </div>
      </div>
    </div>
    <?php
    echo $after_widget;
  }

  function update($new_instance, $old_instance) {                
    return $new_instance;
  }

  function form($instance) {  
    @$title1 = esc_attr( $instance['title1'] );
    @$title2 = esc_attr( $instance['title2'] );
    @$title3 = esc_attr( $instance['title3'] );
    @$num = esc_attr( $instance['num'] );
    ?>
      <p>
        <label for="<?php echo $this->get_field_id( 'title1' ); ?>">
          标题（默认最热文章）：
          <input class="widefat" id="<?php echo $this->get_field_id( 'title1' ); ?>" name="<?php echo $this->get_field_name( 'title1' ); ?>" type="text" value="<?php echo $title1; ?>" />
        </label>
      </p>
      <p>
        <label for="<?php echo $this->get_field_id( 'title2' ); ?>">
          标题（默认最新文章）：
          <input class="widefat" id="<?php echo $this->get_field_id( 'title2' ); ?>" name="<?php echo $this->get_field_name( 'title2' ); ?>" type="text" value="<?php echo $title2; ?>" />
        </label>
      </p>
      <p>
        <label for="<?php echo $this->get_field_id( 'title3' ); ?>">
          标题（默认随机文章）：
          <input class="widefat" id="<?php echo $this->get_field_id( 'title3' ); ?>" name="<?php echo $this->get_field_name( 'title3' ); ?>" type="text" value="<?php echo $title3; ?>" />
        </label>
      </p>
      <p>
        <label for="<?php echo $this->get_field_id( 'num' ); ?>">
          显示文章条数（默认显示8条）：
          <input class="widefat" id="<?php echo $this->get_field_id( 'num' ); ?>" name="<?php echo $this->get_field_name( 'num' ); ?>" type="text" value="<?php echo $num; ?>" />
        </label>
      </p>
    <?php 
  }
} 

register_widget( 'Zan_Sets' );
?>
