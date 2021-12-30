<?php
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
include 'koneksi.php';

// menangkap data yang dikirim dari form login
$user = $_POST['username'];
$pass = md5($_POST['password']);

// berfungsi menyeleksi data user dengan username dan password yang sesuai
$sql = mysqli_query($con, "SELECT * FROM pengguna WHERE username='$user' AND password='$pass'");
//berfungsi menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($sql);

// cek apakah username dan password di temukan pada database
if ($cek > 0) {

	$data = mysqli_fetch_assoc($sql);

	// cek jika user login sebagai admin
	if ($data['level_akses'] == "Administrator") {
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['level_akses'] = "Administrator";
		// alihkan ke halaman dashboard admin
		header("location:admin.php");

		// cek jika user login sebagai pegawai
	} else if ($data['level_akses'] == "KP") {
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['level_akses'] = "KP";
		// alihkan ke halaman dashboard kepala sekolah
		header("location:kp.php");

		// cek jika user login sebagai pengurus
	} else if ($data['level_akses'] == "Staf") {
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['level_akses'] = "Staf";
		// alihkan ke halaman dashboard staf
		header("location:staf.php");
	} else {
		header("location:loginpage.php?pesan=gagal");
	}
} else {
	header("location:loginpage.php?pesan=gagal");
}