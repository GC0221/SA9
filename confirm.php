<?php 
include('../config.php');
$fp=fopen("c:\\AppServ\\www\\session\\mylogin.txt","r");
$sid=fread($fp,1024);
fclose($fp);
session_id($sid);
session_start();
echo "會員";
echo $_SESSION['account'];
echo "已登錄!";

$login_account = $_SESSION['account'];
// echo $login_account;
?>


<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
include "PHPMailer/src/Exception.php";
include "PHPMailer/src/PHPMailer.php";
include "PHPMailer/src/SMTP.php";






$food_id1=" ";
$food_id2=" ";
$food_id3=" ";
$food_id4=" ";
$food_id5=" ";

$food1_selected= 0;
$food2_selected= 0;
$food3_selected= 0;
$food4_selected= 0;
$food5_selected= 0;


$food1_price = 0;
$food2_price = 0;
$food3_price = 0;
$food4_price = 0;
$food5_price = 0;


//數量的初始值皆為0，在被選之前
$food1_quantity=0;
$food2_quantity=0;
$food3_quantity=0;
$food4_quantity=0;
$food5_quantity=0;


$food1_message = "";
$food2_message = "";
$food3_message = "";
$food4_message = "";
$food5_message = "";


$totalcost = 0;

$total_expense = 0;

$userlevel="";

$discount = 1.0; // 未折扣所以採用1.0為初始值

$discount_price = 0;

$discount_counter = 3;






$Object = new DateTime();  //get the time data from computer 
$Object->setTimezone(new DateTimeZone('Asia/Taipei')); // set timezone 
$DateAndTime = $Object->format("dmY h:i:s a");   //convert 轉換時間到人看得懂的時間表示法
echo "The current date and time in Taipei are $DateAndTime."; // echo 



// 建立MySQL的資料庫連接 
$link = @mysqli_connect( 
            'localhost',  // MySQL主機名稱 
            'root',       // 使用者名稱 
            '00000000',  // 密碼 
            'sa9');  // 預設使用的資料庫名稱 
if ($link) 
{
   mysqli_query($link,'SET NAMES utf8');
//    echo"connect success</br>";
}
else
{  
//    echo "error connect</br>" . mysqli_connect_error();
   exit();
}


    if(isset($_POST["submit"]))
    {
    if(isset($_POST["food_id1"]))
    {
        $food_id1=$_POST['food_id1'];
        // echo "food_id1"."</br>";
        $food1_selected= 1;
        $food1_quantity=$_POST['food1_quantity'];
        $food1_price = 30;
        $food1_message="$food_id1 $food1_price 元 x $food1_quantity 份<br/>";
    }
    if(isset($_POST["food_id2"])){
        $food_id2=$_POST['food_id2'];
        // echo "food_id2"."</br>";
        $food2_selected= 1;
        $food2_quantity=$_POST['food2_quantity'];
        $food2_price = 50;
        $food2_message="$food_id2 $food2_price 元 x $food2_quantity 份<br/>";

    }
    if(isset($_POST["food_id3"])){
        $food_id3=$_POST['food_id3'];
        // echo "food_id3"."</br>";
        $food3_selected= 1;
        $food3_quantity=$_POST['food3_quantity'];
        $food3_price = 70;
        $food3_message="$food_id3 $food3_price 元 x $food3_quantity 份<br/>";


    }
    if(isset($_POST["food_id4"]))
    {
        $food_id4=$_POST['food_id4'];
        // echo "food_id4"."</br>";
        $food4_selected= 1;
        $food4_quantity=$_POST['food4_quantity'];
        $food4_price = 80;
        $food4_message="$food_id4 $food4_price 元 x $food4_quantity 份<br/>";

    
    }if(isset($_POST["food_id5"]))
    {
        $food_id5=$_POST['food_id5'];
        // echo "food_id5"."</br>";
        $food5_selected= 1;
        $food5_price = 100;
        $food5_quantity=$_POST['food5_quantity'];
        $food5_message="$food_id5 $food5_price 元 x $food5_quantity 份<br/>";


    } 
    }
    echo "$userlevel </br>";


    $totalcost = ($food1_price * $food1_quantity) + ($food2_price * $food2_quantity) + ($food3_price * $food3_quantity) + ($food4_price*$food4_quantity) + ($food5_price*$food5_quantity) ;
// echo "($food1_price * $food1_quantity)</br>", "($food2_price * $food2_quantity)</br>", "($food3_price * $food3_quantity)</br>", "($food4_price*$food4_quantity)</br>", "($food5_price*$food5_quantity)</br>", "$totalcost</br>";


//
//查詢使用者訂購總金額
// $sqlCost="SELECT SUM(total_cost) FROM `orders` AS total WHERE `user_id`= `$login_account` ";
$sqlCost="SELECT SUM(total_cost) FROM `orders` AS total WHERE `user_id`= 'gabriel.cy221@gmail.com' ";

$cost_result = mysqli_query($link,$sqlCost);

