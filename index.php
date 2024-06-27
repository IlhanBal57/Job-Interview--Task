<!DOCTYPE html>
<html>
<head>
    <title>Öğrenci Ekleme</title>
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
        form {
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 5px;
            background-color: #00785D;
            width: 400px; /* Formun genişliğini belirlemek */
            margin-top: 20px; /* Formun üst tarafına boşluk eklemek */
        }
        form label, form input, form select {
            display: block;
            margin-bottom: 10px;
            width: 100%;
        }
        form input[type="text"], form input[type="number"], form select {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        form input[type="submit"] {
            padding: 10px 15px;
            background-color: #FDC323;
            color: black;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 10px; /* Submit butonunu formun altına itmek için */
        }
        form input[type="submit"]:hover {
            background-color: yellow;
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
    <h1>Yeni Öğrenci Ekle</h1>
    <form action="add_student.php" method="post">
        <label for="id">Öğrenci ID:</label>
        <input type="number" name="id" required>
        
        <label for="name">Öğrenci Adı:</label>
        <input type="text" name="name" required>
        
        <label for="classId">Sınıf:</label>
        <select name="classId" required>
            <?php
            include 'db.php';
            $sql = "SELECT Id, ClassName FROM Class";
            $stmt = sqlsrv_query($conn, $sql);
            if ($stmt === false) {
                die(print_r(sqlsrv_errors(), true));
            }
            while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
                echo "<option value='" . $row['Id'] . "'>" . $row['ClassName'] . "</option>";
            }
            sqlsrv_free_stmt($stmt);
            sqlsrv_close($conn);
            ?>
        </select>
        
        <input type="submit" value="Submit"></a>
    </form>
</body>
</html>
