<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ExamCreate */

$this->title = 'Create Exam Create';
$this->params['breadcrumbs'][] = ['label' => 'Exam Creates', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="exam-create-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
