<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PublishExamSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="publish-exam-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'dept_id') ?>

    <?= $form->field($model, 'exam_id') ?>

    <?= $form->field($model, 'section_id') ?>

    <?= $form->field($model, 'sub_id') ?>

    <?php // echo $form->field($model, 'no_of_question') ?>

    <?php // echo $form->field($model, 'exam_date') ?>

    <?php // echo $form->field($model, 'exam_start_time') ?>

    <?php // echo $form->field($model, 'duration') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'created_date') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <?php // echo $form->field($model, 'updated_date') ?>

    <?php // echo $form->field($model, 'record_status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
