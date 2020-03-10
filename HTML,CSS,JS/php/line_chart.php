<?php include 'My_status_after_submit.php'; ?>

<div class="graph_container">
 <div class="wrapper">
<div id="chartContainer" class="pie_chart heading2"  style="height: 450px; width: 800px;"></div>
</div>
<div class="wrapper">
   <?php
   $month = $_POST['month'];
   echo '<div class=heading2>';
   echo '<h1 class="graphs_title" >Total consumption for this '.$month.' in grams</h1>';
   echo '</div>';
   ?>
   <canvas class="graphs" id="myChart" width="800" height="450"></canvas>
  
</div>
<div class="wrapper">
   <?php
   $month = $_POST['month'];
   echo '<div class=heading2>';
   echo '<h1 class="graphs_title">BGL level for the month of '.$month.' in grams</h1>';
   echo '</div>';
   ?>
 <canvas class="graphs" id="myChart2" width="800" height="450"></canvas>
 </div>
</div>
<?php
include 'db.php';

$month = $_POST['month'];
$months = array("Start","January", "February","March","April","May","June","July","August","September","October","November","December");
$month_number = array_search($month, $months);
$year = $_POST['year'] ;
$userid = $_SESSION['id'];

$sql_query = 'select carbohydrate,sugars,fat,protein,alcohol,fiber,day(d.date) from food_intake d,users u,food f where d.patient_id = u.id and f.id = d.food_id and month(d.date) = '.$month_number.' and year(d.date) = '.$year.' and d.patient_id='.$userid.' group by day(d.date)';
$carbohydrate = array();
$sugars = array();
$fat = array();
$protein = array();
$alcohol = array();
$fiber = array();
$days = array();
$sql_values = mysqli_query($link,$sql_query);
while ($row = mysqli_fetch_row($sql_values)) {
	$carbohydrate[] = $row[0];
	$sugars[] = $row[1];
	$fat[] = $row[2];
	$protein[] = $row[3];
	$alcohol[] = $row[4];
	$fiber[] = $row[5];
	$days[] = $row[6];
}

// save the JSON encoded array
$jsoncarbohydrate = json_encode($carbohydrate);
$jsonsugars = json_encode($sugars); 
$jsonfat = json_encode($fat); 
$jsonprotein = json_encode($protein); 
$jsonalcohol = json_encode($alcohol); 
$jsonfiber = json_encode($fiber);
$jsondays = json_encode($days); 

?>

<script>
  var carbohydrate = <?= $jsoncarbohydrate ?>;
  var protein = <?= $jsonprotein ?>;
  var fat = <?= $jsonfat ?>;
  var fiber = <?= $jsonfiber ?>;
  var alcohol = <?= $jsonalcohol?>;
  var sugars = <?= $jsonsugars ?>;
  
 var days = <?= $jsondays ?>;
// For drawing the lines

  var ctx = document.getElementById("myChart");
  var myChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: days,
    datasets: [
      { 
        data: carbohydrate,
        label: "Carbohydrate",
        borderColor: "#3e95cd",
        fill: false
      },
      { 
        data: protein,
        label: "Protein",
        borderColor: "#8e5ea2",
        fill: false
      },
      { 
        data: fat,
        label: "Fat",
        borderColor: "#3cba9f",
        fill: false
      },
      { 
        data: fiber,
        label: "Fiber",
        borderColor: "#e8c3b9",
        fill: false
      },
      { 
        data: alcohol,
        label: "Alcohol",
        borderColor: "#c45850",
        fill: false
      },
      { 
        data: sugars,
        label: "Sugars",
        borderColor: "#c45850",
        fill: false
      }
    ]
  },
  options: { // 
   annotation: {
      annotations: [{
         type: 'box',
         drawTime: 'beforeDatasetsDraw',
         yScaleID: 'y-axis-0',
         yMin: 2500,
         yMax: 4000,
         backgroundColor: 'rgba(0, 255, 0, 0.1)'
      }]
   }
}
});
</script>
<?php
include 'db.php';
$month = $_POST['month'];
$months = array("Start","January", "February","March","April","May","June","July","August","September","October","November","December");
$month_number = array_search($month, $months);
$year = $_POST['year'] ;
$userid = $_SESSION['id'];

$sql_query = 'select day(r.date),r.bgl from readings r,users u where r.patient_id = u.id and month(r.date) = '.$month_number.' and year(r.date) = '.$year.' and r.patient_id='.$userid.' order by day(r.date),time';
$days = array();
$bgl= array();
$sql_values = mysqli_query($link,$sql_query);
while ($row = mysqli_fetch_row($sql_values)) {
	$days[] = $row[0];
	$bgl[] = $row[1];
}

// save the JSON encoded array
$jsondays = json_encode($days);
$jsonbgl = json_encode($bgl); 
?>
<script>

var days = <?= $jsondays ?>;

var bgl = <?= $jsonbgl ?>;

var ctx2 = document.getElementById("myChart2");
var myChart2 = new Chart(ctx2, {

  type: 'line',
  data: {
    labels: days,
    datasets: [
      { 
        data: bgl,
        label: "BGL",
        borderColor: "#3e95cd",
        fill: false
      }
    ]
  },
  options: { 
    scales: {
      xAxes: [{
		  display: true,
        ticks: {
          beginAtZero: false,
		  autoSkip: true,
		  maxTicksLimit: 15,
		  maxRotation: 0,
          minRotation: 0
        }
      }]
    },
   annotation: {
      annotations: [{
         type: 'box',
         drawTime: 'beforeDatasetsDraw',
         yScaleID: 'y-axis-0',
         yMin: 80,
         yMax: 180,
         backgroundColor: 'rgba(0, 255, 0, 0.1)'
		 
      }]
   },
   legend: {
       onClick: null
   }
   
}
});

</script>
</section>
<h1 class="hero_header">
  <footer class="footer">
    <p style="margin-top: 0px;margin-bottom: 0px; text-align: center">Contact us! <br/>
    <a href="http://facebook.com"><img src="../images/facebook_icon.png" alt="facebook icon" height="30" width="30" /></a> &nbsp
    <a href="http://gmail.com"><img src="../images/gmail_icon.png" alt="gmail icon" height="30" width="30" /></a> &nbsp
    <a href="http://instagram.com"><img src="../images/instagram_icon.png" alt="instagram icon" height="30" width="30" /></a> &nbsp
    <a href="http://linkedin.com"><img src="../images/linkedin_icon.png" alt="linkedin icon" height="30" width="30" /></a> &nbsp
    <a href="http://twitter.com"><img src="../images/twitter_icon.png" alt="twitter icon" height="30" width="30" /></a> &nbsp
    </p>
  </footer>
  </h1>
</div>
</body>
</html>
