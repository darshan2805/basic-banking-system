<html>
<head>
<link rel="stylesheet" type="text/css" href="table.css">
<head>
<body>
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

?>
<?php
    $sid=$_GET['id'];
    $sql = "SELECT * FROM  bank where id=$sid";
    $result=mysqli_query($con,$sql);
    $rows=mysqli_fetch_assoc($result);
?>
<center>
<table class="tbl" border="5" cellspacing="5" cellpadding="5" bordercolor ="lightskyblue">
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Balance</th>
                </tr>
                <tr>
                    <td><?php echo $rows['id'] ?></td>
                    <td><?php echo $rows['name'] ?></td>
                    <td><?php echo $rows['email'] ?></td>
                    <td><?php echo $rows['balance'] ?></td>
                </tr>
            </table>
<form name="transaction" action="transfer.php" method="post">
<br>
<label>Select The Customer To Transfer To:</label><br><br>
<input hidden type="text" name="from" id="from" value=<?php echo $rows['name'] ?>>
<select style="width:35%; height:25px;" name="to" id="to">
    <option value="" disabled selected>choose</option>
    <option value="Terresa">Terresa</option>
    <option value="Jenny">Jenny</option>
    <option value="Elena">Elena</option>
    <option value="Harley">Harley</option>
    <option value="Terina">Terina</option>
    <option value="Gena">Gena</option>
    <option value="Edie">Edie</option>
    <option value="Kraig">Kraig</option>
    <option value="Lean">Lean</option>
    <option value="george">george</option>
</select>
<br><br>
<label>Enter The Transaction Ammount:</label><br><br>
<input style="width:35%; height:25px" type="number" name="amount" id="amount"><br><br>
<button style="width:35%; height:25px" name="submit" type="submit">transfer</button>
</form>
</center>
</body>
</html>
