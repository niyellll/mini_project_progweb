<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "linkedon";

$conn = new mysqli($servername,$username,$password,$dbname);

$current = $conn->query("select * from current_client");
$curRow = $current->fetch_assoc();
$curEmail = $curRow["_email"];

$result = $conn->query("select * from client where _email = '$curEmail'");
$row = $result->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    echo $row["_namadepan"] . $row["_namabelakang"];
    ?>

<table>
    <tr>
        <td>
            <fieldset>
                <table>
                    <tr>
                            <legend align="center"> Ceritanya profil</legend>
                            <td>
                                <img src="<?php echo $row["_pictpath"];?>" alt="" width="250px">
                            </td>
                        </tr>
                    </table>
                </fieldset>
        </td>
    </tr>
</table>
    <p><a href="login_page.php">Logout</a></p>
</body>
</html>