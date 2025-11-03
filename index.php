<?php
// Masukkan koneksi
require "connect.php";

/**
 * Lakukan proses query mengambil data dari
 * table notes
 */
$sql = "SELECT * FROM notes";
$hasil = mysqli_query($koneksi, $sql); 
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
    <h1 class="text-2xl font-bold mb-3">Aplikasi Catatan</h1>
    <a href="create.php" class="py-1 px-2 bg-blue-400 rounded text-white hover:bg-blue-600 transition">Tambah Catatan Baru</a>
    <?php while ($item = mysqli_fetch_assoc($hasil)): ?>
    <div class="w-full border-1 rounded px-2 py-3 my-2 shadow">
      <h3 class="text-xl font-medium"><a href="detail.php?id=<?php echo $item['id'] ?>"><?php echo $item["title"] ?></a></h3>
      <p class="text-xs"><?php echo $item["createdAt"] ?></p>
      <p class="text-base"><?php echo $item["body"] ?></p>
    </div>
    <?php endwhile; ?>

  </div>
</body>
</html>