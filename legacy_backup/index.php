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

        .container {
            max-width: 1200px;
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
            display: grid;
            grid-template-columns: repeat(5, minmax(140px, 1fr)) auto;
            gap: 10px;
            align-items: center;
        }

        input, select {
            padding: 12px;
            border-radius: 10px;
            border: none;
            outline: none;
            background: #e6f7ff;
            min-width: 0;
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
            display: inline-block;
            margin: 2px;
        }

        .view {
            background: #7af0c8;
            color: #003366;
        }

        .edit {
            background: #00e5ff;
            color: #003366;
        }

        .delete {
            background: #ff4d6d;
            color: white;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .logout {
            background: #ff4d6d;
            color: white;
            padding: 10px 15px;
            border-radius: 20px;
            text-decoration: none;
            font-weight: bold;
        }
    </style>
</head>

<body>

<div class="container">
    <div class="topbar">
        <h2>Student Record System</h2>
        <a href="logout.php" class="logout">Logout</a>
    </div>

    <div class="card">
        <form method="POST" action="add.php" class="form-row">
            <input type="text" name="student_id" placeholder="Student ID" required>
            <input type="text" name="full_name" placeholder="Full Name" required>
            <input type="text" name="course" placeholder="Course" required>
            <select name="year_level" required>
                <option value="">Year Level</option>
                <option value="1st Year">1st Year</option>
                <option value="2nd Year">2nd Year</option>
                <option value="3rd Year">3rd Year</option>
                <option value="4th Year">4th Year</option>
                <option value="5th Year">5th Year</option>
            </select>
            <input type="email" name="email_address" placeholder="Email Address" required>
            <button type="submit">Add</button>
        </form>

        <table>
            <tr>
                <th>ID</th>
                <th>Student ID</th>
                <th>Full Name</th>
                <th>Course</th>
                <th>Year Level</th>
                <th>Email Address</th>
                <th>Action</th>
            </tr>

            <?php
            $stmt = $conn->query("SELECT * FROM students ORDER BY id DESC");

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            ?>
            <tr>
                <td><?= $row['id']; ?></td>
                <td><?= htmlspecialchars($row['student_id']); ?></td>
                <td><?= htmlspecialchars($row['full_name']); ?></td>
                <td><?= htmlspecialchars($row['course']); ?></td>
                <td><?= htmlspecialchars($row['year_level']); ?></td>
                <td><?= htmlspecialchars($row['email_address']); ?></td>
                <td>
                    <a class="view" href="view.php?id=<?= $row['id']; ?>">View</a>
                    <a class="edit" href="edit.php?id=<?= $row['id']; ?>">Edit</a>
                    <a class="delete" href="delete.php?id=<?= $row['id']; ?>" onclick="return confirm('Delete this student?')">Delete</a>
                </td>
            </tr>
            <?php } ?>
        </table>
    </div>
</div>

</body>
</html>
