<?php
require "connect.php";
$id = $_GET["id"];
// echo $id;

$sql = "SELECT * FROM notes WHERE id = $id";
$hasil = mysqli_query($koneksi, $sql);
$item = mysqli_fetch_assoc($hasil);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Notes App</title>
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body>
  <div class="w-full px-6 mt-5">
    <h3 class="text-2xl font-semibold"><?php echo $item["title"] ?></h3>
    <p class="text-xs text-gray-500 mb-5"><?php echo $item["createdAt"] ?></p>
    <p class="text-lg"><?php echo $item["body"] ?></p>
  </div>
</body>
</html>