<?php 
$con=mysqli_connect("localhost","root","","task3001"); 

$name=isset($_POST['uname'])?$_POST['uname']:null;
$age=isset($_POST['uage'])?$_POST['uage']:null;
$mail=isset($_POST['uemail'])?$_POST['uemail']:null;
$mobile=isset($_POST['uphone'])?$_POST['uphone']:null;
$address=isset($_POST['uaddress'])?$_POST['uaddress']:null;
if (isset($_POST['uagree']) )
{
    $agree = 1;
} 
else{ 
    $agree = 0;
}

$sql_mail = "SELECT * FROM users WHERE uemail='$mail'";
$sql_mobile = "SELECT * FROM users WHERE uphone='$mobile'";
$res_email = mysqli_query($con, $sql_mail);
$res_mobile = mysqli_query($con, $sql_mobile);

if(mysqli_num_rows($res_email) > 0) 
{
    echo "Sorry... email already taken"; 
}
elseif(mysqli_num_rows($res_mobile) > 0)
{
    echo "Sorry... phone number already taken"; 	
    	
}
else
{
    $sql = "INSERT INTO users (uname,uage,uemail,uaddress,uphone,uagree) VALUES ('$name','$age','$mail','$address',$mobile,$agree)";
    $r=mysqli_query($con,$sql);
    if ($r) 
    {
        $output = "User Deatils Saved Successfully"; 
        echo $output;
    } 
    else 
    {
        $output = "There is an issue please refresh and submit the form again"; 
        echo $output;
    }   
}

?>