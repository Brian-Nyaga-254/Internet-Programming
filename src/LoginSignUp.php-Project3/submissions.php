<?php
require_once 'dbconnect.php';

$stmt = $pdo->query('SELECT * FROM contact_messages ORDER BY id DESC');
$messages = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submissions</title>
     <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f0f2f5;
            min-height: 100vh;
            padding: 30px;
        }

        .submissions-container {
            max-width: 1200px;
            margin: 0 auto;
            background: white;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
        }

        .header-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            border-bottom: 3px solid green;
            padding-bottom: 15px;
            flex-wrap: wrap;
            gap: 15px;
        }

        .header-section h2 {
            color: green;
            font-size: 28px;
        }

        .header-section p {
            color: #666;
            font-size: 16px;
        }

        .btn-back {
            display: inline-block;
            padding: 10px 25px;
            background: green;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-weight: bold;
            transition: all 0.3s;
        }

        .btn-back:hover {
            background: #006400;
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(0, 128, 0, 0.3);
        }

        .table-wrapper {
            overflow-x: auto;
            margin-top: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }

        thead {
            background: green;
            color: white;
        }

        th {
            padding: 15px 20px;
            text-align: left;
            font-weight: bold;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        td {
            padding: 12px 20px;
            border-bottom: 1px solid #e0e0e0;
            color: #333;
            font-size: 14px;
        }

        tbody tr {
            transition: background 0.3s;
        }

        tbody tr:hover {
            background: #f5f9f5;
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        td:nth-child(5) {
            max-width: 250px;
            word-wrap: break-word;
        }

        .no-submissions {
            text-align: center;
            padding: 50px 20px;
            color: #666;
        }

        .no-submissions .icon {
            font-size: 60px;
            color: #ddd;
            margin-bottom: 15px;
        }

        .no-submissions h3 {
            color: #333;
            margin-bottom: 10px;
        }

        .stats-bar {
            display: flex;
            gap: 30px;
            background: #f8f9fa;
            padding: 15px 20px;
            border-radius: 8px;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }

        .stat-item {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .stat-item .label {
            color: #666;
            font-size: 14px;
        }

        .stat-item .value {
            font-weight: bold;
            color: green;
            font-size: 18px;
        }

        @media (max-width: 768px) {
            body {
                padding: 15px;
            }

            .submissions-container {
                padding: 20px;
            }

            .header-section {
                flex-direction: column;
                align-items: flex-start;
            }

            .header-section h2 {
                font-size: 24px;
            }

            th, td {
                padding: 10px 12px;
                font-size: 13px;
            }

            td:nth-child(5) {
                max-width: 150px;
            }

            .stats-bar {
                gap: 15px;
                padding: 12px 15px;
            }

            .stat-item .value {
                font-size: 16px;
            }
        }

        @media (max-width: 480px) {
            .submissions-container {
                padding: 15px;
            }

            th, td {
                padding: 8px 10px;
                font-size: 12px;
            }

            td:nth-child(5) {
                max-width: 100px;
            }

            .btn-back {
                width: 100%;
                text-align: center;
            }
        }
    </style>
</head>
<body>
    <h2>Submissions</h2>
    <p>We will get back to you as soon as possible.</p>

    <?php if(!empty($messages)): ?>
        <table border="1" cellpadding="10" cellspacing="0">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Subject</th>
                <th>Message</th>
                <th>Date</th>
            </tr>

            <?php foreach($messages as $message): ?>
                <tr>
                    <td><?php echo htmlspecialchars($message['id']); ?></td>
                    <td><?php echo htmlspecialchars($message['name']); ?></td>
                    <td><?php echo htmlspecialchars($message['email']); ?></td>
                    <td><?php echo htmlspecialchars($message['subject']); ?></td>
                    <td><?php echo htmlspecialchars($message['message']); ?></td>
                    <td><?php echo htmlspecialchars($message['created_at']); ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php else: ?>
        <p>No submissions found.</p>
    <?php endif; ?>
</body>
</html>
