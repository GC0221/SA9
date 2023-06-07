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
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="css/style.css">

    <title>Login #3</title>
  </head>
  <body>
  

  <div class="half">
    <div class="bg order-1 order-md-2" style="background-image: url('images/bg_1.jpg');"></div>
    <div class="contents order-2 order-md-1">

      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-6">
            <div class="form-block">
              <div class="text-center mb-5">
              <h3>菜單 <strong></strong></h3>
              <!-- <p class="mb-4">Lorem ipsum dolor sit amet elit. Sapiente sit aut eos consectetur adipisicing.</p> -->
              </div>
    
    
    <form id="form1" name="form1" method="post" action="confirm.php">
    <fieldset>
    <legend>仁園品項:</legend>
    <input type="checkbox" name="food_id1" id="food_id1" value="滷肉飯(小)">  
    <label for="food_id1">滷肉飯(小): 30 NTD，數量</label>
    <input id="food1_quantity" name="food1_quantity" type="number" min="1" max="20" size="1"/></br>
    <input type="checkbox" name="food_id2" id="food_id2" value="餛飩麵(小)">
    <label for="food_id2">餛飩麵(小): 50 NTD，數量</label> 
    <input id="food2_quantity" name="food2_quantity" type="number" min="1" max="20" size="1"/><br>
    <input type="checkbox" name="food_id3" id="food_id3" value="滷肉飯(大)">
    <label for="food_id3">滷肉飯(大): 70 NTD，數量</label> 
    <input id="food3_quantity" name="food3_quantity" type="number" min="1" max="20" size="1"/><br>
    <input type="checkbox" name="food_id4" id="food_id4" value="咖哩飯">
    <label for="food_id4">咖哩飯: 80 NTD，數量</label> 
    <input id="food4_quantity" name="food4_quantity" type="number" min="1" max="20" size="1"/><br>
    <input type="checkbox" name="food_id5" id="food_id5" value="排骨飯">
    <label for="food_id5">排骨飯: 100 NTD，數量</label> 
    <input id="food5_quantity" name="food5_quantity" type="number" min="1" max="20" size="1"/><br>
    <input id="submit" name="submit" type="submit" value="送出"/>



    <legend>聖園品項:</legend>
    <input type="checkbox" name="food_id6" id="food_id6" value="滷肉飯(小)">
    <label for="food_id6">雞肉飯: 90 NTD，數量</label> 
    <input type="checkbox" name="food_id7" id="food_id7" value="滷肉飯(小)">
    <label for="food_id7">咖哩飯: 90 NTD，數量</label> 
    <input type="checkbox" name="food_id8" id="food_id8" value="滷肉飯(小)">
    <label for="food_id8">唐揚雞咖哩飯: 120 NTD，數量</label> 
    <input type="checkbox" name="food_id9" id="food_id9" value="滷肉飯(小)">
    <label for="food_id9">雞胸咖哩飯: 90 NTD，數量</label> 
    <input type="checkbox" name="food_id10" id="food_id10" value="滷肉飯(小)">
    <label for="food_id10">炸馬鈴薯: 30 NTD，數量</label>
    <input id="submit" name="submit" type="submit" value="送出"/>
    </fieldset>
    </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    
  </div>
    
    

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>