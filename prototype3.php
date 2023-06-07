<h3>sql query result</h3>

<?php
$link = @mysqli_connect( 
            'localhost',  
            'root',       
            '00000000',  
            'sa9');  
if ($link) 
{
   mysqli_query($link,'SET NAMES utf8');
   echo"connect success";
}
else
{  
   echo "error connect</br>" . mysqli_connect_error();
   exit();
}
?>

<?php
$datas = array();
$sql = "SELECT * FROM `orders`";

$result = mysqli_query($link,$sql);
if ($result) {
    if (mysqli_num_rows($result)>0) {

        while ($row = mysqli_fetch_assoc($result)) {
            $datas[] = $row;
        }
    }
    mysqli_free_result($result);
}
else {
    echo "{$sql} sql query fail, error message:" . mysqli_error($link);
}
if(!empty($result)){
    print_r($datas);
}
else {
    echo "no data";
}