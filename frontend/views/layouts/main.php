<?php
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */


if (Yii::$app->controller->action->id === 'login') { 
/**
 * Do not use this code in your template. Remove it. 
 * Instead, use the code  $this->layout = '//main-login'; in your controller.
 */
    echo $this->render(
        'main-login',
        ['content' => $content]
    );
} else {

    if (class_exists('frontend\assets\AppAsset')) {
        frontend\assets\AppAsset::register($this);
    } else {
        app\assets\AppAsset::register($this);
    }

    dmstr\web\AdminLteAsset::register($this);

    $directoryAsset = Yii::$app->assetManager->getPublishedUrl('@vendor/almasaeed2010/adminlte/dist');
	
	
	$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/png', 'href' => 'favicon.png']); // customize favicon
    ?>
    <?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
       
        <meta charset="<?= Yii::$app->charset ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">

			
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body class="hold-transition skin-purple-light sidebar-mini">
    
    <?php $this->beginBody() ?>
    
    <div class="wrapper" >
    
    
        <?= $this->render(
            'header.php',
            ['directoryAsset' => $directoryAsset]
        ) ?>

        <?= $this->render(
            'left.php',
            ['directoryAsset' => $directoryAsset]
        )
        ?>
         


        <?= $this->render(
            'content.php',
            ['content' => $content, 'directoryAsset' => $directoryAsset]
        ) ?>
        

    </div>
    <div id="loader" class="sk-circle">
        <div class="sk-circle-dot"></div>
        <div class="sk-circle-dot"></div>
        <div class="sk-circle-dot"></div>
        <div class="sk-circle-dot"></div>
        <div class="sk-circle-dot"></div>
        <div class="sk-circle-dot"></div>
        <div class="sk-circle-dot"></div>
        <div class="sk-circle-dot"></div>
        <div class="sk-circle-dot"></div>
        <div class="sk-circle-dot"></div>
        <div class="sk-circle-dot"></div>
        <div class="sk-circle-dot"></div>
    </div>

    <?php $this->endBody() ?>
    </body>
    </html>
    <?php $this->endPage() ?>
<?php } ?>
<style>
    #loader{
        top:200px;
        display: none;
        position: absolute;
        left:500px;
    }
</style>