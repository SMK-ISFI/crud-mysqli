<?php
require "connect.php";

$id = $_GET["id"];

$sql = "SELECT * FROM notes WHERE id = $id";
$result = mysqli_query($koneksi, $sql);
$item = mysqli_fetch_assoc($result);
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
    <h2 class="text-2xl font-bold mb-3">Ubah Catatan</h2>
    <form action="" method="POST" class="space-y-4">
      <div>
        <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Judul Catatan</label>
        <input type="text" name="title" value="<?php echo $item['title'] ?>" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
      </div>
      <div>
        <label for="body" class="block text-sm font-medium text-gray-700 mb-1">Isi Catatan</label>
        <textarea name="body" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"><?php echo $item["body"] ?></textarea>
      </div>
      <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition">Simpan</button>
    </form>
  </div>
</body>
</html>
<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  // mengambil semua nilai di input
  $title = $_POST["title"];
  $body = $_POST["body"];

  // lakukan proses update ke database
  $sql = "UPDATE notes SET title = '$title', body = '$body' WHERE id = $id";
  $result = mysqli_query($koneksi, $sql);
  // jika proses update berhasil pindahkan ke index.php
  if ($result) {
    header("Location: index.php");
  }

  mysqli_close($koneksi);
}
?>