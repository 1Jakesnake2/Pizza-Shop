<!DOCTYPE html>
<head>
<style>
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
</style>
</head>
<html>
<h1>ORDER TO EDIT</h1>
<div id = "editForm">
<form method = "POST" action = "updateManagerOrder.php">
<label>Enter order number: <input type = "text" name = "orderNum"></label>
<input type = "submit" value = "Submit" class = "submitButton"><br>
</form><br>
<button onclick="window.location = 'viewOrders.php'">GO BACK</button>

</div>
</html>