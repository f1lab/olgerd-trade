<!DOCTYPE HTML>
<html lang="ru-RU" ng-app="app">
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
        <a href="<?php echo url_for('@homepage') ?>" class="brand" style="padding: 5px 0px;">
          <img src="/img/logo.png" alt="Ольгерд">
        </a>

        <ul class="nav pull-right">
          <?php if ($sf_user->isAuthenticated()): ?>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <?php echo $sf_user->getUsername() ?>
                <b class="caret"></b>
              </a>
              <ul class="dropdown-menu">
                <?php if ($sf_user->hasCredential('admin panel')): ?>
                  <li><a href="/backend.php/">В админку</a></li>
                <?php endif ?>
                <li><a href="<?php echo url_for('sf_guard_signout') ?>">Выйти</a></li>
              </ul>
            </li>
          <?php else: ?>
            <li><a href="<?php echo url_for('sf_guard_signin') ?>">Войти / Зарегистрироваться</a></li>
          <?php endif ?>
        </ul>
      </div>
    </div>
  </div>

  <section id="order" ng-controller="OrderController as order" class="ng-cloak" ng-show="order.$storage.positions.length > 0 && <?php echo (int)$sf_user->isAuthenticated() ?>">
    <div class="container-fluid">
      <div class="well">
        <h3 style="margin-top: 0;">Ваш заказ</h3>
        <ul class="unstyled positions">
          <li ng-repeat="position in order.$storage.positions track by position.id">
            <a ng-href="<?php echo url_for('good/show?id=') ?>{{position.id}}" style="background-image: url(/uploads/goods/{{position.image}});" target="_blank"></a>
            <div class="title">{{position.name}}</div>
            <input type="number" ng-model="position.amount" min="0" step="1">
            <span class="icon icon-remove" ng-click="order.removePosition($index)"></span>
          </li>
        </ul>

        <hr>
        <p>Всего позиций: {{order.getAmount()}}, на сумму: {{order.getSum()}} руб.</p>
        <form action="<?php echo url_for('order/create') ?>" style="margin-bottom: 0;" method="post">
          <input type="hidden" name="positions" id="positions-json">
          <button type="submit" class="btn btn-primary btn-large" ng-click="order.create()">Оформить</button>
        </form>
      </div>
    </div>
  </section>

  <section id="content">
    <div class="container-fluid">
      <?php echo $sf_content ?>
    </div>
  </section>

  <footer id="footer">
    <div class="container-fluid" style="padding-top: 2em; padding-bottom: 3em; text-align: right;">
      <div id="google_translate_element"></div>
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
