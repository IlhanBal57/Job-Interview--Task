<!DOCTYPE html>
<html>
<head>
    <title>Öğrenci Listesi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }
        nav {
            margin-bottom: 20px;
            background-color : #FDC323;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 7%;
            margin: 2rem 7%;
            border-radius: 30rem;
    
        }
        .logo img {
            height: 6rem;
        }
        
        nav a {
            text-decoration: none; /* Navbar öğelerinin altı çizili olmaması için */
            margin: 0 1rem;  /* Navbar öğeleri arasına boşluk eklemek */
            font-size: 1.6rem; color: black;
            border-bottom: 0.1rem solid transparent;
        }
        table {
            border-collapse: collapse;
            width: 80%;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ccc;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #00785D;
        }
        .actions {
            display: flex;
            gap: 10px;
        }
        .btn {
            padding: 5px 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .btn-edit {
            background-color: #ffc107;
            color: white;
        }
        .btn-edit:hover {
            background-color: #e0a800;
        }
        .btn-delete {
            background-color: #dc3545;
            color: white;
        }
        .btn-delete:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <nav>
    <a href="#" class="logo">
            <img src="logom.png" alt="">
        </a>
        <a href="index.php">Ana Sayfa</a> | 
        <a href="students.php">Öğrenci Listesi</a>
    </nav>
    <h1>Öğrenci Listesi</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Öğrenci Adı</th>
                <th>Sınıf</th>
                <th>İşlemler</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include 'db.php';
            $sql = "SELECT Student.Id, Student.Name, Class.ClassName FROM Student JOIN Class ON Student.ClassId = Class.Id";
            $stmt = sqlsrv_query($conn, $sql);
            if ($stmt === false) {
                echo "<tr><td colspan='4'>Veritabanı hatası: " . print_r(sqlsrv_errors(), true) . "</td></tr>";
            } else {
                while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
                    echo "<tr>";
                    echo "<td>" . $row['Id'] . "</td>";
                    echo "<td>" . $row['Name'] . "</td>";
                    echo "<td>" . $row['ClassName'] . "</td>";
                    echo "<td class='actions'>
                            <a href='edit_student.php?id=" . $row['Id'] . "' class='btn btn-edit'>Düzenle</a>
                            <a href='delete_student.php?id=" . $row['Id'] . "' class='btn btn-delete' onclick='return confirm(\"Bu öğrenciyi silmek istediğinize emin misiniz?\")'>Sil</a>
                          </td>";
                    echo "</tr>";
                }
            }
            sqlsrv_free_stmt($stmt);
            sqlsrv_close($conn);
            ?>
        </tbody>
    </table>
</body>
</html>

