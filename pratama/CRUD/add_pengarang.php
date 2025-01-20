<html>
<head>
    <title>Add Pengarang</title>
</head>

<?php
    include_once("connect.php");
    $penerbit = mysqli_query($mysqli, "SELECT * FROM penerbit");
    $pengarang = mysqli_query($mysqli, "SELECT * FROM pengarang");
    $katalog = mysqli_query($mysqli, "SELECT * FROM katalog");
?>


<body>
    <a href="index.php">Go to Home</a>
    <br/><br/>
 
    <form action="add_pengarang.php" method="post" name="form1">
        <table width="25%" border="0">
            <tr> 
                <td>Id Pengarang</td>
                <td><input type="text" name="id_pengarang"></td>
            </tr>
            <tr> 
                <td>Nama Pengarang</td>
                <td><input type="text" name="nama_pengarang" required></td>
            </tr>
            <tr> 
                <td>Email</td>
                <td><input type="email" name="email" required></td>
            </tr>
            <tr> 
                <td>Telp</td>
                <td><input type="text" name="telp" required></td>
            </tr>
            <tr> 
                <td>Alamat</td>
                <td><textarea name="alamat" rows="4" required></textarea></td>
            </tr>
            <tr> 
                <td></td>
                <td><input type="submit" name="Submit" value="Add"></td>
            </tr>
        </table>
    </form>
    
    <?php
     
        // Check If form submitted, insert form data into users table.
        if(isset($_POST['Submit'])) {
            $id_pengarang = $_POST['id_pengarang'];
            $nama_pengarang = $_POST['nama_pengarang'];
            $email = $_POST['email'];
            $telp = $_POST['telp'];
            $alamat = $_POST['alamat'];

            
            include_once("connect.php");

            $result = mysqli_query($mysqli, "INSERT INTO `pengarang` (`id_pengarang`, `nama_pengarang`, `email`, `telp`, `alamat`) VALUES ('$id_pengarang', '$nama_pengarang', '$email', '$telp', '$alamat');");
            
            header("Location:pengarang.php");
        }
    ?>


</body>
</html>

