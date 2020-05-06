<!DOCTYPE html>
<html>
<head>
<style>
  body {background-image: url("pizzaBackground.JPG");
      background-size: 100%;
      background-repeat: no-repeat;
      background-attachment: fixed;
      font-family: Arial, Helvetica, sans-serif;}
      table.redTable {
      border: 2px solid #A40808;
      background-color: #EEE7DB;
      width: 100%;
      text-align: center;
      border-collapse: collapse;
}
.reportButton {
	box-shadow:inset 0px 1px 0px 0px #ffffff;
	background:linear-gradient(to bottom, #f9f9f9 5%, #e9e9e9 100%);
	background-color:#f9f9f9;
	border-radius:6px;
	border:1px solid #dcdcdc;
	display:inline-block;
	cursor:pointer;
	color:#666666;
	font-family:Arial;
	font-size:15px;
	font-weight:bold;
	padding:6px 24px;
	text-decoration:none;
	text-shadow:0px 1px 0px #ffffff;
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
  .editButton {
	box-shadow:inset 0px 1px 0px 0px #f5978e;
	background:linear-gradient(to bottom, #f24537 5%, #c62d1f 100%);
	background-color:#f24537;
	border-radius:6px;
	border:1px solid #d02718;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:Arial;
	font-size:15px;
	font-weight:bold;
	padding:6px 24px;
	text-decoration:none;
	text-shadow:0px 1px 0px #810e05;
}

</style>
</head>
</html>

<?php
//Testing GitHub 2
session_start();
error_reporting (E_ALL ^ E_NOTICE); 
  $dbc=mysqli_connect("www.math-cs.ucmo.edu","cs4130_sp2020","tempPWD!","cs4130_sp2020") or die("Cannot Connect");
  $sql = "CREATE TABLE IF NOT EXISTS js_orders (
    order_num INT UNSIGNED NOT NULL AUTO_INCREMENT,
    first_name VARCHAR(20) NOT NULL,
    last_name VARCHAR(40) NOT NULL,
    street_address VARCHAR(60) NOT NULL,
    pizza_size VARCHAR(10) NOT NULL,
    pizza_crust VARCHAR(10) NOT NULL,
    pizza_cheeses VARCHAR(500) NOT NULL,
    pizza_toppings VARCHAR(1000) NOT NULL,
    pizza_sauce VARCHAR(20) NOT NULL,
    total_pizza VARCHAR(101) NOT NULL,
    total_cost DECIMAL(38,2),
    total_time_minutes VARCHAR(10) NOT NULL,
    date_ordered VARCHAR(50),
    date_ready VARCHAR(50),
    date_delivered VARCHAR(50),
    PRIMARY KEY (order_num)
    )";
    $result = mysqli_query($dbc, $sql) or die("Bad Creation");

    $sql = "SELECT * FROM js_orders";
    $result = mysqli_query($dbc, $sql) or die("Bad Creation");
    if (mysqli_num_rows($result) > 0) {
      $sql = "SELECT * FROM js_orders";
      $result = mysqli_query($dbc, $sql) or die("Bad Creation");
      ?>
      
      <!DOCTYPE html>
      <html>
      <form method = "POST" action = "updateOrder.php">
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
      <?php
      while($row = mysqli_fetch_assoc($result)) {
        $ready =  "ready" . $row["order_num"];
        $delivered =  "delivered" . $row["order_num"];

      ?>
      <tr>
        <td><?php echo $row["order_num"];?></td>
        <td><?php echo $row["first_name"];?></td>
        <td><?php echo $row["last_name"];?></td>
        <td><?php echo $row["street_address"];?></td>
        <td><?php echo $row["pizza_size"];?></td>
        <td><?php echo $row["pizza_crust"];?></td>
        <td><?php echo $row["pizza_cheeses"];?></td>
        <td><?php echo $row["pizza_toppings"];?></td>
        <td><?php echo $row["pizza_sauce"];?></td>
        <td><?php echo $row["total_pizza"];?></td>
        <td><?php echo "$" . $row["total_cost"];?></td>
        <td><?php echo $row["total_time_minutes"];?></td>
        <td><?php echo $row["date_ordered"];?></td>
        <td><?php echo ($row["date_ready"] != NULL ? $row["date_ready"] : "<input type = 'checkbox' name = 'ready[]' value = '$ready'>");?></td>
        <td><?php echo ($row["date_delivered"] != NULL ? $row["date_delivered"] : "<input type = 'checkbox' name = 'delivered[]' value = '$delivered'>");?></td>
      </tr>
       
      <?php } ?>
      </table>
      <p style = 'text-align: center;'>* Check Checkbox if ready or delivered</p>
      <input type = "submit" class = 'submitButton'><br>
      <br>
      </form>
      </html>
      <?php
      //Testing GitHub 3
    }else{
      echo "No Pizzas Ordered";
    }
      mysqli_close($dbc);
      echo "<button onclick=\"window.location = 'pizzaShop.php'\">GO BACK</button><br><br>";
      if($_SESSION["aType"] =="manager")
      {
        echo"<form action = 'manager.php'><input type = 'submit' value = 'Edit Order' class = 'editButton'></form><br>";
        echo"<form action = 'buisnessSummary.php'><input type = 'submit' value = 'Buisness Report' class = 'reportButton'></form><br><br><br>";
      }
      





?>
