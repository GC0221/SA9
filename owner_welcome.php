<?php
include('config.php');
$fp=fopen("c:\\AppServ\\www\\session\\ownerlogin.txt","r");
$sid=fread($fp,1024);
fclose($fp);
session_id($sid);
session_start();

$owner_login_account = $_SESSION['owneraccount'];

?>

<?php
$order_num = 0;
$cancelorder_num = 0;
$pendingorder_num = 0;
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
$Get_owner_ID = "SELECT `id` FROM `resturant_owner` AS userData WHERE `email`='$owner_login_account' ";
$Get_owner_ID_result = mysqli_query($link,$Get_owner_ID);
// echo "hello";
// 如果有資料
if ($Get_owner_ID_result) {
    // mysqli_num_rows方法可以回傳我們結果總共有幾筆資料
    if (mysqli_num_rows($Get_owner_ID_result)>0) {
        // 取得大於0代表有資料
        // mysqli_fetch_assoc方法可取得一筆值
        $GetIDRow = mysqli_fetch_array($Get_owner_ID_result);
        // echo "success";
        $ownerID=$GetIDRow[0];//只有一筆資料(食物1數量)
        // echo"success";
    
    }
    // 釋放資料庫查到的記憶體
    mysqli_free_result($Get_owner_ID_result);
}
else {
    // echo "{$GetIDresult} sql query fail, error message:" . mysqli_error($link);
}
// 處理完後印出資料
if(!empty($Get_owner_ID_result)){
    echo $ownerID ;
    echo "</br>";
}
else {
    // 為空表示沒資料
    echo "id no data</br>";
}
?>

<?php
if(isset($_SESSION['owneraccount'])) 
{
    $sql = "SELECT * FROM orders INNER JOIN menu on `orders`.`menu_id` = `menu`.`id` 
    WHERE `menu`.`resturant_id` = '$ownerID'";
    
    // $sql = "SELECT * FROM orders INNER JOIN menu ON `orders`.`menu_id` = `menu`.`id`
    // WHERE `menu`.`resturant_id` = '$owner_userID'";

    // echo $sql;
    // echo $ownerID;
    echo "歡迎登入，$ownerID";
    echo "" ;
echo $_SESSION['owneraccount'];  
echo "已登錄!";
}
else 
{
echo "未登錄，無權訪問";
    echo "請<a href=\"user_login.php\">登錄</a>後瀏覽";
        exit();
}
?> 



<?php

$result = mysqli_query($link,$sql);

?>

<?php
$orderssql = "SELECT * FROM orders INNER JOIN menu on `orders`.`menu_id` = `menu`.`id` 
 WHERE `menu`.`resturant_id` = '$ownerID' AND `status` = '成立'";

$ordersresult = mysqli_query($link,$orderssql);
if ($ordersresult) {
    if (mysqli_num_rows($ordersresult)>0) {
       $order_num = mysqli_num_rows($ordersresult);
        
    }


    mysqli_free_result($ordersresult);
}
else {
    echo "{$orderssql} sql query fail, error message:" . mysqli_error($link);
}
if(!empty($ordersresult)){
    // echo "訂單數量: $order_num ";
}
else {
    echo "no data";
}
?>

<?php
$cancelorderssql = "SELECT * FROM orders INNER JOIN menu on `orders`.`menu_id` = `menu`.`id` 
 WHERE `menu`.`resturant_id` = '$ownerID' AND `status` = '取消'";

$cancelordersresult = mysqli_query($link,$cancelorderssql);
if ($cancelordersresult) {
    if (mysqli_num_rows($cancelordersresult)>0) {
       $cancelorder_num = mysqli_num_rows($cancelordersresult);
        
    }


    mysqli_free_result($cancelordersresult);
}
else {
    echo "{$cancelorderssql} sql query fail, error message:" . mysqli_error($link);
}
if(!empty($cancelordersresult)){
    // echo "取消訂單數量:$cancelorder_num ";
}
else {
    echo "no data";
}
?>

<?php
$pendingorderssql = "SELECT * FROM orders INNER JOIN menu on `orders`.`menu_id` = `menu`.`id` 
 WHERE `menu`.`resturant_id` = '$ownerID' AND `status` = '待確認'";

$pendingordersresult = mysqli_query($link,$pendingorderssql);
if ($pendingordersresult) {
    if (mysqli_num_rows($pendingordersresult)>0) {
       $pendingorder_num = mysqli_num_rows($pendingordersresult);
        
    }


    mysqli_free_result($pendingordersresult);
}
else {
    echo "{$pendingorderssql} sql query fail, error message:" . mysqli_error($link);
}
if(!empty($pendingordersresult)){
    // echo "待確認訂單數量:$pendingorder_num ";
}
else {
    echo "no data";
}
?>






