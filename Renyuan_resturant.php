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
$sql = "SELECT * FROM menu WHERE resturant_name = '仁園'";

$result = mysqli_query($link,$sql);

?>
<div class="container">

<table class="table table-sm table-bordered"style="text-align:center;">
    <thead style="text-align:center;">
        <tr style="text-align:center;">
            <th>餐廳名稱 </th>
            <th>餐點名稱</th>
            <th>餐點價位</th>
            <th>供應狀態</th>
            <!-- <th>餐點圖片 </th> -->


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
								<td><?php echo $row['resturant_name']; ?></td> 
								<td><?php echo $row['food_name']; ?></td>
                                <td><?php echo $row['price']; ?></td>
								<td><?php echo $row['active']; ?></td>
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