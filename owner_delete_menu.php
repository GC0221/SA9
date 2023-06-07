<?php
include('config.php');
$fp=fopen("c:\\AppServ\\www\\session\\ownerlogin.txt","r");
$sid=fread($fp,1024);
fclose($fp);
session_id($sid);
session_start();
?>

<?php 
$link = @mysqli_connect( 
            'localhost',  
            'root',       
            '00000000',  
            'sa9');  
            if ($link) 
            {
               mysqli_query($link,'SET NAMES utf8');
            //    echo"connect success";
            }
            else
            {  
               echo "error connect</br>" . mysqli_connect_error();
               exit();
            }
?>

<?php
$sql = "SELECT * FROM `menu`";

$result = mysqli_query($link,$sql);

?>



<?php mysqli_close($link); ?>