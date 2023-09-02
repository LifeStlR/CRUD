<?php
// Panggil koneksi database
require_once "connection.php";

if (isset($_POST['simpan'])) {

    $id = mysqli_real_escape_string($connection, $_POST['subject_code']);
    $nama = mysqli_real_escape_string($connection, $_POST['subject_name']);
    $alamat = mysqli_real_escape_string($connection, $_POST['credit']);

	
    $query = mysqli_query($connection, "INSERT INTO subject(subject_code,subject_name,credit) VALUES('$id', '$nama', '$alamat')");

	// console.log($query);
	if ($query) {
		// jika berhasil tampilkan pesan berhasil insert data
		header('location: index.php?alert=2');
	} else {
		// jika gagal tampilkan pesan kesalahan
		header('location: index.php?alert=1');
	}	
}

if (isset($_POST['edit'])) {
	if (isset($_POST['subject_code'])) {
		$subject_code = mysqli_real_escape_string($connection, $_POST['subject_code']);
		$subject_name = mysqli_real_escape_string($connection, $_POST['subject_name']);
		$credit = mysqli_real_escape_string($connection, $_POST['credit']);

        
		$query1 = mysqli_query($connection, "UPDATE subject SET  subject_name='$subject_name',credit='$credit' WHERE subject_code='$subject_code'");		
		// console.log($query1);
		// var_dump($query1);
		// cek query
		if ($query1) {
			// jika berhasil tampilkan pesan berhasil update data
			header('location: index.php?alert=3');
		} else {
			// jika gagal tampilkan pesan kesalahan
			header('location: index.php?alert=1');
		}	
	}
}	
?>

<?php

// require_once "connection.php";

				
?>