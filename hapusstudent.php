<?php
// Panggil koneksi database
require_once "connection.php";

if (isset($_GET['id'])) {

	$std_id = $_GET['id'];
	
	// perintah query untuk menghapus data pada tabel is_siswa
	$query = mysqli_query($connection, "DELETE FROM student WHERE std_id='$std_id'");
	$query = mysqli_query($connection, "DELETE FROM grade WHERE id_grade='$std_id'");


	// cek hasil query
	if ($query) {
		// jika berhasil tampilkan pesan berhasil delete data
		header('location: index.php?alert=4');
	} else {
		// jika gagal tampilkan pesan kesalahan
		header('location: index.php?alert=1');
	}	
}							
?>