<!DOCTYPE html>
<html>
<head>
<style>
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
      text-shadow:0px 1px 0px #ded17c;
      }
</style>
</head>
</html>
<?php
if(isset($_POST["aFirstName"]) || isset($_POST["aLastName"]) || isset($_POST["aAddress"]) || isset($_POST["aReady"]) || isset($_POST["aOrdered"]) || isset($_POST["aDelivered"]))
{ 
  $dbc=mysqli_connect("www.math-cs.ucmo.edu","cs4130_sp2020","tempPWD!","cs4130_sp2020") or die("Cannot Connect");
  if(isset($_POST["aFirstName"]))
  {
    $query = "UPDATE js_orders SET first_name = ? WHERE order_num = ?";
    $stmt = mysqli_prepare($dbc, $query);
    mysqli_stmt_bind_param($stmt, 'si', $_POST["aFirstName"], intval($_POST["orderNumber"]));
    mysqli_stmt_execute($stmt);
  }
  if(isset($_POST["aLastName"]))
  {
    $query = "UPDATE js_orders SET last_name = ? WHERE order_num = ?";
    $stmt = mysqli_prepare($dbc, $query);
    mysqli_stmt_bind_param($stmt, 'si', $_POST["aLastName"], intval($_POST["orderNumber"]));
    mysqli_stmt_execute($stmt);
  }
  if(isset($_POST["aAddress"]))
  {
    $query = "UPDATE js_orders SET street_address = ? WHERE order_num = ?";
    $stmt = mysqli_prepare($dbc, $query);
    mysqli_stmt_bind_param($stmt, 'si', $_POST["aAddress"], intval($_POST["orderNumber"]));
    mysqli_stmt_execute($stmt);
  }
  if(isset($_POST["aOrdered"]))
  {
    $query = "UPDATE js_orders SET date_ordered = ? WHERE order_num = ?";
    $stmt = mysqli_prepare($dbc, $query);
    mysqli_stmt_bind_param($stmt, 'si', $_POST["aOrdered"], intval($_POST["orderNumber"]));
    mysqli_stmt_execute($stmt);
  }
  if(isset($_POST["aReady"]))
  {
    $query = "UPDATE js_orders SET date_ready = ? WHERE order_num = ?";
    $stmt = mysqli_prepare($dbc, $query);
    mysqli_stmt_bind_param($stmt, 'si', $_POST["aReady"], intval($_POST["orderNumber"]));
    mysqli_stmt_execute($stmt);
  }
  if(isset($_POST["aDelivered"]))
  {
    $query = "UPDATE js_orders SET date_delivered = ? WHERE order_num = ?";
    $stmt = mysqli_prepare($dbc, $query);
    mysqli_stmt_bind_param($stmt, 'si', $_POST["aDelivered"], intval($_POST["orderNumber"]));
    mysqli_stmt_execute($stmt);
  }
  echo "Order " . $_POST["orderNumber"] . " Updated.<br>";
  echo("<a href='viewOrders.php'>BACK</a>");
}else{
if(isset($_POST["delete"]))
{
  $dbc=mysqli_connect("www.math-cs.ucmo.edu","cs4130_sp2020","tempPWD!","cs4130_sp2020") or die("Cannot Connect");
  $query = "DELETE FROM js_orders WHERE order_num = ?";
  $stmt = mysqli_prepare($dbc, $query);
  mysqli_stmt_bind_param($stmt, 'i', intval($_POST["orderNumb"]));
  mysqli_stmt_execute($stmt);
  echo "Order " . $_POST["orderNumb"] . " Deleted.<br>";
  echo("<a href='viewOrders.php'>BACK</a>");
}else{
if(isset($_POST["toEdit"]))
{
$num = $_POST['orderNumb'];
$editArray = $_POST["toEdit"];
echo("<form action = 'updateManagerOrderResult.php' method = 'POST'>");
if(in_array("fname", $editArray))
{
  echo("First Name <input type = 'text' name = 'aFirstName'><br><br>");
}
if(in_array("lname", $editArray))
{
  echo("Last Name <input type = 'text' name = 'aLastName'><br><br>");
}
if(in_array("address", $editArray))
{
  echo("Address <input type = 'text' name = 'aAddress'><br><br>");
}
if(in_array("size", $editArray))
{
  
}
if(in_array("crust", $editArray))
{
  
}
if(in_array("cheese", $editArray))
{
  
}
if(in_array("topping", $editArray))
{
  
}
if(in_array("sauce", $editArray))
{
  
}
if(in_array("tPizza", $editArray))
{
  
}
if(in_array("cost", $editArray))
{
  
}
if(in_array("wait", $editArray))
{
  
}
if(in_array("dateO", $editArray))
{
  echo("Date Ordered <input type = 'text' name = 'aOrdered'><br><br>");

}
if(in_array("dateR", $editArray))
{
  echo("Date Ready <input type = 'text' name = 'aReady'><br><br>");

}
if(in_array("dateD", $editArray))
{
  echo("Date Delivered <input type = 'text' name = 'aDelivered'><br><br>");

}
echo("<input type = 'hidden' name = 'orderNumber' value = $num;>
");
echo("<input type = 'submit' class = 'submitButton'>");
echo("</form><br>");
echo "<button onclick=\"javascript:history.go(-1)\">GO BACK</button>";
}else{
  echo("Check a checkbox or go back to main screen.");
  echo "<button onclick=\"javascript:history.go(-1)\">GO BACK</button>";
}
}
}
?>