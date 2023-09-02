<?php
// Panggil koneksi database
require_once "connection.php";

if (isset($_POST['simpan'])) {

    $id = mysqli_real_escape_string($connection, $_POST['id_grade']);
	$std_id = mysqli_real_escape_string($connection, $_POST['std_id']);
    $subject = mysqli_real_escape_string($connection, $_POST['subject_code']);
	$mid = mysqli_real_escape_string($connection, $_POST['mid']);
	$final = mysqli_real_escape_string($connection, $_POST['final']);

	
    $query = mysqli_query($connection, "INSERT INTO grade(id_grade,std_id,subject_code,mid,final) VALUES('$id', '$std_id', '$subject', '$mid', '$final')");

	// console.log($query);
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
	if (isset($_POST['id_grade'])) {
		$id1 = mysqli_real_escape_string($connection, $_POST['id_grade']);
		$std_id1 = mysqli_real_escape_string($connection, $_POST['std_id']);
		$subject1 = mysqli_real_escape_string($connection, $_POST['subject_code']);
		$mid1 = mysqli_real_escape_string($connection, $_POST['mid']);
		$final1 = mysqli_real_escape_string($connection, $_POST['final']);

        
		$query = mysqli_query($connection, "UPDATE grade SET  std_id='$std_id1', subject_code='$subject1' ,mid='$mid1',final='$final1' WHERE id_grade='$id1'");	
	
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


