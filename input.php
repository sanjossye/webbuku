<?php

$host = "localhost";
$user = "root";
$password = "";
$dbname = "administrasi";

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if (isset($_POST['judul'], $_POST['tanggal'], $_POST['konten'])) {
    $judul = $_POST['judul'];
    $tanggal = $_POST['tanggal'];
    $konten = $_POST['konten'];

    $sql = "INSERT INTO posting (judul, tanggal, konten) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $judul, $tanggal, $konten);

    if ($stmt->execute()) {
        $success_message = "Data berhasil disimpan!";
    } else {
        $error_message = "Error: " . $stmt->error;
    }

    $stmt->close();
} else {
    $info_message = "Silakan isi semua data!";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Postingan</title>
    <!-- CKEditor -->
    <script src="https://cdn.ckeditor.com/4.20.2/standard/ckeditor.js"></script>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f5f5f5;
        }

        .container {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #333;
            text-align: center;
            margin-bottom: 30px;
        }

        form {
            margin-bottom: 30px;
        }

        label {
            font-weight: bold;
            color: #555;
        }

        input[type="text"],
        input[type="date"] {
            width: 100%;
            padding: 8px;
            margin: 8px 0;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #45a049;
        }

        .message {
            padding: 10px;
            margin: 10px 0;
            border-radius: 4px;
        }

        .success {
            background-color: #dff0d8;
            color: #3c763d;
            border: 1px solid #d6e9c6;
        }

        .error {
            background-color: #f2dede;
            color: #a94442;
            border: 1px solid #ebccd1;
        }

        .data-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .data-table th,
        .data-table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .data-table th {
            background-color: #f8f8f8;
            font-weight: bold;
            color: #333;
        }

        .data-table tr:hover {
            background-color: #f5f5f5;
        }

        .konten-cell {
            max-width: 300px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Form Input Postingan</h2>

        <?php if (isset($success_message)): ?>
            <div class="message success"><?php echo $success_message; ?></div>
        <?php endif; ?>

        <?php if (isset($error_message)): ?>
            <div class="message error"><?php echo $error_message; ?></div>
        <?php endif; ?>

        <form action="" method="POST">
            <label for="judul">Judul:</label><br>
            <input type="text" id="judul" name="judul" required><br><br>

            <label for="tanggal">Tanggal:</label><br>
            <input type="date" id="tanggal" name="tanggal" required><br><br>

            <label for="konten">Konten:</label><br>
            <textarea id="konten" name="konten"></textarea><br><br>

            <button type="submit">Simpan</button>
            <a href="admin.php">
                <button type="button">Ke Admin Pages</button>
            </a>


            <script>
               
                CKEDITOR.replace('konten');
            </script>
</body>

</html>

<?php
$conn->close();
?>