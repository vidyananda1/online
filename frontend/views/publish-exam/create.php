<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PublishExam */

$this->title = 'Create Publish Exam';
$this->params['breadcrumbs'][] = ['label' => 'Publish Exams', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="publish-exam-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
