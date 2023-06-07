<?php
include('../config.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>

<!-- Meta -->
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />

<!-- Title -->
<title>輔仁大學學餐系統管理者介面(測試版)</title>

<!-- Favicons -->
<link rel="shortcut icon" href="assets/img/favicon.png">
<link rel="apple-touch-icon" href="assets/img/favicon_60x60.png">
<link rel="apple-touch-icon" sizes="76x76" href="assets/img/favicon_76x76.png">
<link rel="apple-touch-icon" sizes="120x120" href="assets/img/favicon_120x120.png">
<link rel="apple-touch-icon" sizes="152x152" href="assets/img/favicon_152x152.png">
<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;700&family=Raleway:wght@100;200;400;500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="dist/css/core.css" />

<!-- CSS Theme -->
<link id="theme" rel="stylesheet" href="dist/css/theme-beige.css" />

</head>
    <body>
        
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

<h3>sql query result</h3>


<?php



$datas = array();
$query = "SELECT * FROM orders  "; 

$result = mysqli_query($link,$sql);


?>
<?php



$sql = "SELECT * FROM　'orders";


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
?>
<div class="container">

	<table class="table table-sm table-bordered"style="text-align:center;">
		<thead style="text-align:center;">
			<tr style="text-align:center;">
				<th>訂單id</th>
				<th>使用者id</th>
				<th>餐點1</th>
                <th>餐點2</th>
				<th>餐點3</th>
				<th>餐點4</th>
				<th>餐點5</th>
				<th>總金額</th>

			</tr>
		</thead>

		<tbody>





			<!-- 大括號的上、下半部分 分別用 PHP 拆開 ，這樣中間就可以純用HTML語法-->
			<?php
				if(mysqli_num_rows($query_run) > 0)
				{
					foreach($result as $row)
					{
                    }
                
			?>
							<tr>
                            <?php if ($result) {
                                if (mysqli_num_rows($result)>0) {
					                                    ?>

								<!-- $row['(輸入資料表的欄位名稱)'];  <<用雙引號也行 -->
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
			?>
		</tbody>
        <?php mysqli_close($link); ?> 
	</body>

</div>

</html>