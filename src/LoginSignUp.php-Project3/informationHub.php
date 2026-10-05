<?php
require_once 'dbconnect.php';

$stmt = $pdo->query('SELECT COUNT(*) AS total_messages FROM contact_messages');
$count = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Information Hub</title>
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

        .hub-container {
            max-width: 900px;
            margin: 0 auto;
            background: white;
            border-radius: 10px;
            padding: 40px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
        }

        .hub-header {
            border-bottom: 3px solid green;
            padding-bottom: 20px;
            margin-bottom: 30px;
        }

        .hub-header h2 {
            color: green;
            font-size: 32px;
            margin-bottom: 8px;
        }

        .hub-header p {
            color: #666;
            font-size: 16px;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            border-left: 4px solid green;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }

        .stat-card .stat-number {
            font-size: 36px;
            font-weight: bold;
            color: green;
            display: block;
            margin-bottom: 5px;
        }

        .stat-card .stat-label {
            color: #666;
            font-size: 14px;
        }

        .stat-card .stat-icon {
            font-size: 30px;
            display: block;
            margin-bottom: 10px;
        }

        .info-section {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 25px;
            margin-bottom: 25px;
        }

        .info-section h3 {
            color: green;
            font-size: 22px;
            margin-bottom: 15px;
            padding-bottom: 10px;
            border-bottom: 2px solid #e0e0e0;
        }

        .info-section ul {
            list-style: none;
            padding: 0;
        }

        .info-section ul li {
            padding: 10px 15px;
            margin-bottom: 8px;
            background: white;
            border-radius: 8px;
            border-left: 3px solid green;
            color: #333;
            font-size: 15px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .info-section ul li .bullet {
            color: green;
            font-weight: bold;
            font-size: 18px;
        }

        .info-section ul li strong {
            color: green;
        }

        .db-info {
            background: #e8f5e9;
            border-radius: 10px;
            padding: 25px;
            margin-bottom: 25px;
            border: 1px solid #c8e6c9;
        }

        .db-info h3 {
            color: #2e7d32;
            font-size: 20px;
            margin-bottom: 15px;
        }

        .db-info p {
            color: #333;
            margin-bottom: 10px;
            font-size: 15px;
        }

        .action-buttons {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
            margin-top: 25px;
        }

        .btn {
            padding: 12px 30px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s;
            text-align: center;
            flex: 1;
            min-width: 150px;
        }

        .btn-primary {
            background: green;
            color: white;
        }

        .btn-primary:hover {
            background: #006400;
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(0, 128, 0, 0.3);
        }

        .btn-secondary {
            background: #6c757d;
            color: white;
        }

        .btn-secondary:hover {
            background: #5a6268;
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(0,0,0,0.2);
        }

        .btn-danger {
            background: #dc3545;
            color: white;
        }

        .btn-danger:hover {
            background: #c82333;
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(220, 53, 69, 0.3);
        }

        .last-message {
            background: #fff3cd;
            padding: 10px 15px;
            border-radius: 8px;
            border-left: 4px solid #ffc107;
            margin-top: 15px;
            color: #856404;
            font-size: 14px;
        }

        @media (max-width: 768px) {
            body {
                padding: 15px;
            }

            .hub-container {
                padding: 25px;
            }

            .hub-header h2 {
                font-size: 26px;
            }

            .stats-grid {
                grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
                gap: 15px;
            }

            .stat-card .stat-number {
                font-size: 28px;
            }

            .action-buttons {
                flex-direction: column;
            }

            .btn {
                flex: none;
                width: 100%;
            }

            .info-section ul li {
                font-size: 14px;
                padding: 8px 12px;
            }
        }

        @media (max-width: 480px) {
            .hub-container {
                padding: 20px;
            }

            .hub-header h2 {
                font-size: 22px;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }

            .stat-card {
                padding: 15px;
            }

            .info-section {
                padding: 15px;
            }
        }
    </style>
</head>
<body>
    <h2>Information Hub</h2>
    <p>This page shows useful information about the form and stored data.</p>

    <h3>Contact Form Summary</h3>
    <ul>
        <li>Contact messages are submitted through the Contact Us form.</li>
        <li>Each message is stored in the database.</li>
        <li>Total messages submitted: <?php echo htmlspecialchars($count['total_messages']); ?></li>
    </ul>

    <h3>Database Info</h3>
    <p>You can view all submitted messages in the submissions page.</p>
    <p><a href="submissions.php">View Submissions</a></p>
</body>
</html>
