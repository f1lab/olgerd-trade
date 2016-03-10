<!DOCTYPE HTML>
<html lang="ru-RU">
<head>
  <meta charset="UTF-8">
  <?php include_http_metas() ?>
  <?php include_metas() ?>
  <title><?php include_slot('title') ?></title>
  <link rel="shortcut icon" href="/favicon.ico" />
  <?php include_stylesheets() ?>
  <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
</head>

<body>
  <div class="navbar">
    <div class="navbar-inner">
      <div class="container">
        <a href="<?php echo url_for('@homepage') ?>" class="brand"><?php echo $_SERVER['SERVER_NAME'] ?></a>

        <ul class="nav">
          <div id="google_translate_element"></div>
        </ul>

        <ul class="nav pull-right"><?php if ($sf_user->isAuthenticated()): ?>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <?php echo $sf_user->getUsername() ?>
              <b class="caret"></b>
            </a>
            <ul class="dropdown-menu">
              <li><a href="<?php echo url_for('sf_guard_signout') ?>">Log out</a></li>
            </ul>
          </li>
        </ul><?php endif ?>
      </div>
    </div>
  </div>

  <section id="content">
    <div class="container-fluid">
      <?php echo $sf_content ?>
    </div>
  </section>

  <footer id="footer">
    <div class="container" style="padding-top: 7em">
    </div>
  </footer>

  <?php include_javascripts() ?>
  <script type="text/javascript">
  function googleTranslateElementInit() {
    new google.translate.TranslateElement({pageLanguage: 'ru', includedLanguages: 'en,zh-CN,zh-TW', layout: google.translate.TranslateElement.FloatPosition.TOP_LEFT}, 'google_translate_element');
  }
  </script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</body>

</html>
