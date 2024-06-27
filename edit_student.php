<!DOCTYPE html>
<html>
<head>
    <title>Öğrenci Düzenle</title>
</head>
<body>
    <nav>
        <a href="index.php">Ana Sayfa</a>
        <a href="students.php">Öğrenci Listesi</a>
    </nav>
    <?php
    include 'db.php';
    $id = $_GET['id'];
    $sql = "SELECT * FROM Student WHERE Id = ?";
    $params = array($id);
    $stmt = sqlsrv_query($conn, $sql, $params);
    $student = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
    ?>
    <h1>Öğrenci Düzenle</h1>
    <form action="update_student.php" method="post">
        <input type="hidden" name="id" value="<?php echo $student['Id']; ?>">
        <label for="name">Öğrenci Adı:</label>
        <input type="text" name="name" value="<?php echo $student['Name']; ?>" required><br>
        <label for="classId">Sınıf:</label>
        <select name="classId" required>
            <?php
            $sql = "SELECT Id, ClassName FROM Class";
            $stmtClasses = sqlsrv_query($conn, $sql);
            while ($row = sqlsrv_fetch_array($stmtClasses, SQLSRV_FETCH_ASSOC)) {
                $selected = ($row['Id'] == $student['ClassId']) ? 'selected' : '';
                echo "<option value='" . $row['Id'] . "' $selected>" . $row['ClassName'] . "</option>";
            }
            sqlsrv_free_stmt($stmtClasses);
            ?>
        </select><br>
        <input type="submit" value="Güncelle">
    </form>
</body>
</html>
