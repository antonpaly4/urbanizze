<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <meta name="viewport" content="width=devise-widht, initial-scale=1.0">
    <link href="/public/css/reset.css" type="text/css" rel="stylesheet"/>
    <link href="/public/css/style.css" type="text/css" rel="stylesheet"/>
</head>
<body>

<?php $this->beginBody() ?>
    <header class="header">
      <section class="header_content">
        <nav class="main_menu">
          <ul>
            <li><a href="#">мероприятия</a></li>
            <li><a href="#">места</a></li>
            <li><a href="#">блоги</a></li>
          </ul>
        </nav>
        <div class="logo">
          <a href="/">
            <img src="public/img/logo.png" alt="URBANIZZE"/>
          </a>
        </div>
        <div class="actions">
          <a class="weather" href="#">+2°C</a>
          <div class="social">
            <a class="soc_btn vk" href="http://vk.com" rel="external"></a>
            <a class="soc_btn fb" href="http://facebook.com" rel="external"></a>
            <a class="soc_btn tw" href="http://twitter.com" rel="external"></a>
          </div>
          <a class="button login" href="#">вход / регистрация</a>
        </div>
      </section>
    </header>
    <?= $content ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