<!DOCTYPE html>
<html lang="en">
<head>

<!-- Meta -->
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />

<!-- Title -->
<title>輔仁大學學餐系統業者介面(測試版)</title>

<!-- Favicons -->
<link rel="shortcut icon" href="assets/img/favicon.png">
<link rel="apple-touch-icon" href="assets/img/favicon_60x60.png">
<link rel="apple-touch-icon" sizes="76x76" href="assets/img/favicon_76x76.png">
<link rel="apple-touch-icon" sizes="120x120" href="assets/img/favicon_120x120.png">
<link rel="apple-touch-icon" sizes="152x152" href="assets/img/favicon_152x152.png">
<!-- Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;700&family=Raleway:wght@100;200;400;500&display=swap" rel="stylesheet">
<!-- CSS Core -->
<link rel="stylesheet" href="dist/css/core.css" />
<!-- CSS Theme -->
<link id="theme" rel="stylesheet" href="dist/css/theme-beige.css" />
</head>

<body>
    <!-- Header -->
    <header id="header" class="light">

            <div class="row">
                <div class="col-md-3">
                    <!-- Logo -->
                    <div >
                        <a href="index.php">
                            <img src="assets/img/fju_logo.png" alt="" width="88">
                        </a>
                    </div>
                </div>
                <div class="col-md-7">
                    <nav class="module module-navigation left mr-4">
                        <ul id="nav-main" class="nav nav-main">
                            <li><a href="#">介面首頁</a></li>
                            <li><a href="owner_menu.php">菜單管理</a></li>
                            <li><a href="#">介面首頁</a></li>
                            <li><a href="#">介面首頁</a></li>
                            <li><a href="#">介面首頁</a></li>

                            <li><a href="menu-list-collapse.php">菜單</a></li>
                            <li><a href="page-contact.html">聯絡我們</a></li>
                            <li><a href="logout.php">登出</a></li>

                        </ul>
                    </nav>
                    <div class="module left">
                        <a href="protoptype.php" class="btn btn-outline-secondary"><span>點餐</span></a>

                    </div>
                </div>

    
        </div>

    </header>
    <!-- Header / End -->

    <!-- Header -->
  
    <!-- Header / End -->

    <!-- Content -->
        <!-- Section - Main -->
        &nbsp;&nbsp;
        <!-- Section - Menu -->
        <section class="section pb-0 protrude">
            <div class="container">
            <nav aria-label="breadcrumb">
                  <li class="breadcrumb-item"><a href="#"></a></li>
                  <li class="breadcrumb-item active" aria-current="page"> </li>
              </nav>
            </div>
            &nbsp;&nbsp;
        </section>
    <!-- Body Overlay -->
    <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">新增</a></li>
                  <li class="breadcrumb-item"><a href="#">修改</a></li>
                  <li class="breadcrumb-item"><a href="#">功能</a></li>

                  <li class="breadcrumb-item active" aria-current="page"> 活動管理</li>
                </ol>
              </nav>

<!-- JS Core -->
<script src="dist/js/core.js"></script>

</body>

</html>

<?php
?>


<div class="container">
<?php    
echo "取消訂單數量:$cancelorder_num "; 
echo "訂單數量: $order_num ";
echo "待確認訂單數量:$pendingorder_num ";


?>


<table class="table table-sm table-bordered"style="text-align:center;">
    <thead style="text-align:center;">
        <tr style="text-align:center;">

            <th>訂單編號</th>
            <th>餐點ID </th>
            <th>使用者ID </th>
            <th>訂購數量 </th>
            <th>訂單創建時間</th>
            <th>訂單編輯時間</th>
            <th>訂單狀態 </th>
        </tr>
    </thead>
    <tbody>

<?php
if ($result) {
    if (mysqli_num_rows($result)>0) 
    {
        foreach($result as $row)
					{
?>
<tr>
								<td><?php echo $row['order_number']; ?></td> 
								<td><?php echo $row['menu_id']; ?></td>
                                <td><?php echo $row['user_id']; ?></td>
								<td><?php echo $row['quantity']; ?></td>
                                <td><?php echo $row['created_time']; ?></td>
                                <td><?php echo $row['edit_time']; ?></td>
                                <td><?php echo $row['status']; ?></td>


								<!-- <td><-?php echo $row['fk_resturant_owner_id']; ?></td> -->
								<!-- <td><-?php echo $row['image_name']; ?></td> -->

                            </tr>

<?php
        }
    }
   
}
mysqli_free_result($result);
?>

	</tbody>
	</body>

</div>