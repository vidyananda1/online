<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PublishExam */

$this->title = 'Update Publish Exam: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Publish Exams', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="publish-exam-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
