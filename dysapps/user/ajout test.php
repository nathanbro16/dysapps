<!DOCTYPE html>
<html>
<head>
    <title>Bootstrap datepicket demo</title>
    <link href="datepicker/css/bootstrap.min.css" rel="stylesheet">
    <script src="datepicker/js/bootstrap.min.js"></script>
    <script type='text/javascript' src='datepick/js/jquery-1.8.3.js'></script>

    <link rel="stylesheet" href="datepicker/css/bootstrap-datepicker3.min.css">
    <script type='text/javascript' src="datepicker/js/bootstrap-datepicker.min.js"></script>
<script type='text/javascript'>
$(function(){
$('.input-group.date').datepicker({
    calendarWeeks: true,
    todayHighlight: true,
    autoclose: true,

});  
});

</script>
</head>
<body>
<div class="container">
<h1>Bootstrap datepicker</h1>
<div class="input-group date">
  <input type="text" class="form-control"><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
</div>
</div>
</body>
</html>

