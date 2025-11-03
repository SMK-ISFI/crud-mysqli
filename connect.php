<?php
$koneksi = mysqli_connect("localhost", "root", "", "notes_app_khaidir");

if (!$koneksi) {
  echo "Koneksi gagal: " . mysqli_connect_error();
}
?>