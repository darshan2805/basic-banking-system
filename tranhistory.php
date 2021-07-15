<html>
<body>
<center><h1><font face="Arial">TRANSACTION HISTROY</font></h1></center>
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
$query = "SELECT * FROM transaction";

echo '<center><table class="tbl" border="5" cellspacing="5" cellpadding="5" bordercolor ="lightskyblue">
<tr> 
 <td> <font face="Arial" size="5%"><b>Sender</font></b></td> 
 <td> <font face="Arial" size="5%"><b>Reciever</font></b></td> 
 <td> <font face="Arial" size="5%"><b>Amount</font></b></td>
 </tr></center>';
if ($result=mysqli_query($con,$query))
{
 // Fetch one and one row
 while ($row=mysqli_fetch_array($result))
 {
 $send = $row[0];
 $recive = $row[1];
 $amount = $row[2];
 echo '<tr> 
 <td><font face="Arial" size="5%">'.$send.'</font></td> 
 <td><font face="Arial" size="5%">'.$recive.'</font></td> 
 <td><font face="Arial" size="5%">'.$amount.'</font></td> 
 </tr>';
 }
 // Free result set
 mysqli_free_result($result);
mysqli_close($con);
} ?>
</body>
</html>
