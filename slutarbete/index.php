
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    
    
</head>
<body>
    <form onsubmit="return false">
        <label for="city">City</label>
        <input type="text" id="city" name="city">
        <input type="submit" onclick="userInput()" style="height: 0px; width: 0px; border: none; padding: 0px;" hidefocus="true">
    </form>

    <h1 class="display-3">Temperature:<span id="temp"></span>°C</h1>
    <h1 class="display-3">Minimum temperature:<span id="tempmin"></span>°C</h1>
    <h1 class="display-3">Maximum temperature:<span id="tempmax"></span>°C</h1>
    <h1 class="display-3">Wind:<span id="wind"></span>km/h</h1>
    <h1 class="display-3">Humidity:<span id="humidity"></span>%</h1>

    <img id="icon" src="" alt="weathericon">

  

    <script>
          function userInput()
        {
        var input = document.getElementById("city").value;
    
        $.get("https://api.openweathermap.org/data/2.5/weather?q="+input+"&appid=0ab824d44e60a5d6831bbb48e58f67bc&units=metric", function(data){
         
         let temp = Math.floor(data.main.temp);
         let tempmin = Math.floor(data.main.temp_min);
         let tempmax = Math.floor(data.main.temp_max);
         let humidity = Math.floor(data.main.humidity);
         let wind = Math.floor(data.wind.speed);
         let icon = "http://openweathermap.org/img/wn/"+data.weather[0].icon+".png";
         $('#temp').html(temp);
         $('#tempmin').html(tempmin);
         $('#tempmax').html(tempmax);
         $('#humidity').html(humidity);
         $('#wind').html(wind);
         $('#icon').attr("src", icon);
         
 
       });
        }
    
    </script>
<script>
    <?php
    ob_start();
   if (isset($_POST['login'])){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "slutprojekt";
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    if (isset($_POST['username'])) {
        $username = ($_REQUEST['username']);
        $password = ($_REQUEST['password']);
        // Check user is exist in the database
        $query    = "SELECT * FROM `userdata` WHERE username='$username'
                     AND password= '($password) . '";
        $result = mysqli_query($con, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['username'] = $username;
            header("Location: loginpage.php");
        } else {
            echo "<div class='form'>
                  <h3>Incorrect Username/password.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                  </div>";
        }       }

    }
    ;
?>
</script>


  <div>
<form action="#" method="post">
 
  <div class="container">
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="uname2" >

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw2" >

    <button type="submit" value="Login"" name="login">Login</button>

  </div>
    </div>


    <div>
<form action="#" method="post">
 
  <div class="container">
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="uname" >

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" >

    <button type="submit" name="submit">Register</button>

  </div>
    </div>

  
</form> 

   <script>
       var form_username = null, form_password = null;
    <?php
        // error_reporting(0);
        // sql to create table
        // $sql_create_table = "CREATE TABLE userdata (
        //     username VARCHAR(30) NOT NULL PRIMARY KEY,
        //     password VARCHAR(200) NOT NULL
        // )";
        // mysqli_query($conn, $sql_create_table);

        

        if (isset($_POST['submit'])){
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "slutprojekt";
            
            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $form_username = $_POST['uname'];
            $form_password = $_POST['psw'];


            $register_user = "INSERT INTO `userdata` 
                (`username`, `password`)
                VALUES
                ('$form_username', '$form_password')
            ;";
            mysqli_query($conn, $register_user);

            setcookie("username", $form_username);
            setcookie("password", $form_password);

            echo "var form_username = '$form_username', form_password = '$form_password';";
        }
    ?>
if (form_username != null){
document.write("Välkommen " + form_username);
}
   </script>
   

 
</body>
</html>