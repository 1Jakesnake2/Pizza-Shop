<!DOCTYPE html>
<html>
<head>
<style>
body{background-image: url("pizzaBackground.JPG");
background-size: 100%;
background-attachment: fixed;
background-repeat: no-repeat;
font-family: Arial, Helvetica, sans-serif;}
button{	
      box-shadow:inset 0px 1px 0px 0px #f9eca0;
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
      position: absolute;
      top: 500px;
      left: 700px;
      }
</style>
</head>
</html>

<?php
if (isset($_POST['ready'])) {
  $readyArray = $_POST["ready"];
} else {
	$readyArray= 0;
}
if (isset($_POST['delivered'])) {
  $deliveredArray = $_POST["delivered"];

} else {
	$deliveredArray= 0;
}
  $dbc=mysqli_connect("www.math-cs.ucmo.edu","cs4130_sp2020","tempPWD!","cs4130_sp2020") or die("Cannot Connect");
      $sql = "SELECT * FROM js_orders";
      $result = mysqli_query($dbc, $sql) or die("Bad Creation");
      echo("<h1>Orders Updated:</h1><br>");
      date_default_timezone_set('america/chicago');
       while($arow = mysqli_fetch_assoc($result)) {
       $orderNum = intval($arow["order_num"]);
       $ready =  "ready" . $arow["order_num"];
       $delivered =  "delivered" . $arow["order_num"];
       if($readyArray != NULL)
       {
       if(in_array($ready, $readyArray))
        {
          $sqlTwo = "UPDATE js_orders SET date_ready = NOW() WHERE order_num = $orderNum";
          mysqli_query($dbc, $sqlTwo);
          echo "<b>Order number:</b> " .$orderNum . " <b>Ready Date:</b> " .date("Y-m-d h:i:sa"). "<br>";
        }
      }
      if($deliveredArray != NULL)
       if(in_array($delivered, $deliveredArray))
       {
        $sqlTwo = "UPDATE js_orders SET date_delivered = NOW() WHERE order_num = $orderNum";
        mysqli_query($dbc, $sqlTwo);
        echo "<b>Order Number:</b> " .$orderNum . " <b>Delivery Date:</b> " . date("Y-m-d h:i:sa"). "<br>";
       }
      }
      
 mysqli_close($dbc);
 echo "<button onclick=\"window.location = 'viewOrders.php'\">GO BACK</button>";
?>