<html>
<body>
<center><h1><font face="Arial">ALL CUSTOMERS</font></h1></center>
<?php
$servername = "localhost";
$username = "id17251385_basicbank";
$password = "!@#%W4QS3puW";
$database = "id17251385_bank";

// Create connection
$con = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

//mysqli_select_db("$db_name")or die("cannot select DB");
// Get values from form
// Insert data into mysql
$query = "SELECT * FROM bank";

echo '<center><table class="tbl" border="5" cellspacing="5" cellpadding="5" bordercolor ="lightskyblue">
<tr> 
 <td> <font face="Arial" size="5%"><b>Id</font></b></td> 
 <td> <font face="Arial" size="5%"><b>Name</font></b></td> 
 <td> <font face="Arial" size="5%"><b>Email</font></b></td>
 <td> <font face="Arial" size="5%"><b>Balance</font></b></td>
 <td> <font face="Arial" size="5%"><b>Transfer amount</font></b></td>
 </tr></center>';
if ($result=mysqli_query($con,$query))
{
 // Fetch one and one row
 while ($row=mysqli_fetch_array($result))
 {
 $id = $row[0];
 $name = $row[1];
 $email = $row[2];
 $balance = $row[3];
 echo '<tr> 
 <td><font face="Arial" size="5%">'.$id.'</font></td> 
 <td><font face="Arial" size="5%">'.$name.'</font></td> 
 <td><font face="Arial" size="5%">'.$email.'</font></td> 
 <td><font face="Arial" size="5%">'.$balance.'</font></td>
 <td><a href="userdetails.php? id='.$row[0].'"> <button type="button" class="btn">Show Details/Transfer</button></a></td> 
 </tr>';
 }
 // Free result set
 mysqli_free_result($result);
mysqli_close($con);
} ?>
</body>
</html>
