<?php
// Koneksi ke database
$host = "localhost";
$user = "root";
$password = "";
$dbname = "administrasi";

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Postingan</title>
    <style>
        /* Tombol Buat Akun */
        .btn-create-account {
            background-color: #28a745;
            /* Warna hijau */
            color: white;
            padding: 8px 16px;
            border-radius: 4px;
            font-size: 14px;
            font-weight: bold;
            text-decoration: none;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-create-account:hover {
            background-color: #218838;
            /* Hijau lebih gelap saat hover */
        }

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
            font-size: 24px;
        }

        .search-box {
            margin-bottom: 20px;
            text-align: right;
        }

        .search-box input {
            padding: 8px;
            width: 250px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .data-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: white;
        }

        .data-table th,
        .data-table td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .data-table th {
            background-color: #4CAF50;
            color: white;
            font-weight: 500;
        }

        .data-table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .data-table tr:hover {
            background-color: #f5f5f5;
        }

        .konten-cell {
            max-width: 400px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .btn {
            padding: 6px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            text-decoration: none;
        }

        .btn-view {
            background-color: #007bff;
            color: white;
        }

        .btn-edit {
            background-color: #ffc107;
            color: #000;
        }

        .btn-delete {
            background-color: #dc3545;
            color: white;
        }

        .btn:hover {
            opacity: 0.8;
        }

        .action-buttons {
            display: flex;
            gap: 5px;
        }

        .pagination {
            margin-top: 20px;
            text-align: center;
        }

        .pagination a {
            color: #333;
            padding: 8px 16px;
            text-decoration: none;
            border: 1px solid #ddd;
            margin: 0 4px;
        }

        .pagination a.active {
            background-color: #4CAF50;
            color: white;
            border: 1px solid #4CAF50;
        }

        .pagination a:hover:not(.active) {
            background-color: #ddd;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Data Postingan</h2>

        <div class="search-box">
            <input type="text" id="searchInput" placeholder="Cari postingan..." onkeyup="searchTable()">
        </div>

        <table class="data-table" id="postingTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Tanggal</th>
                    <th>Konten</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <div class="action-buttons" style="margin-bottom: 20px; text-align: right;">
                    <a href="input.php" class="btn btn-create-account">Buat Akun</a>
                </div>

                <?php

                $limit = 10;
                $page = isset($_GET['page']) ? $_GET['page'] : 1;
                $start = ($page - 1) * $limit;


                $total_query = "SELECT COUNT(*) as total FROM posting";
                $total_result = $conn->query($total_query);
                $total_data = $total_result->fetch_assoc()['total'];
                $total_pages = ceil($total_data / $limit);

                $query = "SELECT * FROM posting ORDER BY id DESC LIMIT $start, $limit";
                $result = $conn->query($query);
                $no = $start + 1;

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $no++ . "</td>";
                        echo "<td>" . htmlspecialchars($row['judul']) . "</td>";
                        echo "<td>" . date('d-m-Y', strtotime($row['tanggal'])) . "</td>";
                        echo "<td class='konten-cell'>" . htmlspecialchars(strip_tags($row['konten'])) . "</td>";
                        echo "<td class='action-buttons'>
                                <a href='view_post.php?id=" . $row['id'] . "' class='btn btn-view'>View</a>
                                <a href='edit_post.php?id=" . $row['id'] . "' class='btn btn-edit'>Edit</a>
                                <a href='delete_post.php?id=" . $row['id'] . "' class='btn btn-delete' onclick='return confirm(\"Apakah Anda yakin ingin menghapus postingan ini?\")'>Delete</a>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5' style='text-align: center;'>Tidak ada data</td></tr>";
                }
                ?>
            </tbody>
        </table>

        <!-- Pagination -->
        <div class="pagination">
            <?php
            for ($i = 1; $i <= $total_pages; $i++) {
                $active = $i == $page ? "active" : "";
                echo "<a href='?page=$i' class='$active'>$i</a>";
            }
            ?>
        </div>
    </div>

    <script>
        function searchTable() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("searchInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("postingTable");
            tr = table.getElementsByTagName("tr");

            for (i = 1; i < tr.length; i++) {
                let found = false;
                // Loop through all table columns except the last one (action buttons)
                for (let j = 1; j < tr[i].getElementsByTagName("td").length - 1; j++) {
                    td = tr[i].getElementsByTagName("td")[j];
                    if (td) {
                        txtValue = td.textContent || td.innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            found = true;
                            break;
                        }
                    }
                }
                tr[i].style.display = found ? "" : "none";
            }
        }
    </script>
</body>

</html>

<?php
$conn->close();
?>