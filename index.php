<?php 
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}
include __DIR__ . '/config.php'; 
?>

<!DOCTYPE html>
<html>
<head>
    <title>Blue Whale Student System</title>

    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(180deg, #001f3f, #003366, #005f99);
            color: #e0f7ff;
            margin: 0;
            padding: 20px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .container {
            max-width: 950px;
            margin: auto;
        }

        .card {
            background: rgba(0, 30, 60, 0.6);
            backdrop-filter: blur(12px);
            padding: 25px;
            border-radius: 18px;
            box-shadow: 0 0 30px rgba(0, 200, 255, 0.2);
        }

        .form-row {
            display: flex;
            align-items: center;
            gap: 10px;
            flex-wrap: wrap;
        }

        input {
            padding: 12px;
            border-radius: 10px;
            border: none;
            outline: none;
            background: #e6f7ff;
            flex: 1;
            min-width: 150px;
        }

        button {
            padding: 12px 18px;
            border: none;
            border-radius: 30px;
            background: linear-gradient(45deg, #00c6ff, #0072ff);
            color: white;
            font-weight: bold;
            cursor: pointer;
            transition: 0.4s;
            box-shadow: 0 0 15px rgba(0,198,255,0.7);
            white-space: nowrap;
        }

        button:hover {
            transform: scale(1.05);
            box-shadow: 0 0 25px rgba(0,198,255,1);
        }

        table {
            width: 100%;
            margin-top: 25px;
            border-collapse: collapse;
            border-radius: 12px;
            overflow: hidden;
        }

        th {
            background: rgba(0, 150, 255, 0.2);
            padding: 12px;
        }

        td {
            padding: 12px;
            text-align: center;
        }

        tr:nth-child(even) {
            background: rgba(255,255,255,0.05);
        }

        a {
            text-decoration: none;
            padding: 8px 12px;
            border-radius: 20px;
            font-size: 13px;
        }

        .edit {
            background: #00e5ff;
            color: #003366;
        }

        .delete {
            background: #ff4d6d;
            color: white;
        }

        /* HEADER */
        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .topbar h2 {
            margin: 0;
            text-align: left;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        /* LOGOUT BUTTON */
        .logout {
            background: #ff4d6d;
            color: white;
            padding: 10px 15px;
            border-radius: 20px;
            text-decoration: none;
            font-weight: bold;
            box-shadow: 0 0 10px rgba(255,77,109,0.5);
            transition: 0.3s;
        }

        .logout:hover {
            background: #e63950;
        }
    </style>
</head>

<body>

<div class="container">

    <!-- HEADER WITH LOGOUT -->
    <div class="topbar">
        <h2>🐋 Student Record System</h2>

        <a href="logout.php" class="logout">🚪 Logout</a>
    </div>

    <div class="card">

        <!-- FORM -->
        <form method="POST" action="add.php" class="form-row">
            <input type="text" name="name" placeholder="👤 Name" required>
            <input type="email" name="email" placeholder="📧 Email" required>
            <input type="text" name="course" placeholder="📘 Course" required>
            <button type="submit">🌊 Add</button>
        </form>

        <!-- TABLE -->
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Course</th>
                <th>Action</th>
            </tr>

            <?php
            $stmt = $conn->query("SELECT * FROM students");

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            ?>
            <tr>
                <td><?= $row['id']; ?></td>
                <td><?= $row['name']; ?></td>
                <td><?= $row['email']; ?></td>
                <td><?= $row['course']; ?></td>
                <td>
                    <a class="edit" href="edit.php?id=<?= $row['id']; ?>">✏ Edit</a>
                    <a class="delete" href="delete.php?id=<?= $row['id']; ?>" onclick="return confirm('Delete this student?')">🗑 Delete</a>
                </td>
            </tr>
            <?php } ?>

        </table>

    </div>
</div>

</body>
</html>