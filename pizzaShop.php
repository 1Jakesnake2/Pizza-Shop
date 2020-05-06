<!DOCTYPE html>
<html>
<head>
  <title>Pizza Workshop</title>
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
    .textBox {padding: 5px;
     font-size: 16px;
     border-width: 1px;
     border-color: #CCCCCC;
     background-color: #FFFFFF;
     color: #000000;
     border-style: solid;
     border-radius: 0px;
     box-shadow: 0px 0px 5px rgba(66,66,66,.75);
     text-shadow: 0px 0px 0px rgba(66,66,66,.75);
     margin: 5px;}
    #personalInfo {text-align: center;}
    #cheese {background-color: #f0c911;
      color:#c92200;
      width: 200px;
    border-radius: 6px;
    position: absolute;
    left: 500px;
    top: 400px}
    #toppings {background-color: #f0c911;
      color:#c92200;
    width: 200px;
    border-radius: 6px;
    position: absolute;
    right: 500px;
    top: 350px}
    #crust {background-color: #f0c911;
      color:#c92200;
    width: 200px;
    border-radius: 6px;
    position: absolute;
    right: 200px;
    top: 350px}
    #menuItems {background-color: #f0c911;
      color:#c92200;
    width: 380px;
    border-radius: 6px;
    position: absolute;
    margin-left: auto;
    margin-right: auto;
    left: 0;
    right: 0;}
    #size {background-color: #f0c911;
      color:#c92200;
    width: 200px;
    border-radius: 6px;
    position: absolute;
    left: 200px;
    top: 350px}
    #submitButton {
      position: absolute;
      top: 650px;
      left: 700px;}
    #sauce {background-color: #f0c911;
      color:#c92200;
    border-radius: 6px;
    width: 200px;
    position: absolute;
    right: 200px;
    top: 500px}
    .centered{margin-left:auto; 
    margin-right:auto;
    text-align: center;}
    #numPizza{background-color: #f0c911;
      color:#c92200;
    width: 175px;
    border-radius: 6px;
    position: absolute;
    left: 200px;
    top: 500px}
    .centered{margin-left:auto; 
    margin-right:auto;
    text-align: center;}
    b {font-size: 30px;}
    span {font-size: 10px;}

  </style>
</head>
<body>
<h1 class = 'centered'>Pizza Shop</h1>
<p id = "topRow"></p>
<p id = "bigPizza"></p>
<p id = "orderForm"></p>
<p id = "findUsScreen" class = 'centered'></p>
<p id = "menuScreen" class = 'centered'></p>
<p id = "viewOrders" class = 'centered'></p>
</body>
<script>
//Testing GitHub 1

function start()
{
  var aForm = document.getElementById("orderForm");
  aForm.style.display = "hidden";
  var row = document.getElementById("topRow");
  row.innerHTML = "<div class = 'border'><table class = 'centered' style = 'border: 2px outset #C92200; border-radius: 12px;'><tr><th><button onclick = 'findUs()'>Find Us!</button><th><th><button onclick = 'buyPizza()'>Buy Pizza</button></th><th><button onclick = 'menu()'>Menu</button></th><th><form action = 'login.php'><input type = 'submit' value = 'Employees' id = 'submitButtonOrder'></form></th></tr></table></div>";

}

function findUs()
{
  var aOrderForm = document.getElementById("orderForm");
  aOrderForm.style.display = "none";
  var aMenu = document.getElementById("menuScreen");
  aMenu.style.display = "none";
  var viewOrders = document.getElementById("viewOrders");
  viewOrders.style.display = "none";
  var findUs = document.getElementById("findUsScreen");
  findUs.style.display = "block";
  findUs.innerHTML = 
  '<h3>Address: 1234 Pizza Food Drive Warrensburg MO, 64093</h3>'+
  '<iframe style = "border: 2px outset #C92200; border-radius: 12px;"src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12444.980637304245!2d-93.74710380699932!3d38.7580806750747!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x87c3fd542d0fe265%3A0x614854617b5aa280!2sUniversity%20of%20Central%20Missouri!5e0!3m2!1sen!2sus!4v1587493841213!5m2!1sen!2sus" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe></br>'+
  '<button onclick = "goBack()">Go Back</button>';
}

