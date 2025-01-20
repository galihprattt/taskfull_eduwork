<html>
<head>
	<title>Edit Pengarang</title>
</head>

<?php
	include_once("connect.php");
	$isbn = $_GET['isbn'];

	$buku = mysqli_query($mysqli, "SELECT * FROM buku WHERE isbn='$isbn'");
    $penerbit = mysqli_query($mysqli, "SELECT * FROM penerbit");
    $pengarang = mysqli_query($mysqli, "SELECT * FROM pengarang");
    $katalog = mysqli_query($mysqli, "SELECT * FROM katalog");

    while($edit_pengarang_data = mysqli_fetch_array($edit_pengarang))
    {
    	$id_pengarang = $edit_pengarang['id_pengarang'];
    	$nama_pengarang = $edit_pengarang['nama_pengarang'];
    	$email = $edit_pengarang['email'];
    	$telp = $edit_pengarang['telp'];
    	$alamat = $edit_pengarang['alamat'];

    }
?>

 
<body>
	<a href="index.php">Go to Home</a>
	<br/><br/>
 
	<form action="edit_pengarang.php?isbn=<?php echo $isbn; ?>" method="post">
		<table width="25%" border="0">

			<tr> 
				<td>Pengarang</td>
				<td>
					<select name="id_pengarang">
						<?php 
						    while($pengarang_data = mysqli_fetch_array($pengarang)) {         
						    	echo "<option ".($pengarang_data['id_pengarang'] == $id_pengarang ? 'selected' : '')." value='".$pengarang_data['id_pengarang']."'>".$pengarang_data['nama_pengarang']."</option>";
						    }
						?>
					</select>
				</td>
			</tr>
						<tr> 
				<td>email</td>
				<td style="font-size: 11pt;"><?php echo $email; ?> </td>
			</tr>
			<tr> 
				<td>telp</td>
				<td><input type="text" name="judul" value="<?php echo $telp; ?>"></td>
			</tr>
			<tr> 
				<td>alamat</td>
				<td><input type="text" name="tahun" value="<?php echo $alamat; ?>"></td>
			</tr>

				<td></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
	
	<?php
	 
		// Check If form submitted, insert form data into users table.
		if(isset($_POST['update'])) {

			$id_pengarang = $_POST['id_pengarang'];
            $nama_pengarang = $_POST['nama_pengarang'];
            $email = $_POST['email'];
            $telp = $_POST['telp'];
            $alamat = $_POST['alamat'];

			
			include_once("connect.php");

			$result = mysqli_query($mysqli, "UPDATE buku SET judul = '$judul', tahun = '$tahun', id_penerbit = '$id_penerbit', id_pengarang = '$id_pengarang', id_katalog = '$id_katalog', qty_stok = '$qty_stok', harga_pinjam = '$harga_pinjam' WHERE isbn = '$isbn';");
			
			header("Location:index.php");
		}
	?>
</body>
</html>