
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
//    echo "error connect</br>" . mysqli_connect_error();
   exit();
}
?>

<?php
$sql = "SELECT * FROM `orders`";

$result = mysqli_query($link,$sql);

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

<nav class="module module-navigation left mr-4">
                        <ul id="nav-main" class="nav nav-main">

                            <li><a href="welcome.php">首頁</a></li>
                            <li><a href="menu-list-collapse.php">菜單</a></li>
                            <li><a href="page-contact.html">聯絡我們</a></li>
                            <li><a href="index.php">登出</a></li>

                        </ul>
                    </nav>




<div class="container">

<table class="table table-sm table-bordered"style="text-align:center;">
    <thead style="text-align:center;">
        <tr style="text-align:center;">
            <th>訂單順序</th>
            <th>客戶電子郵件: </th>
            <th>滷肉飯(小):</></th>
            <th>餛飩麵(小): </th>
            <th>滷肉飯(大): </th>
            <th>排骨飯: </th>
            <th>咖哩飯: </th>
            <th>總金額: </th>


        </tr>
    </thead>
    <tbody>

<?php
if ($result) {
    if (mysqli_num_rows($result)>0) {
        foreach($result as $row)
					{
?>
<tr>
								<td><?php echo $row['id']; ?></td> 
								<td><?php echo $row['user_id']; ?></td> 
								<td><?php echo $row['food_id1']; ?></td>
                                <td><?php echo $row['food_id2']; ?></td>
								<td><?php echo $row['food_id3']; ?></td>
								<td><?php echo $row['food_id4']; ?></td>
								<td><?php echo $row['food_id5']; ?></td>
                                <td><?php echo $row['total_cost']; ?></td>

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

