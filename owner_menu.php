<?php
include('config.php');
$fp=fopen("c:\\AppServ\\www\\session\\ownerlogin.txt","r");
$sid=fread($fp,1024);
fclose($fp);
session_id($sid);
session_start();
?>

<?php
$owner_login_account = $_SESSION['owneraccount'];

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
//    echo "error connect</br>" . mysqli_connect_error();
   exit();
}
?>
<?php
// echo "hello";
$food_name=$_POST['food_name'];
$price=$_POST['price'];
$image_name= $_FILES['file']['name'];


$food_name=$_POST['food_name'];
$price=$_POST['price'];
$image_name= $_FILES['file']['name'];

// echo $owner_login_account;
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
        $userID=$GetIDRow[0];//只有一筆資料(食物1數量)
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
    echo $userID ;
    echo "</br>";
}
else {
    // 為空表示沒資料
    echo "id no data</br>";
}

if(isset($_POST['submit'])) {
$food_state = $_POST['active'];
echo "You selected option " . $food_state;
}


if(is_uploaded_file($_FILES['file']['tmp_name'])){
    $file='menu_image/'.basename($_FILES['file']['name']);
    echo "Success";
    if(move_uploaded_file($_FILES['file']['tmp_name'], $file)){
        if($_FILES['file']['type']=='image/png' || $_FILES['file']['type']=='image/jpeg')//判斷檔名是否為圖檔
        {
            echo '<br>';
            echo $_FILES['file']['name'];//檔案名稱
            echo '<br>';
            echo $_FILES['file']['size'], ' byte';//檔案大小
            echo '<br>';
            echo $file, '上傳成功。';
            echo '<p><img src="',$file,' "width="100px" "></p>';
    
            $sql = "INSERT INTO  `menu` (`food_name`, `price`, `active`, `resturant_id`, `image_name`) 
                                  VALUE ('$food_name','$price', '$food_state', 1,'$image_name') ";
            // 用mysqli_query方法執行(sql語法)將結果存在變數中
            $result = mysqli_query($link,$sql);
            
            // 如果有異動到資料庫數量(更新資料庫)
            if (mysqli_affected_rows($link)>0) {
            // 如果有一筆以上代表有更新
            // mysqli_insert_id可以抓到第一筆的id
            $new_id= mysqli_insert_id ($link);
            echo "new id {$new_id} </br>";
            }
            elseif(mysqli_affected_rows($link)==0) {
            echo "no data insert</br>";
            }
            else {
            echo "{$sql} sql query fail, error message:</br>" . mysqli_error($link);
            }
            // echo "$discount_price";
        

        }else//如果不為圖檔的話
        {
            echo '此副檔名需為jpg.jpge.png';
        }
    }else
    {
        echo '上傳失敗。';
    }
}
else
{
    // echo '請選擇檔案。';
}


//$food_name','$price', '$food_state', 1,'$image_name'
 $sql = "UPDATE  `menu` SET `food_name` = '$food_name', `price`='$price', `active` = '$food_state',`resturant_id` = `` ,`image_name` = '$image_name' WHERE `id`= '$userID'";
$result = mysqli_query($link,$sql);

if (mysqli_affected_rows($link)>0) {
// echo "data update";
}
elseif(mysqli_affected_rows($link)==0) {
    echo "no data update";
}
else {
    echo "{$sql} sql query fail, error message:" . mysqli_error($link);
}

?>




<?php
$sql = "SELECT * FROM `menu`";

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
<script type= "text/javascript" src = "js/query.js"></script>
<script>
function DeleteCheck(){
    if(confirm("確定刪除?")== true)
        return true;
    
    else
        return false;
    }
    </script>


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
                            <li><a href="owner_menu_update.php">新增菜單項目</a></li>
                            <li><a href="<?php echo 'http://localhost/sa_project/'; ?>owner_edit_menu.php?id=<?php echo $row['id']; ?>">編輯菜單項目</a></li>
                            <li><a href="#">刪除菜單項目</a></li>
                            <li><a href="index.php">登出</a></li>

                        </ul>
                    </nav>


<div class="container">

<table class="table table-sm table-bordered"style="text-align:center;">
    <thead style="text-align:center;">
        <tr style="text-align:center;">
            <th>餐點名稱</th>
            <th>餐點價位</th>
            <th>供應狀態</th>
            <th>餐點圖片</th>
            <th>功能選單</th>


        </tr>
    </thead>
    <tbody>

<?php
if ($result) {
    if (mysqli_num_rows($result)>0) {
        foreach($result as $row)
					{
                        $id = $row['id'];
                     


?>
<tr>

								<td><?php echo $row['food_name']; ?></td>
                                <td><?php echo $row['price']; ?></td>
								<td><?php echo $row['active']; ?></td>

                                <td> <p><img src="<?php echo 'http://localhost/sa_project/';?>menu_image/<?php echo $row['image_name']; ?> " width="100px" ></p></td>
                                <td>
                                    <button type="button" class="btn btn-secondary btn-sm " href = "<?php echo 'http://localhost/sa_project/'; ?>owner_edit_menu.php?id=<?php echo $id; ?>">編輯</button>
                                    &nbsp;
                                    <button type="button" class="btn btn-secondary btn-sm " style="margin: 10" onclick="return DeleteCheck();">刪除</button>

                                    <!-- <button type="button" class="btn btn-secondary btn-sm " style="margin: 10" onclick="return DeleteCheck();">刪除</button> -->
                            </td>
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

<?php mysqli_close($link); ?>