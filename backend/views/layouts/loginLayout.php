<?php
use backend\assets\LoginAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;

LoginAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <title>SMART EDUCATION</title>
    <?php $this->head() ?>
    <link rel="shortcut icon" href="images/logo.jpg" type="image/jpg">>
</head>
<body class="login-page">
    <?php $this->beginBody() ?>
    <div class="wrap">
        <div class="container">
            <?= $content ?>
        </div>
    </div>
    <!-- footer content -->
    <footer class="footer">
        <div class="container">
            <p align="center">Copyright &copy; All Rights Reserved, Powered By:<a href="http://www.dexdevs.com" target="_blank" style="color: #1A3560;"><b>DEXDEVS</b></a>
            </p>
        </div>
    </footer>
    <!-- /footer content -->

    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
