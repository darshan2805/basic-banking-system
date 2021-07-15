<html>
</body>
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

$from = $_POST['from'];
$to = $_POST['to'];
$amount = $_POST['amount'];

$sql = "SELECT * from bank where name='$from'";
$result = mysqli_query($con,$sql);
$sql1 = mysqli_fetch_array($result); 

$sql = "SELECT * from bank where name='$to'";
$result = mysqli_query($con,$sql);
$sql2 = mysqli_fetch_array($result);


if (($amount)<0)
{
    echo '<script type="text/javascript">';
    echo ' alert("Oops! Negative values cannot be transferred")';
    echo '</script>';
}


  
    
else if($amount > $sql1['balance']) 
{
        
    echo '<script type="text/javascript">';
    echo ' alert("Bad Luck! Insufficient Balance")'; 
    echo '</script>';
}
    

else if($amount == 0){

    echo "<script type='text/javascript'>";
    echo "alert('Oops! Zero value cannot be transferred')";
    echo "</script>";
    }


else {
        
                
    $newbalance = $sql1['balance'] - $amount;
    $sql = "UPDATE bank set balance=$newbalance where name='$from'";
    mysqli_query($con,$sql);
             

                
    $newbalance = $sql2['balance'] + $amount;
    $sql = "UPDATE bank set balance=$newbalance where name='$to'";
    mysqli_query($con,$sql);
    
    $sender = $sql1['name'];
    $receiver = $sql2['name'];
    $sql = "INSERT INTO transaction(`sender`, `receiver`, `amount`) VALUES ('$sender','$receiver','$amount')";
    $result=mysqli_query($con,$sql);
                

    if($result){
    echo "<script> alert('Transaction Successful');
    window.location='bank.php';
    </script>";
                    
    }

    $newbalance= 0;
    $amount =0;
} 
?>
</body>
</html>
