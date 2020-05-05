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
      }
</style>
</head>
</html>
<?php
  error_reporting (E_ALL ^ E_NOTICE); 
  $dbc=mysqli_connect("www.math-cs.ucmo.edu","cs4130_sp2020","tempPWD!","cs4130_sp2020") or die("Cannot Connect");
  $sql = "SELECT * FROM js_orders";
  $result = mysqli_query($dbc, $sql) or die("Bad Creation");

  function totalSales()
  {
    $dbc=mysqli_connect("www.math-cs.ucmo.edu","cs4130_sp2020","tempPWD!","cs4130_sp2020") or die("Cannot Connect");
    $sql = "SELECT COUNT(order_num) FROM js_orders";
    $result = mysqli_query($dbc, $sql) or die("Bad Creation");
    $row = mysqli_fetch_assoc($result);
    echo "<b>Total Orders:</b> " . $row['COUNT(order_num)'] . "<br>"; 
    mysqli_close($dbc);
  }

  function saleDistribution()
  {
    $totalIncome = 0; $totalPizza = 0;
    $tSmall = 0; $tMedium = 0; $tLarge = 0;
    $tThin = 0; $tThick = 0; $tStuffed = 0;
    $tRicotta = 0; $tMozzarella = 0; $tProvolone = 0; $tCheddar = 0; $tParmesan = 0; 
    $tSausage = 0; $tPepperoni = 0; $tBacon = 0; $tChicken = 0; $tBeef = 0; $tMushroom = 0; $tOnion = 0; $tOlive = 0; $tSpinach = 0; $tPineapple = 0; 


    $dbc=mysqli_connect("www.math-cs.ucmo.edu","cs4130_sp2020","tempPWD!","cs4130_sp2020") or die("Cannot Connect");
    $sql = "SELECT * FROM js_orders";
    $result = mysqli_query($dbc, $sql) or die("Bad Creation");
    while($row = mysqli_fetch_assoc($result)) 
    {
      $size = $row["pizza_size"];
      $crust = $row["pizza_crust"];
      $cheeses = $row["pizza_cheeses"];
      $toppings = $row["pizza_toppings"];
      $totalIncome += floatval($row["total_cost"]);
      $totalPizza  += $row["total_pizza"];

      switch($size){
        case "small":
          $tSmall += $row["total_pizza"];
          break;
        case "medium":
          $tMedium += $row["total_pizza"];
          break;
        case "large":
          $tLarge += $row["total_pizza"];
          break;
        default:
          echo "Error";
          break;
      }
      switch($crust){
        case "thin":
          $tThin += $row["total_pizza"];
          break;
        case "thick":
          $tThick += $row["total_pizza"];
          break;
        case "stuffed":
          $tStuffed += $row["total_pizza"];
          break;
        default:
          echo "Error";
          break;
    }

    $toppingArray = explode('-', $toppings);
    $cheeseArray = explode('-', $cheeses);


    if(in_array('ricotta', $cheeseArray)) $tRicotta += $row["total_pizza"];
    if(in_array('mozzarella', $cheeseArray)) $tMozzarella += $row["total_pizza"];
    if(in_array('provolone', $cheeseArray)) $tProvolone += $row["total_pizza"];
    if(in_array('cheddar', $cheeseArray)) $tCheddar += $row["total_pizza"];
    if(in_array('parmesan', $cheeseArray)) $tParmesan += $row["total_pizza"];

    if(in_array('sausage', $toppingArray)) $tSausage += $row["total_pizza"];
    if(in_array('pepperoni', $toppingArray)) $tPepperoni += $row["total_pizza"];
    if(in_array('bacon', $toppingArray)) $tBacon += $row["total_pizza"];
    if(in_array('chicken', $toppingArray)) $tChicken += $row["total_pizza"];
    if(in_array('beef', $toppingArray)) $tBeef += $row["total_pizza"];
    if(in_array('mushroom', $toppingArray)) $tMushroom += $row["total_pizza"];
    if(in_array('onion', $toppingArray)) $tOnion += $row["total_pizza"];
    if(in_array('olive', $toppingArray)) $tOlive += $row["total_pizza"];
    if(in_array('spinach', $toppingArray)) $tSpinach += $row["total_pizza"];
    if(in_array('pineapple', $toppingArray)) $tPineapple += $row["total_pizza"];
  }
    echo("<b>Total Income:</b> $" . $totalIncome. "<br>");
    echo("<b>Total Pizza:</b> " . $totalPizza. "<br>");
    echo "<br><b>SIZE TOTALS</b><br>";
    echo "Small: " . $tSmall . "<br>"; 
    echo "Medium: " . $tMedium . "<br>"; 
    echo "Large: " . $tLarge . "<br>"; 

    echo "<br><b>CRUST TOTALS</b><br>";
    echo "Thin: " . $tThin . "<br>"; 
    echo "Thick: " . $tThick . "<br>"; 
    echo "Stuffed: " . $tStuffed . "<br>"; 

    echo "<br><b>CHEESE TOTALS</b><br>";
    echo "Ricotta: " . $tRicotta . "<br>"; 
    echo "Mozzarella: " . $tMozzarella . "<br>"; 
    echo "Provolone: " . $tProvolone . "<br>"; 
    echo "Cheddar: " . $tCheddar . "<br>"; 
    echo "Parmesan: " . $tParmesan . "<br>"; 

    echo "<br><b>TOPPING TOTALS</b><br>";
    echo "Sausage: " . $tSausage . "<br>"; 
    echo "Pepperoni: " . $tPepperoni . "<br>"; 
    echo "Bacon: " . $tBacon . "<br>"; 
    echo "Chicken: " . $tChicken . "<br>"; 
    echo "Beef: " . $tBeef . "<br>";
    echo "Mushroom: " . $tMushroom . "<br>"; 
    echo "Onion: " . $tOnion . "<br>"; 
    echo "Olive: " . $tOlive . "<br>";
    echo "Spinach: " . $tSpinach . "<br>"; 
    echo "Pineapple: " . $tPineapple . "<br>"; 
    

    mysqli_close($dbc);
  }

  function orderDistribution()
  {

  }

  function avgOrderLength()
  {

  }
  echo("<h1>Pizza Shop Report</h1>");
  totalSales();
  saleDistribution();
  mysqli_close($dbc);
  echo "<br><br><button onclick=\"window.location = 'viewOrders.php'\">GO BACK</button>";
?>