function buyPizza()
{
  var aFindUs = document.getElementById("findUsScreen");
  aFindUs.style.display = "none";
  var aMenu = document.getElementById("menuScreen");
  aMenu.style.display = "none";
  var aForm = document.getElementById("orderForm");
  aForm.style.display = "block";



  aForm.innerHTML = 
  "<form action = 'orderPizza.php' method = 'POST'>"+
  "<div id = 'personalInfo'><label>First Name<input type = 'text' name = 'firstName' class = 'textBox'></label><label>Last Name<input type = 'text' name = 'lastName' class = 'textBox'></label>"+
  "<label></br>Address<input type = 'text' name = 'address' class = 'textBox'></label></div>"+
  "<div id = 'size'style = 'border: 2px outset #C92200; border-radius: 12px; text-align:center;'><b>Size:</b></br><label><input type = 'radio' name = 'size' value = 'small'>Small</br></label>"+
  "<label><input type = 'radio' name = 'size' value = 'medium'>Medium</br></label>"+
  "<label><input type = 'radio' name = 'size' value = 'large'>Large</br></label></div>"+
  "<div id = 'crust' style = 'border: 2px outset #C92200; border-radius: 12px; text-align:center;'><b>Crust:</b></br><label><input type = 'radio' name = 'crust' value = 'thin'>Thin</br></label>"+
  "<label><input type = 'radio' name = 'crust' value = 'thick' >Thick</br></label>"+
  "<label><input type = 'radio' name = 'crust' value = 'stuffed'>Stuffed</br></label></div>"+
  "<div id = 'cheese' style = 'border: 2px outset #C92200; border-radius: 12px; text-align:center;'><b>Cheese:</b></br><label><input type = 'checkbox' name = 'cheese[]' value = 'ricotta'>Ricotta</br></label>"+
  "<label><input type = 'checkbox' name = 'cheese[]' value = 'mozzarella'/>Mozzarella</br></label>"+
  "<label><input type = 'checkbox' name = 'cheese[]' value = 'provolone'/>Provolone</br></label>"+
  "<label><input type = 'checkbox' name = 'cheese[]' value = 'cheddar'/>Cheddar</br></label>"+
  "<label><input type = 'checkbox' name = 'cheese[]' value = 'parmesan'/>Parmesan</br></label></div>"+
  "<div id = 'toppings' style = 'border: 2px outset #C92200; border-radius: 12px; text-align:center;'><b>Toppings:</b></br><label><input type = 'checkbox' name = 'topping[]' value = 'sausage'>Sausage<br/></label>"+
  "<label><input type = 'checkbox' name = 'topping[]' value = 'pepperoni'>Pepperoni<br/></label>"+
  "<label><input type = 'checkbox' name = 'topping[]' value = 'bacon'>Bacon<br/></label>"+
  "<label><input type = 'checkbox' name = 'topping[]' value = 'chicken'>Chicken<br/></label>"+
  "<label><input type = 'checkbox' name = 'topping[]' value = 'beef'>Beef<br/></label>"+
  "<label><input type = 'checkbox' name = 'topping[]' value = 'mushroom'>Mushroom<br/></label>"+
  "<label><input type = 'checkbox' name = 'topping[]' value = 'onion'>Onion<br/></label>"+
  "<label><input type = 'checkbox' name = 'topping[]' value = 'olive'>Olive<br/></label>"+
  "<label><input type = 'checkbox' name = 'topping[]' value = 'spinach'>Spinach<br/></label>"+
  "<label><input type = 'checkbox' name = 'topping[]' value = 'pineapple'>Pineapple<br/></label></div>"+
  "<div id = 'sauce' style = 'border: 2px outset #C92200; border-radius: 12px; text-align:center;'><b>Sauce:</b></br><label><input type = 'radio' name = 'sauce' value = 'red'>Red</br></label>"+
  "<label><input type = 'radio' name = 'sauce' value = 'white'>White</br></label></div>"+
  "<div id = 'numPizza' style = 'border: 2px outset #C92200; border-radius: 12px; text-align:center;'><b>Number of Pizzas: </b><input type = 'number' name = 'numberPizza' value = '1' min = '1' max = '100'></div>"+
  "<div id = 'submitButton'><input type = 'submit' value = 'Submit Pizza' style = '	box-shadow:inset 0px 1px 0px 0px #a4e271;"+
	"background:linear-gradient(to bottom, #89c403 5%, #77a809 100%);"+
	"background-color:#89c403;"+
	"border-radius:6px;"+
	"border:1px solid #74b807;"+
	"display:inline-block;"+
	"cursor:pointer;"+
	"color:#ffffff;"+
	"font-family:Arial;"+
	"font-size:15px;"+
	"font-weight:bold;"+
	"padding:6px 24px;"+
	"text-decoration:none;"+
	"text-shadow:0px 1px 0px #528009;'>"+
  "</form></div>";
}


