
<?php 
    $user_id = Yii::$app->user->id;
    $role = \Yii::$app->authManager->getRolesByUser($user_id);
    //die(array_keys($role)[0]);
    // $display= "hide";
    // if(!empty($role)) {
    //     if(array_keys($role)[0]=="customer") {
    //         $display = "hide";
    //     }
    //     else{
    //         $display= "";
    //     }
    // }

    // if(!empty($role)) {
    //     if(array_keys($role)[0]=="customer") {
    //         $items = [
    //                     ['label' => 'Dashboard','icon' => 'home', 'url' => ['/site/index']],
                        
    //                     ['label' => 'Your Account', 'url' => ['/registration/individual']],
    //                     ['label' => 'Payment Details', 'url' => ['/counter/individual']],
        
    //                   ];
    //     }
    //     else{
    //         $items = [
    //                     ['label' => 'Dashboard','icon' => 'home', 'url' => ['/site/index']],
                        
    //                  ];
    //     }
    // }
 
    

     // if($display!="hide") {
     //     array_push($items,[
     //        'label' => 'Account Details',
     //        'icon' => ' fa fa-cog ',
     //        'options'=>['class'=>"styleMAn"],
     //        'items' => [
     //            ['label' => 'Account Registration', 'url' => ['/registration/index']],
     //            ['label' => 'Interest Payment', 'url' => ['/counter']],
     //            ['label' => 'Referral-Details', 'url' => ['/referral-details/index']],
     //            ['label' => 'Check Investor', 'url' => ['investor/index']],
     //            ['label' => 'Investment Reports', 'url' => ['/report']],
     //            ['label' => 'Set Investment Amount','url' => ['/amount']],
     //            ['label' => 'Set Referral-Type', 'url' => ['/type']],
     //            ['label' => 'User-Management','url' => ['/member/index']],

     //        ],
     //    ]);
     // }
?>






<aside class="main-sidebar" style="box-shadow: 0px 0px 20px grey; ">

    <section class="sidebar">
      <br>
      <div class="user-panel">
          <div class="text-center">
            <img src="images/user.png" height=50 class="img-circle" alt="User Image">
          </div>
            <div class="text-center">
              <h5>Hello ! <?= strtoupper(Yii::$app->user->identity->username)?></h5>
            </div>
          <hr style="border:solid 1px #c2bbba">
          </div>

       <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                  
                      ['label' => 'Dashboard','icon' => 'home', 'url' => ['/site/index']],
                      
                      // ['label' => 'Admission','icon' => ' fa-user-plus', 'url' => ['/registration/index']],
                      // // ['label' => 'Referral-Details','icon' => ' fa-users', 'url' => ['/referral-details/index']],
                      // ['label' => 'Monthly Fee Details','icon' => 'usd', 'url' => ['/fee-counter']],
                      // ['label' => 'Expenses','icon' => 'money', 'url' => ['/expense']],
                      ['label' => 'Student Details','icon' => 'file', 'url' => ['/student']],
                      
                      
                     

                       [
                'label' => 'Master-Settings',
                'icon' => 'wrench',
                'items' => [
                             ['label' => 'Staff-Management','url' => ['/staff']],
                             ['label' => 'Subject Setting','url' => ['/subjects']],
                             ['label' => 'Department Setting', 'url' => ['/departments']],
                             ['label' => 'Sections Setting', 'url' => ['/sections']],
                             // ['label' => 'Monthly fee Set-up', 'url' => ['/monthly-fee']],
                             // ['label' => 'Set Discount', 'url' => ['/discount']],
                             // ['label' => 'Set Discount-category', 'url' => ['/discount-cat']],
                             
                          
                ],
                 // 'visible' => !Yii::$app->user->isGuest && Yii::$app->user->can('admin'),
            ],
                        // 'visible' => !Yii::$app->user->isGuest && Yii::$app->user->can('admin'),
          
                ], // item
            ]
        ) ?>

    </section>

</aside>
<style>
    
</style>