<!DOCTYPE html>
<html>
<head>
<style>
  body {background-image: url("pizzaBackground.JPG");
      background-size: 100%;
      background-attachment: fixed;
      background-repeat: no-repeat;
      font-family: Arial, Helvetica, sans-serif;}
      table.redTable {
  border: 2px solid #A40808;
  background-color: #EEE7DB;
  width: 100%;
  text-align: center;
  border-collapse: collapse;
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

#orderSummary {text-align: center;
  background-color: #f0c911;
      color:#c92200;
    width: 400px;
    border-radius: 6px;
    margin-left: auto;
    margin-right: auto;}

    #submitButtonOrder {box-shadow:inset 0px 1px 0px 0px #f9eca0;
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
</style>
</head>
</html>

<?php
error_reporting (E_ALL ^ E_NOTICE); 
  
$fName = $_POST["firstName"];
$lName = $_POST["lastName"];
$address = $_POST["address"];
$crust = $_POST["crust"];
$size = $_POST["size"];
$cheese = $_POST["cheese"];
$topping = $_POST["topping"];
$sauce = $_POST["sauce"];
$amount = $_POST["numberPizza"];

if(isset($crust) && isset($cheese) && isset($topping) && isset($sauce) && ($fName != null) && ($lName != null) && ($address!= null) && isset($size) && isset($amount))
{
  
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
    $maxTime = 0;
    while($row = mysqli_fetch_assoc($result)) {
      $dateReady = $row["date_ready"];
      if($row["total_time_minutes"] > $maxTime)
      {
        $maxTime = $row["total_time_minutes"];
      }
    }
    if($dateReady != NULL)
      $maxTime = 0;
    $maxTime = (int)$maxTime;
    $maxTime = (int)$maxTime + $amount * 10;
  if($size == "Small")
    $cost = 8;
  else if($size == "Medium")
    $cost = 10;
  else  
    $cost = 12;
  
  if($crust == "Thick")
    $cost *= 1.25;
  else if($crust == "Stuffed")
    $cost *= 1.5;
  
  $cost += (count((array)$cheese) * .75);
  $cost += (count((array)$topping));

  $cost = round($amount * $cost, 2);

  $result = "SELECT * FROM js_orders";
  $result = mysqli_query($dbc, $sql) or die("Bad Creation");
  $cheeseString = implode("-",$cheese);
  $toppingString = implode("-",$topping);

    $sql = "INSERT INTO js_orders(first_name, last_name, street_address, pizza_size, pizza_crust, pizza_cheeses, pizza_toppings, pizza_sauce, total_pizza, total_cost,total_time_minutes, date_ordered)
   VALUES ('$fName', '$lName', '$address', '$size', '$crust', '$cheeseString', '$toppingString', '$sauce', '$amount', $cost, '$maxTime', NOW())";

$result = mysqli_query($dbc, $sql) or die("Bad Creation");

$sql = "SELECT * FROM js_orders";
$result = mysqli_query($dbc, $sql) or die("Bad Creation");
  mysqli_close($dbc);
  ?>
  <html>
  <div id = "orderSummary">
    <h2>Order Summary for <?php echo ($fName . " " . $lName);?></h2>
    <h3>Address: <?php echo $address;?></h3>
    <h3>Total Cost: <?php echo "$" . $cost;?></h3>
    <h3>Wait Time: <?php echo $maxTime;?> minutes</h3>
    <h3>Total Pizzas: <?php echo $amount;?></h3>
    <h5>Size: <?php echo $size;?></h5>
    <h5>Crust: <?php echo $crust;?></h5>
    <h5>Cheeses: <?php echo $cheeseString;?></h5>
    <h5>Toppings: <?php echo $toppingString;?></h5>
  </div>
</html>
<?php
  echo "<button onclick=\"javascript:history.go(-1)\" style = 'position: absolute;top: 500px;left: 700px;'>GO BACK</button>";

}else{
  echo "All fields must be entered. Please press the back button.";
  echo "<button onclick=\"javascript:history.go(-1)\">GO BACK</button>";
}
?>