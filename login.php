<html>
<style>
body {background-image: url("pizzaBackground.JPG");
      background-size: 100%;
      background-repeat: no-repeat;
      background-attachment: fixed;
      font-family: Arial, Helvetica, sans-serif;}
</style>
<html>
<?php
session_start();
$dbc=mysqli_connect("www.math-cs.ucmo.edu","cs4130_sp2020","tempPWD!","cs4130_sp2020") or die("Cannot Connect");
$error ="";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(isset($_POST["id"]) && !empty($_POST["id"]))
        $id= mysqli_real_escape_string($dbc,$_POST["id"]);
    else
        $error.="id is required";
    if(isset($_POST["password"]) && !empty($_POST["password"]))
        $password= mysqli_real_escape_string($dbc,$_POST["password"]);
    else
        $error.=" password is required";

    if(isset($id) && isset($password) && !empty($id) && !empty($password)){
        $query = "select * from js_login where ID=? and password =sha1(?);";
        $stmt = mysqli_prepare($dbc, $query);
        mysqli_stmt_bind_param($stmt, 'is', intval($id),$password);
        mysqli_stmt_bind_result($stmt,$idNum,$name,$type, $pass);
        mysqli_stmt_execute($stmt);


        if(mysqli_stmt_fetch($stmt)){
            setcookie("aID",$idNum,time()+1800);
            setcookie("aType",$type,time()+100000);
            $_SESSION["aID"] = $idNum;
            $_SESSION["aType"] = $type;
            redirect_user("viewOrders.php");
        }
        else{
            $error.=" There is no match for your username and password";
        }
    }
}

function redirect_user ($page = 'pizzaShop.php') {

    $url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']);

    $url = rtrim($url, '/\\');

    $url .= '/' . $page;

    header("Location: $url");
    exit(); 
} 

mysqli_close($dbc);
?>
<div id = "loginPage" style = "  width: 120px;
  position: absolute;
  top:40%;
  left: 50%;
  margin-left: -60px;">
<form action="login.php" method="post">
    <label>ID</label><input type="text" name="id"><br>
    <label>Password</label><input type="password" name="password"><br><br>
    <input type="submit" value="Login"><br>
<?php echo $error; ?>
</div>
<div style = "text-align:center;">
<p>*Manager ID: 1 <br>Password: manager</p>
<p>*Employee ID: 2 <br>Password: employee</p>
</div>
</form>
