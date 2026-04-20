<?php
include __DIR__ . '/config.php';

$id = $_GET['id'];

$stmt = $conn->prepare("SELECT * FROM students WHERE id=?");
$stmt->execute([$id]);
$row = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>

    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(180deg, #001f3f, #003366, #005f99);
            color: #e0f7ff;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 700px;
            margin: auto;
            text-align: center;
        }

        .card {
            background: rgba(0, 30, 60, 0.6);
            backdrop-filter: blur(12px);
            padding: 30px;
            border-radius: 18px;
            box-shadow: 0 0 30px rgba(0, 200, 255, 0.2);
        }

        h2 {
            margin-bottom: 20px;
        }

        input, select {
            width: 90%;
            padding: 12px;
            margin: 10px 0;
            border-radius: 10px;
            border: none;
            outline: none;
            background: #e6f7ff;
        }

        button {
            padding: 12px 20px;
            border: none;
            border-radius: 30px;
            background: linear-gradient(45deg, #00c6ff, #0072ff);
            color: white;
            font-weight: bold;
            cursor: pointer;
            transition: 0.4s;
            box-shadow: 0 0 15px rgba(0,198,255,0.7);
            margin-top: 10px;
        }

        button:hover {
            transform: scale(1.05);
            box-shadow: 0 0 25px rgba(0,198,255,1);
        }

        .back {
            display: inline-block;
            margin-top: 15px;
            text-decoration: none;
            padding: 10px 15px;
            border-radius: 25px;
            background: rgba(255,255,255,0.1);
            color: #e0f7ff;
            transition: 0.3s;
        }

        .back:hover {
            background: rgba(255,255,255,0.2);
        }
    </style>
</head>

<body>

<div class="container">
    <h2>Edit Student</h2>

    <div class="card">
        <form method="POST" action="update.php">
            <input type="hidden" name="id" value="<?= $row['id']; ?>">

            <input type="text" name="student_id" value="<?= htmlspecialchars($row['student_id']); ?>" placeholder="Student ID" required>
            <input type="text" name="full_name" value="<?= htmlspecialchars($row['full_name']); ?>" placeholder="Full Name" required>
            <input type="text" name="course" value="<?= htmlspecialchars($row['course']); ?>" placeholder="Course" required>

            <select name="year_level" required>
                <?php foreach (['1st Year', '2nd Year', '3rd Year', '4th Year', '5th Year'] as $level): ?>
                    <option value="<?= $level; ?>" <?= $row['year_level'] === $level ? 'selected' : ''; ?>><?= $level; ?></option>
                <?php endforeach; ?>
            </select>

            <input type="email" name="email_address" value="<?= htmlspecialchars($row['email_address']); ?>" placeholder="Email Address" required>

            <button type="submit">Update Student</button>
        </form>

        <a class="back" href="index.php">Back</a>
    </div>
</div>

</body>
</html>
