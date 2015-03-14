<?php

use yii\helpers\Html;
use app\assets\AppAsset;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
$action = $this->context->action->id;
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
    <link href="/public/css/admin.css" type="text/css" rel="stylesheet"/>
</head>
<body>

<?php $this->beginBody() ?>
<header class="header">
    <section class="header_content">
        <nav class="main_menu">
            <ul>
                <li><a href="/admin/events" <?=($action == 'events' || $action == 'event') ? 'class="active"' : ''?>>мероприятия</a></li>
                <li><a href="#">места</a></li>
                <li><a href="#">блоги</a></li>
            </ul>
        </nav>
        <div class="logo">
            <a href="/">
                <img src="/public/img/logo.png" alt="URBANIZZE"/>
            </a>
        </div>
    </section>
</header>
<?= $content ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
