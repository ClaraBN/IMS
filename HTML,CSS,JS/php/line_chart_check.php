<script src="http://use.edgefonts.net/source-sans-pro:n2:default.js" type="text/javascript"></script>
<script src="https://cdn.anychart.com/js/8.0.1/anychart-core.min.js"></script>
<script src="https://cdn.anychart.com/js/8.0.1/anychart-pie.min.js"></script>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/chartjs-plugin-annotation/0.5.7/chartjs-plugin-annotation.js"></script>
<script>

var hour = [0,1,2,3,4,5,6,7,8,9];

var bgl = [86,114,106,106,107,40,32,221,200,120];

var ctx = document.getElementById("myChart");
var myChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: hour,
    datasets: [
      { 
        data: bgl,
        label: "BGL",
        borderColor: "#3e95cd",
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
         yMin: 65,
         yMax: 135,
         backgroundColor: 'rgba(0, 255, 0, 0.1)'
      }]
   },
   legend: {
       onClick: null
   } 
}
});

</script>

<div class="wrapper">
 <canvas id="myChart" width="1600" height="900"></canvas>
 </div>