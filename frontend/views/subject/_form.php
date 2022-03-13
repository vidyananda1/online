<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Subject */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="subject-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'sub_name')->textInput(['maxlength' => true])->label('Subject Name') ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'sub_code')->textInput(['maxlength' => true])->label('Subject Code') ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'dept_id')->textInput()->label('Department') ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'record_status')->textInput(['maxlength' => true])->label('Status') ?>
        </div>
    </div>

    <div class="form-group" style="text-align: center">
        <?= Html::submitButton('Save', ['class' => 'btn btn-primary btn-lg']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
