<!DOCTYPE html>
<html>
<body>

<?php
$rid = $_POST['rid'];
$custname = $_POST['custname'];
$number = $_POST['number'];
$datetime = $_POST['datetime'];
$numofpeople = $_POST['numofpeople'];

$con=mysqli_connect("localhost","root","","restaurant_booking");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
   $sql = "Select max(cid) + 1 as cid 
            from customer";
   $retval = mysqli_query($con, $sql);
   $row = mysqli_fetch_array($retval, MYSQLI_ASSOC);
   $cid = $row['cid'];
   mysqli_free_result($retval);
   $sql = "INSERT INTO customer (cid, cname, phone)
           VALUES ('$cid', '$custname', '$number')";
   mysqli_query($con, $sql);   
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
   mysqli_close($con);
?>

</body>
</html>