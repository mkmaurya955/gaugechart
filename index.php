<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Temperature, Humidity</title>
   <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <!--For Humidity Gauge-->
    <script type="text/javascript">
      google.charts.load('current', {'packages':['gauge']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Label', 'Value'],
          ['Humidity', 0],
          ['Temperature', 0]
         
        ]);

        var options = {
          width: 600, height: 600,
          redFrom: 70, redTo: 100,
          yellowFrom:40, yellowTo: 70,
          greenFrom:0, greenTo: 50,
          minorTicks: 5
        };

        var chart = new google.visualization.Gauge(document.getElementById('chart_div'));

        chart.draw(data, options);

        setInterval(function() {
            var JSON=$.ajax({
                url:"http://localhost/gaugechart/DataSensores.php?q=1",
                dataType: 'json',
                async: false}).responseText;
            var Respuesta=jQuery.parseJSON(JSON);
            
          data.setValue(0, 1,Respuesta[0].humidity);
          data.setValue(1, 1,Respuesta[0].temperature);
          chart.draw(data, options);
        }, 130);
        
      }
    </script>
</head>
<body>
  <div class="container">
    <div id="chart_div" align="center" style="margin-top: 100px"></div>
    <div class="row">
      <div class="col-sm-6">
        <h1 style="margin-left:350px"><b><u>Humidity</u></b></h1>

      </div>
      <div class="col-sm-6">
        <h1 style="margin-left: 35px"><b><u>Temperature</u></b></h1>
      </div>
            
    </div>
  </div>

</body>
</html>