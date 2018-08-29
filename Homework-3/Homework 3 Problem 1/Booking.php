<!DOCTYPE html>
<html>
<body>

<?php
$rid = $_POST['rid'];
$custname = $_POST['custname'];
$keyvalue = $_POST['keyvalue'];
$datetime = $_POST['datetime'];
$numofpeople = $_POST['numofpeople'];
$con=mysqli_connect("localhost","root","","restaurant_booking");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
   $sql = "Select cid 
            from customer 
			where cname = '$custname'";
   $retval = mysqli_query($con, $sql);
   if ($retval->num_rows > 0)
   {   
   $row = mysqli_fetch_array($retval, MYSQLI_ASSOC);
   $cid = $row['cid'];
   mysqli_free_result($retval);
   $sql = "INSERT INTO booking (cid, rid, btime, quantity)
           VALUES ('$cid', '$rid', '$datetime', '$numofpeople')";
   mysqli_query($con, $sql);
   $sql = "Select bid,cid,cname,rname,raddress,description,btime,quantity 
           from booking natural join customer natural join restaurant 
		   where cid in (Select cid 
		                 from booking natural join customer 
						 where cname = '$custname')";
   $retval = mysqli_query($con, $sql);
   echo "<center>ORDERS OF $custname</center>";
   echo "<br>";   
   echo "<table align = 'center' border='1'>
   <tr>
   <th>BOOKING ID</th>
   <th>CUSTOMER ID</th>
   <th>CUSTOMER NAME</th>
   <th>RESTAURANT NAME</th>
   <th>RESTAURANT ADDRESS</th>
   <th>RESTAURANT DESCRIPTION</th>
   <th>BOOKING TIME</th>
   <th>NUMBER OF PEOPLE</th>
   </tr>";
   while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)) {
      echo "<tr>";
	  echo "<td>" . $row['bid'] . "</td>";
      echo "<td>" . $row['cid'] . "</td>";
	  echo "<td>" . $row['cname'] . "</td>";
	  echo "<td>" . $row['rname'] . "</td>";
	  echo "<td>" . $row['raddress'] . "</td>";
	  echo "<td>" . $row['description'] . "</td>";
	  echo "<td>" . $row['btime'] . "</td>";
      echo "<td>" . $row['quantity'] . "</td>";  
      echo "</tr>";
	  }
   echo "</table>";   
   }
   else
   {
	echo "<h3><center>NEW USER REGISTRATION FORM</h3></center>";
    echo "<br>";	
	echo "<center><b>You are not a registered user</b></center>";
	echo "<center><b>Please provide the below additional information for registration</b></center>";
    echo "<br>";
    echo " <form action = \"Newuser.php\" method = \"post\"><center>
		   <input type= \"hidden\" name= \"rid\" value=\"$rid\">
		   <input type= \"hidden\" name= \"custname\" value=\"$custname\">
		   <input type= \"hidden\" name= \"datetime\" value=\"$datetime\">
		   <input type= \"hidden\" name= \"numofpeople\" value=\"$numofpeople\">
		   <input type= \"number\" name= \"number\" required autofocus placeholder= \"Phone number\" min = \"1000000000\" max = \"9999999999\" oninvalid= \"setCustomValidity('Invalid Phone Number:Phone number should be 10 digits')\" oninput=\"try{setCustomValidity('')}catch(e){}\"><br><br>
		   <input type= \"submit\" value=\"Submit\">
		   </center></form>";		   
   }	   
   mysqli_close($con);
?>

</body>
</html>