function goBack()
{
  var aForm = document.getElementById("orderForm");
  aForm.style.display = "none";
  var aFindUs = document.getElementById("findUsScreen");
  aFindUs.style.display = "none";
  var aMenu = document.getElementById("menuScreen");
  aMenu.style.display = "none";
  var viewOrders = document.getElementById("viewOrders");
  viewOrders.style.display = "none";
}

function menu()
{
  var viewOrders = document.getElementById("viewOrders");
  viewOrders.style.display = "none";
  var aOrderForm = document.getElementById("orderForm");
  aOrderForm.style.display = "none";
  var findUs = document.getElementById("findUsScreen");
  findUs.style.display = "none";
  var aMenu = document.getElementById("menuScreen");
  aMenu.style.display = "block";
  aMenu.innerHTML =
  "<div id = 'menuItems'><h1>It's as easy as 1..2..3</h1>"+
  "<h2>1. Select size and Crust.</h2>"+
  "<table class = 'centered'>"+
  "<tr><th style = 'text-decoration: underline overline;'>Size</th><th style = 'text-decoration: underline overline;'>Crust</th></tr><tr><td>Small <span>($8)</span></td><td>Thin <span>(Size Price)</span></td></tr><tr><td>Medium <span>($10)</span></td><td>Thick <span>(Size * 1.25)</span></td></tr><tr><td>Large <span>($12)</span></td><td>Stuffed <span>(Size * 1.50)</span></td></tr>"+
  "</table>"+
  "<h2>2. Pick your toppings <br/><span>($1 per topping and $.75 per cheese)</span></h2>"+
  "<table class = 'centered'>"+
  "<tr><th style = 'text-decoration: underline overline;'>Meat</th><th style = 'text-decoration: underline overline;'>Non-Meat</th><th style = 'text-decoration: underline overline;'>Cheese</th><th style = 'text-decoration: underline overline;'>Sauce</th></tr>"+
  "<tr><td>Sausage</td><td>Mushroom</td><td>Ricotta</td><td>Red<td></tr>"+
  "<tr><td>Pepperoni</td><td>Onion</td><td>Mozzarella</td><td>White<td></tr>"+
  "<tr><td>Bacon</td><td>Olive</td><td>Provolone</td></tr>"+
  "<tr><td>Beef</td><td>Spinach</td><td>Cheddar</td></tr>"+
  "<tr><td>Chicken</td><td>Pineapple</td><td>Parmesan</td></tr>"+
  "</table>"+
  "<h2>3. Order!</h2></div>"+
  "<button onclick = 'goBack()'>Go Back</button>"+
  "<button onclick = 'buyPizza()'>Order Pizza</button>";

}
document.addEventListener("load", start(), false);

</script>

</html>
