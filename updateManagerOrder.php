<!DOCTYPE html>
<html>
<style>
  button{	box-shadow:inset 0px 1px 0px 0px #f9eca0;
      background:linear-gradient(to bottom, #f0c911 5%, #f2ab1e 100%);
      background-color:#f0c911;
      border-radius:6px;
      border:1px solid #e65f44;
      display:inline-block;
      cursor:pointer;
      color:#c92200;
      font-family:Arial;
      font-size:15px;
      font-weight:bold;
      padding:6px 24px;
      text-decoration:none;
      text-shadow:0px 1px 0px #ded17c;
      }
  .submitButton {box-shadow:inset 0px 1px 0px 0px #f9eca0;
      background:linear-gradient(to bottom, #89c403 5%, #77a809 100%);
      background-color:#89c403;
      border-radius:6px;
      border:1px solid #74b807;
      display:inline-block;
      cursor:pointer;
      color:#ffffff;
      font-family:Arial;
      font-size:15px;
      font-weight:bold;
      padding:6px 24px;
      text-decoration:none;
      text-shadow:0px 1px 0px #528009;}
  body{background-image: url("pizzaBackground.JPG");
      background-attachment: fixed;
      background-size: 100%;
      background-repeat: no-repeat;
      font-family: Arial, Helvetica, sans-serif;}
  a{	box-shadow:inset 0px 1px 0px 0px #f9eca0;
      background:linear-gradient(to bottom, #f0c911 5%, #f2ab1e 100%);
      background-color:#f0c911;
      border-radius:6px;
      border:1px solid #e65f44;
      display:inline-block;
      cursor:pointer;
      color:#c92200;
      font-family:Arial;
      font-size:15px;
      font-weight:bold;
      padding:6px 24px;
      text-decoration:none;
      text-shadow:0px 1px 0px #ded17c;}
table.redTable td, table.redTable th {
  border: 1px solid #AAAAAA;
  padding: 3px 2px;
}
table.redTable tbody td {
  font-size: 13px;
}
table.redTable tr:nth-child(even) {
  background: #F5C8BF;
}
table.redTable thead {
  background: #A40808;
}
table.redTable thead th {
  font-size: 19px;
  font-weight: bold;
  color: #FFFFFF;
  text-align: center;
  border-left: 2px solid #A40808;
}
table.redTable thead th:first-child {
  border-left: none;
}

table.redTable tfoot .links {
  text-align: right;
}
table.redTable tfoot .links a{
  display: inline-block;
  background: #FFFFFF;
  color: #A40808;
  padding: 2px 8px;
  border-radius: 5px;
}
</style>
</html>

<?php
if(isset( $_POST["orderNum"]))
{
  $orderNum = intval($_POST["orderNum"]);
}else{
  echo "You must enter order number.";
  echo "<button onclick=\"javascript:history.go(-1)\">GO BACK</button>";
}

$dbc=mysqli_connect("www.math-cs.ucmo.edu","cs4130_sp2020","tempPWD!","cs4130_sp2020") or die("Cannot Connect");
$query = "SELECT * FROM js_orders WHERE order_num = ?";
$stmt = mysqli_prepare($dbc, $query);
mysqli_stmt_bind_param($stmt, 'i', $orderNum);
mysqli_stmt_bind_result($stmt,$order, $fname, $lname, $address, $size, $crust, $cheese, $topping, $sauce, $tPizza, $cost, $wait, $dateO, $dateR, $dateD);
mysqli_stmt_execute($stmt);

if(mysqli_stmt_fetch($stmt)){
?>
<html>
<form action = "updateManagerOrderResult.php" method = "post">
<table class = "redTable">
      <tr>
          <th>Order Number</th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Address</th>
          <th>Pizza Size</th>
          <th>Pizza Crust</th>
          <th>Cheeses</th>
          <th>Toppings</th>
          <th>Sauce</th>
          <th>Total Pizza</th>
          <th>Total Cost</th>
          <th>Estimated Wait Time</th>
          <th>Date Ordered</th>
          <th>Date Ready</th>
          <th>Date Delivered</th>
      </tr>
      <tr>
        <td><?php echo $order;?></td>
        <td><?php echo $fname;?></td>
        <td><?php echo $lname;?></td>
        <td><?php echo $address;?></td>
        <td><?php echo $size;?></td>
        <td><?php echo $crust;?></td>
        <td><?php echo $cheese;?></td>
        <td><?php echo $topping;?></td>
        <td><?php echo $sauce;?></td>
        <td><?php echo $tPizza;?></td>
        <td><?php echo "$" . $cost;?></td>
        <td><?php echo $wait;?></td>
        <td><?php echo $dateO;?></td>
        <td><?php echo $dateR;?></td>
        <td><?php echo $dateD;?></td>
      </tr>

      <tr>
        <td>*</td>
        <td><input type = "checkbox" name = "toEdit[]" value = "fname"></td>
        <td><input type = "checkbox" name = "toEdit[]" value = "lname"></td>
        <td><input type = "checkbox" name = "toEdit[]" value = "address"></td>
        <td>*</td>
        <td>*</td>
        <td>*</td>
        <td>*</td>
        <td>*</td>
        <td>*</td>
        <td>*</td>
        <td>*</td>
        <td><input type = "checkbox" name = "toEdit[]" value = "dateO"></td>
        <td><input type = "checkbox" name = "toEdit[]" value = "dateR"></td>
        <td><input type = "checkbox" name = "toEdit[]" value = "dateD"></td>
      </tr>
</table>
<br>
<label>Check this to delete order<input type = "checkbox" name = "delete" value = "delete";?></label><br>
<br>
<input type = "hidden" name = "orderNumb" value = <?php echo($orderNum);?>>
<input type = "submit" class = "submitButton" value = "Submit">
<a href="viewOrders.php">BACK</a><br>
</form><br>
<p> * Select what you would like to change</p>
<p> * Only names, addresses, and dates can be updated at this time.</p>
<br>

</html>
<?php
}
else{
    echo("Order does not exist please try again.<br><br>");
    echo "<button onclick=\"javascript:history.go(-1)\">GO BACK</button>";
}
?>