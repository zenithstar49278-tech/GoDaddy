!-- dashboard.php (User Dashboard) -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Domain Platform</title>
    <style>
        body {
            background: linear-gradient(to bottom, #0077be, #00bfff);
            font-family: Arial, sans-serif;
            color: #fff;
            margin: 0;
            padding: 20px;
        }
        .dashboard {
            max-width: 800px;
            margin: 0 auto;
            background: rgba(255, 255, 255, 0.1);
            padding: 20px;
            border-radius: 10px;
        }
        h2 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
        }
        button {
            background: #004080;
            color: #fff;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
            margin-right: 5px;
        }
        button:hover {
            background: #002b5e;
        }
        @media (max-width: 600px) {
            table {
                font-size: 0.8em;
            }
        }
        .wave {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 100px;
            background: url('data:image/svg+xml;utf8,<svg viewBox="0 0 1200 120" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 0L50 20C100 40 150 40 200 30C250 20 300 0 350 0C400 0 450 20 500 40C550 60 600 80 650 70C700 60 750 30 800 20C850 10 900 20 950 40C1000 60 1050 80 1100 70C1150 60 1200 30 1200 30V120H0V0Z" fill="#00bfff"/></svg>') repeat-x;
        }
    </style>
</head>
<body>
    <?php
    session_start();
    if (!isset($_SESSION['user_id'])) {
        echo "<script>window.location.href = 'login.php';</script>";
        exit();
    }
    $conn = new mysqli('localhost', 'u7bkx8pwvemeg', 'qredcpdgqd9j', 'dbvmf3g3ppsw4p');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $user_id = $_SESSION['user_id'];
    $sql = "SELECT * FROM domains WHERE user_id = $user_id";
    $result = $conn->query($sql);
    ?>
    <div class="dashboard">
        <h2>Your Registered Domains</h2>
        <table>
            <tr>
                <th>Domain</th>
                <th>Registration Date</th>
                <th>Expiration Date</th>
                <th>Actions</th>
            </tr>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>{$row['domain']}</td>
                        <td>{$row['registration_date']}</td>
                        <td>{$row['expiration_date']}</td>
                        <td>
                            <button onclick=\"alert('Renewal non-functional');\">Renew</button>
                            <button onclick=\"alert('Transfer non-functional');\">Transfer</button>
                            <button onclick=\"alert('Remove non-functional');\">Remove</button>
                        </td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No domains registered.</td></tr>";
            }
            $conn->close();
            ?>
        </table>
        <p style="text-align: center;"><a href="index.php" style="color: #ffd700;">Back to Home</a></p>
    </div>
    <div class="wave"></div>
</body>
</html>
