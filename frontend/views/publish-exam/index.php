<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PublishExamSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Publish Exams';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="publish-exam-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Publish Exam', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'dept_id',
            'exam_id',
            'section_id',
            'sub_id',
            //'no_of_question',
            //'exam_date',
            //'exam_start_time',
            //'duration',
            //'created_by',
            //'created_date',
            //'updated_by',
            //'updated_date',
            //'record_status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
