<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "linkedon";

$conn = new mysqli($servername,$username,$password,$dbname);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["image"])) {
    $email = $_POST["Email"];
    $password = $_POST["password"];
    $namdep = $_POST["namaDepan"];
    $nambel = $_POST["namaBelakang"];
    $tanggalLahir = $_POST["tanggalLahir"];
    $alamat = $_POST["alamat"];
    
    
    $target_dir = "images/";
    // Get file extension
    $file_extension = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
    // Generate a unique filename using timestamp
    $new_filename = time() . "." . $file_extension;
    $target_file = $target_dir . $new_filename; // pict path
    
    $check = $conn->query("SELECT * FROM client WHERE _email = '$email'");
    if ($check->num_rows > 0){
        echo "email already registered in database";
    }
    else{
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            echo "File uploaded successfully";
        } else {
            echo "Error uploading file.";
        }
        $conn->query("INSERT INTO client VALUES('$email','$password','$namdep','$nambel','$tanggalLahir','$alamat','$target_file')");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Image</title>
</head>
<body>
    <header>
        <img src="decoration/Linkedon logo.png" alt="Logo" width="150px">
    </header>
    <hr>
    
    <table align="center">
        <tr>
            <td>
                
                <form action="register_page.php" method="post" enctype="multipart/form-data">
                    <fieldset>
                        <legend align="center"><b>Register Page</b></legend>
                        <table>
                            <!-- email -->
                             <tr>
                                <td>
                                    <label for="email">Email:</label>
                                </td>
                                <td><input type="email" name="Email" id="email" required></td>
                             </tr>

                            <!-- password -->
                            <tr>
                                <td><label for="pass">Password:</label></td>
                                <td><input type="password" name="password" id="pass" required></td>
                            </tr>

                            <!-- nama Depan -->
                            <tr>
                                <td><label for="namaDpn">Nama Depan:</label></td>
                                <td><input type="text" name="namaDepan" id="namaDpn" maxlength="50" required></td>
                            </tr>
                            
                            <!-- nama Belakang -->
                            <tr>
                                <td><label for="namaBlkng">Nama Belakang:</label></td>
                                <td><input type="text" name="namaBelakang" id="namaBlkng" maxlength="50" required></td>
                            </tr>
                            
                            <!-- tanggal lahir -->
                            <tr>
                            <td><label for="tgllahir">Tanggal Lahir:</label></td>
                            <td><input type="date" name="tanggalLahir" id="tgllahir" required></td>
                        </tr>
                
                        <!-- alamat -->
                        <tr>
                            <td><label for="almt">Alamat:</label></td>
                            <td><input type="text" name="alamat" id="almt" required></td>
                        </tr>
                        
                        <!-- foto -->
                        <tr>
                            <td>
                                <label for="foto">Foto diri anda:</label>
                            </td>
                            <td>
                                <input type="file" name="image" id="foto" required>
                            </td>
                        </tr>

                        
                        
                        <!-- button -->
                        <tr>
                            <td>
                                <button type="reset">Reset</button>
                                <button type="submit">Submit</button>
                                
                            </td>
                        </tr>

                        <!-- Login page -->
                        <tr>
                            <td>
                                <p>Already have an account?<a href="login_page.php"> login here</a></p>
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
