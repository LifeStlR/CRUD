<?php
// Panggil koneksi database
require_once "connection.php";

if (isset($_POST['simpan'])) {

    $std_id = mysqli_real_escape_string($connection, $_POST['std_id']);
    $name = mysqli_real_escape_string($connection, $_POST['name']);
    $address = mysqli_real_escape_string($connection, $_POST['address']);
	
    $query = mysqli_query($connection, "INSERT INTO student(std_id,name,address) VALUES('$std_id', '$name', '$address')");

	if ($query) {
		// jika berhasil tampilkan pesan berhasil insert data
		header('location: index.php?alert=2');
	} else {
		// jika gagal tampilkan pesan kesalahan
		header('location: index.php?alert=1');
	}	
}					
?>

<?php

// require_once "connection.php";

if (isset($_POST['edit'])) {
	if (isset($_POST['std_id'])) {
		$std_id           = mysqli_real_escape_string($connection, trim($_POST['std_id']));
		$name          = mysqli_real_escape_string($connection, trim($_POST['name']));
		$address  = mysqli_real_escape_string($connection, trim($_POST['address']));

        
		$query = mysqli_query($connection, "UPDATE student SET  name='$name',address='$address' WHERE std_id='$std_id'");		

		// cek query
		if ($query) {
			// jika berhasil tampilkan pesan berhasil update data
			header('location: index.php?alert=3');
		} else {
			// jika gagal tampilkan pesan kesalahan
			header('location: index.php?alert=1');
		}	
	}
}					
?>
