<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

include __DIR__ . '/config.php';

$id = $_GET['id'] ?? null;

if (!$id) {
    header("Location: index.php");
    exit();
}

$stmt = $conn->prepare("SELECT * FROM students WHERE id = ?");
$stmt->execute([$id]);
$row = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$row) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Student</title>

    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(180deg, #001f3f, #003366, #005f99);
            color: #e0f7ff;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 760px;
            margin: auto;
        }

        .card {
            background: rgba(0, 30, 60, 0.6);
            backdrop-filter: blur(12px);
            padding: 30px;
            border-radius: 18px;
            box-shadow: 0 0 30px rgba(0, 200, 255, 0.2);
        }

        .title {
            text-align: center;
            margin-bottom: 20px;
        }

        .detail-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 16px;
        }

        .detail-box {
            background: rgba(255, 255, 255, 0.08);
            border-radius: 14px;
            padding: 18px;
        }

        .label {
            font-size: 13px;
            opacity: 0.8;
            margin-bottom: 6px;
        }

        .value {
            font-size: 20px;
            font-weight: 600;
            word-break: break-word;
        }

        .actions {
            margin-top: 25px;
            display: flex;
            justify-content: center;
        }

        a {
            text-decoration: none;
            padding: 10px 16px;
            border-radius: 25px;
            font-weight: bold;
            background: rgba(255,255,255,0.12);
            color: #e0f7ff;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="title">
        <h2>View Student Record</h2>
    </div>

    <div class="card">
        <div class="detail-grid">
            <div class="detail-box">
                <div class="label">Student ID</div>
                <div class="value"><?= htmlspecialchars($row['student_id']); ?></div>
            </div>

            <div class="detail-box">
                <div class="label">Full Name</div>
                <div class="value"><?= htmlspecialchars($row['full_name']); ?></div>
            </div>

            <div class="detail-box">
                <div class="label">Course</div>
                <div class="value"><?= htmlspecialchars($row['course']); ?></div>
            </div>

            <div class="detail-box">
                <div class="label">Year Level</div>
                <div class="value"><?= htmlspecialchars($row['year_level']); ?></div>
            </div>

            <div class="detail-box" style="grid-column: 1 / -1;">
                <div class="label">Email Address</div>
                <div class="value"><?= htmlspecialchars($row['email_address']); ?></div>
            </div>
        </div>

        <div class="actions">
            <a href="index.php">Back to List</a>
        </div>
    </div>
</div>

</body>
</html>
