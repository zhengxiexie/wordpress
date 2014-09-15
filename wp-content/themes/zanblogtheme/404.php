<?php
/**
 * 404 错误页面
 *
 * @package    YEAHZAN
 * @subpackage ZanBlog
 * @since      ZanBlog 3.0.2
 */
?>

<?php include(TEMPLATEPATH .'/header-nonav.php'); ?>
<body class="error-body">
  <nav class="navbar navbar-inverse">
    <div class="container clearfix">
      <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">下拉框</span>
        <span class="fa fa-reorder fa-lg"></span>
      </button>
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
  <div id="error-page">404</div>
  <div id="home-link"><a class="btn btn-lg btn-zan-solid-iw" href="<?php echo get_option('home'); ?>">返回网站首页</a></div>
  <?php wp_footer(); ?>
  <script type="text/javascript">
  var config = new shinejs.Config({
    numSteps: 4,
    opacity: 0.3,
    shadowRGB: new shinejs.Color(10, 10, 10)
  });
  var shine = new Shine(document.getElementById('error-page'), config);

  function handleMouseMove(event) {
    shine.light.position.x = event.clientX;
    shine.light.position.y = event.clientY;
    shine.draw();
  }

  window.addEventListener('mousemove', handleMouseMove, false);
  </script>
</body>
</html>