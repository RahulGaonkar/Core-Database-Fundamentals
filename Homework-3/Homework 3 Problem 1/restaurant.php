<!DOCTYPE html>
<html>
<head>
<script src="scripts/jquery.min.js"></script>
<script src="scripts/moment.js"></script>
<script src="scripts/bootstrap.min.js"></script>
<script src="scripts/bootstrap-datetimepicker.min.js"></script>
<link rel="stylesheet" href="styles/bootstrap.min.css" media="screen">
<link rel="stylesheet" href="styles/bootstrap-datetimepicker.min.css" media="screen">
</head>
<body>
<form action ="Form_Submit.php" method ="post"><center>
<h3><b><i>RESTAURANT BOOKING PORTAL</i></b></h3>
<b>Customer Name:</b><br>
<input type="text" name="custname" required placeholder="Name" pattern="[A-Za-z]{1,}[ ][A-Za-z]{1,}" title="Customer Name should not contain numbers or any special characters. Format:First Name followed by a space followed by last name " autofocus>
<br><br>
<b>Keyword:</b><br>
<input type="text" name="keyword" placeholder="Keyword" pattern="[A-Za-z]{0,}" title ="Keyword should not contain numbers or any special characters">
<br><br>
<b>Number of people:</b><br>
<input type="number" name="numofpeople" required placeholder="Number of people" min ="1">
<br><br>
<b>Reservation Date and Time:</b><br>
<div class="glyphicon glyphicon-calendar"> 
<input data-date-format="YYYY-MM-DD HH" placeholder = "YYYY-MM-DD HH" type="text" name="datetime" required id ="datetimepicker">
</div><br><br>
<input type="submit" value="Submit">
<input type="reset" value="Reset">
</center>
</form> 
<script>
$(function () {
                $('#datetimepicker').datetimepicker();
            });
</script>

</body>
</html>