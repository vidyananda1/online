<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ExamCreate */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="exam-create-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'exam_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dept_id')->textInput() ?>

    <?= $form->field($model, 'sec_id')->textInput() ?>

    <?= $form->field($model, 'start_date')->textInput() ?>

    <?= $form->field($model, 'created_by')->textInput() ?>

    <?= $form->field($model, 'created_date')->textInput() ?>

    <?= $form->field($model, 'updated_by')->textInput() ?>

    <?= $form->field($model, 'updated_date')->textInput() ?>

    <?= $form->field($model, 'record_status')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
