<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;
use app\models\Subjects;
/* @var $this yii\web\View */
/* @var $searchModel app\models\SubjectSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

// $this->title = 'Subjects';
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="subject-index">

    <div class="row" style="padding:15px ">
    
        <div class="head col-md-4 icon" style="color: white;font-size: 20px;" >
            <i class="fa fa-book" >&nbsp;</i><b> Showing List of Subjects</b>
        </div>
     
    </div>

    <div class="panel " style="box-shadow: 1px 1px 3px gray;">
        <div class=" panel-heading">

            <p>
                <?= Html::a('Add Subject', ['create'], ['class' => 'btn btn-primary popupModal','style'=>'border-radius:35px']) ?>
            </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="table-responsive">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'tableOptions' =>['class' => 'table'],
            'columns' => [
                // ['class' => 'yii\grid\SerialColumn'],

                // 'id',

                [
                    'attribute'=>'sub_name',
                    'label'=>'Subject Name',
                ],

                [
                    'attribute'=>'sub_code',
                    'label'=>'Subject Code',
                ],
                
                // [
                //     'attribute'=>'dept_id',
                //     'label'=>'Department',
                // ],
                
                [
                    'attribute'=>'record_status',
                    'label'=>'Status',
                ],
                
                // 'created_by',
                //'created_date',
                //'updated_by',
                //'updated_date',
                

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    </div>

</div>
</div>
</div>
<style type="text/css">
    
    .head{
      border:solid 1px #188a94;
      background-color: #188a94;
      padding: 17px;
      border-radius: 10px;
      box-shadow: 1px 2px 4px gray;
      transform: translateZ(0);
      transition: all .3s cubic-bezier(.34,1.61,.7,1);

    }   
    .head:hover {
              transform: scale(1.03,1.03);

            
    }
</style>
<?php
Modal::begin([

            'header' => '<h4 style="text-align:center;"><b>ADD SUBJECT<b></h4>',

            'id' => 'modal',

            'size' => 'modal-lg',
            'clientOptions' => ['backdrop' => 'static'],


        ]);


       

        Modal::end();

Modal::begin([

            'header' => '<h4 style="text-align:center;"><b>EDIT SUBJECT<b></h4>',

            'id' => 'mymodal',

            'size' => 'modal-lg',
            'clientOptions' => ['backdrop' => 'static'],


        ]);


       

        Modal::end();
         ?>
       


<?php $this->registerJs("$(function() {
   $('.popup').click(function(e) {
     e.preventDefault();
     $('#mymodal').modal('show').find('.modal-body')
     .load($(this).attr('href'));
   });

   $('.popupModal').click(function(e) {
     e.preventDefault();
     $('#modal').modal('show').find('.modal-body')
     .load($(this).attr('href'));
   });
});");