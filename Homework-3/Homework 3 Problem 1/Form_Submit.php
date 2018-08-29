<!DOCTYPE html>
<html>
<body>

<?php
$custname = $_POST['custname'];
$keyvalue = $_POST['keyword'];
$datetime1 = $_POST['datetime'];
$datetime = $datetime1 . ":00:00";
$numofpeople = $_POST['numofpeople'];
$con=mysqli_connect("localhost","root","","restaurant_booking");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
   $sql = "Select * 
           from restaurant 
		   where (rname like '%$keyvalue%' OR description like '%$keyvalue%') and capacity >= $numofpeople and rid not in (Select rid 
		                                                                                                                from restaurant natural join booking where rname like '%$keyvalue%' OR description like '%$keyvalue%' and btime = '$datetime' 
																							                            group by rid 
																							                            having (capacity - sum(quantity))< $numofpeople)";
   $retval = mysqli_query($con, $sql);   
   if ($retval->num_rows > 0)
   {
   echo "<center>LIST OF AVAILABLE RESTAURANTS</center>";
   echo "<br>";   
   echo "<table align = 'center' border='1'>
   <tr>
   <th>RESTAURANT ID</th>
   <th>RESTAURANT NAME</th>
   <th>RESTAURANT ADDRESS</th>
   <th>RESTAURANT DESCRIPTION</th>
   <th>RESTAURANT CAPACITY</th>
   <th>Booking</th> 
   </tr>";
   while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)) {
      $rid = $row['rid'];
	  echo "<tr>";
      echo "<td>" . $row['rid'] . "</td>";
      echo "<td>" . $row['rname'] . "</td>";
      echo "<td>" . $row['raddress'] . "</td>";
      echo "<td>" . $row['description'] . "</td>";
	  echo "<td>" . $row['capacity'] . "</td>";
	  echo "<td> 
	       <form action = \"Booking.php\" method = \"post\">
		   <input type= \"hidden\" name= \"rid\" value=\"$rid\">
		   <input type= \"hidden\" name= \"custname\" value=\"$custname\">
		   <input type= \"hidden\" name= \"keyvalue\" value=\"$keyvalue\">
		   <input type= \"hidden\" name= \"datetime\" value=\"$datetime\">
		   <input type= \"hidden\" name= \"numofpeople\" value=\"$numofpeople\">
		   <input type= \"submit\" value=\"Book\">
		   </form>
		   </td>";  
      echo "</tr>";
	  }
   echo "</table>";
   }
   else
   {
	   echo "<center>NO RESTAURANT IS AVAILABLE FOR BOOKING</center>";   
   }
   
   mysqli_free_result($retval);
   
   mysqli_close($con);
?>

</body>
</html>