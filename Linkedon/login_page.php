<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "linkedon";

$conn = new mysqli($servername,$username,$password,$dbname);
$conn->query("truncate table current_client");
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $email = $_POST["email"];
    $password = $_POST["password"];
    
    $check = $conn->query("select * from client where _email = '$email' and _password = '$password'");
    if ($check->num_rows > 0){
        $conn->query("insert into current_client values('$email')");
        header("Location: main_page.php");
        exit();
    }

}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>
        <img src="decoration/Linkedon logo.png" alt="Logo" width="150px">
    </header>
    <hr>

    <table align="center">
        <tr>
            <td>
                
                <form action="" method="post">
                <fieldset>
                    <legend align="center"><b>Login Page</b></legend>
                    
                        <table align="center">
                            <tr>
                                <td><label for="email"></label>Email:</td>
                                <td><input type="email" name="email" id="email"></td>
                            </tr>
                            
                            <tr>
                                <td><label for="pw"></label>Password:</td>
                                <td><input type="password" name="password" id="pw"></td>
                            </tr>
                            
                            <tr>
                                <td>
                                <button type="submit">Login</button>
                            </td>
                        </tr>
                        
                        <tr>
                            <td colspan="2">
                                <p>Don't have an account yet? <a href="register_page.php">Register here</a></p>
                            </td>
                            <td>
                                
                                </td>
                            </tr>
                            
                        </table>
                    </fieldset>
                </form>
                </td>    
            </tr>    
        </table>    
        
</body>
</html>