// 如果有資料
if ($cost_result) {
    // mysqli_num_rows方法可以回傳我們結果總共有幾筆資料
    if (mysqli_num_rows($cost_result)>0) {
        // 取得大於0代表有資料
        // mysqli_fetch_assoc方法可取得一筆值
        $row = mysqli_fetch_array($cost_result);
        $total_expense=$row[0];//只有一筆資料(總金額)
    }
    // 釋放資料庫查到的記憶體
    mysqli_free_result($cost_result);
}
else {
    // echo "{$cost_result} sql query fail, error message:" . mysqli_error($link);
}
// 處理完後印出資料
if(!empty($cost_result)){
    // echo $total_expense ;
    echo "</br>";
}
else {
    // 為空表示沒資料
    // echo "no data</br>";
}

//get the time // current time 是當日 // 每一個月的1號 優惠可以歸零
$current_time=str_split($DateAndTime,2);
print_r($current_time);
$date = $current_time[0] ;
// $month = $current_time[1]; 
echo "$date";
// echo "$month";

if($date == 1 )
{
    $discount_counter = 3; // 回復初始值(每個會員一個月有三次折扣，到每個月一號回復一次)
}

if($total_expense>0 && $total_expense<=1000) 
{ 
    // $userlevel = "普通會員";
    $discount = 1.0; 
}
else if ($total_expense>1000 && $total_expense<=2000 && $discount_counter > 0)
{
    // $userlevel = "高級會員";
    $discount = 0.95;
    $discount_counter = $discount_counter -1 ;

}   
else if ($total_expense>2000 && $total_expense<=4000 && $discount_counter > 0 )
{
    // $userlevel = "少爺會員";
    $discount = 0.9;
    $discount_counter = $discount_counter -1 ;
}
else if ($total_expense>4000 && $discount_counter > 0)
{
    // $userlevel = "大爺會員"; 
    $discount = 0.85;
    $discount_counter = $discount_counter -1 ;
}


if($total_expense>0 && $total_expense<=1000) 
{ 
    $userlevel = "普通會員";
}
else if ($total_expense>1000 && $total_expense<=2000)
{
    $userlevel = "高級會員";

}   
else if ($total_expense>2000 && $total_expense<=4000 )
{
    $userlevel = "少爺會員";
}
else if ($total_expense>4000)
{
    $userlevel = "大爺會員";
}

echo "$userlevel";
$discount_price=$totalcost*$discount;
$sql = "INSERT INTO  `orders` (`user_id`,`food_id1`,`food_id2`,`food_id3`,`food_id4`,`food_id5`,`total_cost`) 
                        VALUE ('$login_account','$food1_quantity','$food2_quantity','$food3_quantity','$food4_quantity','$food5_quantity', '$discount_price') ";
// 用mysqli_query方法執行(sql語法)將結果存在變數中
$result = mysqli_query($link,$sql);

// 如果有異動到資料庫數量(更新資料庫)
if (mysqli_affected_rows($link)>0) {
// 如果有一筆以上代表有更新
// mysqli_insert_id可以抓到第一筆的id
$new_id= mysqli_insert_id ($link);
// echo "new id {$new_id} </br>";
}
elseif(mysqli_affected_rows($link)==0) {
    // echo "no data insert</br>";
}
else {
    // echo "{$sql} sql query fail, error message:</br>" . mysqli_error($link);
}
// echo "$discount_price";


// $info_sql = "UPDATE  `users` SET `total_expense` = $total_expense WHERE `email`= `$login_account` ";
$info_sql = "UPDATE  `users` SET `total_expense` = $total_expense WHERE `email`= `gabriel.cy221@gmail.com` ";


$result = mysqli_query($link,$info_sql);

// 如果有異動到資料庫數量(更新資料庫)
if (mysqli_affected_rows($link)>0) {
// 如果有一筆以上代表有更新
// mysqli_insert_id可以抓到第一筆的id
$new_id= mysqli_insert_id ($link);
// echo "new id {$new_id} </br>";
}
elseif(mysqli_affected_rows($link)==0) {
    echo "$";
}
else {
    // echo "{$info_sql} sql query fail, error message:</br>" . mysqli_error($link);
}
echo "，感謝您使用本系統訂購，已經開始準備出餐<br>";

//












$mail = new PHPMailer(true);
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->Host = "smtp.gmail.com";
$mail->Port = 465;  //SSL
$mail->CharSet="UTF-8";
$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
$mail->Username = "gabriel.cy221@gmail.com";
$mail->Password = "qdpfslwcvrgdckjs";
$mail->From="gabriel.cy221@gmail.com";
$mail->FromName="輔大學餐系統管理者";
$mail->Subject ="輔大學餐系統餐點訂購成功通知";
$mail->Body = $username."以下是您的訂單: <br/>".$food1_message.$food2_message.$food3_message.$food4_message.$food5_message." </br>感謝您使用本系統!</br></br>本次總金額為" .$totalcost."元。</br>您的累計總消費金額為:" .$total_expense. "</br>您的會員等級目前為:".$userlevel."</br>折扣後的金額為:" .$discount_price."元。" ; //郵件內容
$mail->IsHTML(true);
$mail->AddAddress("gabriel.cy221@gmail.com");    

if (!$mail->send()) 
{

    // echo "Mailer Error: " . $mail->ErrorInfo;

}else 
{
    // echo "Message sent!";
}

?>

<?php mysqli_close($link); ?>