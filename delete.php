<?php
require "connect.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  // Ambil nilai id di dalam input tipe hidden
  $id = $_POST["id"];

  $sql = "DELETE FROM notes WHERE id = $id";
  $result = mysqli_query($koneksi, $sql);

  if ($result) {
    header("Location: index.php");
  }
  mysqli_close($koneksi);
}
?>