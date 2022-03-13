
<?php
// use app\models\Registration;
// use app\models\Member;
// use app\models\Counter;
// use app\models\RdRegistration;
// use app\models\RdCounter;
 

//use app\models\Counterno;

$this->title = '';

// $reg = Registration::find()->where(['record_status'=>'1'])->count();
// $mem = Member::find()->where(['record_status'=>'1'])->count();
// $invested_amount = Registration::find()->where(['record_status'=>'1'])->sum('invest_amount');
// $amount_paid = Counter::find()->where(['record_status'=>'1'])->sum('paid_amount');
// $rdreg = RdRegistration::find()->where(['record_status'=>'1'])->count();
// $rdamount = RdRegistration::find()->where(['record_status'=>'1'])->sum('total');
// $recur = RdCounter::find()->where(['record_status'=>'1'])->sum('total');
?>

<!-- <div class="row">
  <div class="col-md-12">
    <marquee>This is basic example of marquee</marquee>
  </div>
</div> -->


<div class="panel panel-body" style="background-color: white;box-shadow: 1px 2px 3px gray">
  <div class="row">
    <div style="font-size: 15px;margin-left: 10px;" class="text-muted"><b>DASHBOARD</b></div>
    <br><br>
    <div class="col-lg-4 col-xs-4">
    <div class="small-box shadow" style="background-color:#85e3ff ">
          <div class="inner">
             

            <h4 style="font-size: 15px;"><b>Total Students</b></h4>
            </div> 
            <div class="inner">
              <div><h4 style="font-size: 15px"><b>11</b></h4></div>
            </div>
            <div class="icon" >
              <i class="fa fa-users"></i>
            </div>
            
                 
            </div> 
  </div>
    <div class="col-lg-4 col-xs-4">
          <!-- small box -->
          <div class="small-box shadow" style="background-color:#ffabab;">
            <div class="inner">
             

              <h4 style="font-size: 15px"><b>No. of exams</b></h4>
            </div>
            <div class="inner">
              <div><h4 style="font-size: 15px"><b>Rs 100</b></h4></div>
            </div>
            <div class="icon">
              <i class="fa fa-money"></i>
            </div>
            
                
          </div>
    </div>
    <div class="col-lg-4 col-xs-4">
          <!-- small box -->
          <div class="small-box shadow" style="background-color:#ffb5e8;">
            <div class="inner">
             

            <h4 style="font-size: 15px"><b>Pass Students</b></h4>
              
            </div>
            <div class="inner">
              <div><h4 style="font-size: 15px"><b>Rs 200</b></h4></div>
            </div>
            
            <div class="icon">
              <i class="fa fa-money"></i>
            </div>
            
                 
          </div>
    </div>
    
  </div>
<div class="row">
<div class="col-md-6 ">
  <div class="card shadow " style="background-color: white;" >
    <div class="card-header" style="background-color:#a283f2;">
        <div class="row">
            <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
              <h4 style="font-size: 15px"><b>Pass Students</b></h4>
            </div>
        </div>
    </div>
    <div class="card-body" style="margin-bottom: 10px;">
        <div id="invested_div" ></div>
    </div>
  </div>
</div>
<div class="col-md-6 " >
<div class="card shadow" style="background-color: white;">
  <div class="card-header"style="background-color:#a283f2;">
      <div class="row">
          <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
            <h4 style="font-size: 15px;"><b>Fail Students</b></h4>
          </div>
      </div>
  </div>
  <div class="card-body" >
    <div id="interests_div" ></div>
  </div>
</div>

</div>
</div>
</div>

<style type="text/css">
    .shadow {
              
              box-shadow: 2px 5px 6px #bfbbbb;;
              border-radius: 5px;
            }
    .background{
                opacity: 0.2;
                background: linear-gradient(to right, #99ccff 12%, #3366cc 114%);
                position: fixed; 
                margin-left: -10%;
                margin-top:-5%;
                margin-right: -3%;
                width: 150%; 
                height: 100%;

            }
    .ani{
      margin-top:-20px;
      border-radius: 5px;
      transform: translateZ(0);
      transition: all .3s cubic-bezier(.34,1.61,.7,1);

    }        
    .ani:hover {
            position: relative; 
            margin-top:-60px;
            
    }

  </style>
  <!-- <div id="invested_div" ></div> -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script>
google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(drawBasic);
function drawBasic() {
  var columns=[];
  columns.push(["Month","Amount"]);
  
  
  var invested = google.visualization.arrayToDataTable();
  var interests = google.visualization.arrayToDataTable();

  var options = {
    // title:"",
    width: 200,
    height: 330,
    legend: { position: 'top' },
    bar: { groupWidth: '40%' },
    
  };


  var interests_options = {
    // title:"",
    width: 200,
    height: 330,
    legend: { position: 'top' },
    bar: { groupWidth: '40%' },
    
  };
  

  var chartInterests = new google.visualization.ColumnChart(
  document.getElementById('interests_div'));
  
  var chartInvested = new google.visualization.ColumnChart(
  document.getElementById('invested_div'));


  chartInterests.draw(interests,interests_options);
  
  chartInvested.draw(invested,options);
} 
</script>
<style>
  .card {
    margin-top: 12px;
    border: thin solid #ccc;
    border-radius: 4px;
    height: 410px;
}
.card-body, .card-header, .card-footer {
    padding: 12px;
}
.card-label {
    text-transform: uppercase;
    font-size: 12px;
    font-family: 'IBM Plex Sans', sans-serif;
    min-height: 34px;
}
.card-value {
    font-size: 36px;
}
.card-summary {
    font-size: 10px;
    padding-left: 8px;
}
.card-header {
    border-bottom: thin solid #ccc;
}
.card-footer {
    border-top: thin solid #ccc;
}

</style>