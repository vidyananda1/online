<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\StudentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Students';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="student-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Student', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'stud_reg_no',
            'dept_id',
            'name',
            'dob',
            //'gender',
            //'mobile',
            //'email:email',
            //'address:ntext',
            //'created_by',
            //'created_date',
            //'updated_by',
            //'updated_date',
            //'record_status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
