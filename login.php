<!-- login.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Domain Platform</title>
    <style>
        /* Ocean theme CSS (similar to register) */
        body {
            background: linear-gradient(to bottom, #0077be, #00bfff);
            font-family: Arial, sans-serif;
            color: #fff;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background: rgba(255, 255, 255, 0.1);
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }
        h2 {
            margin-bottom: 20px;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
        }
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: none;
            border-radius: 5px;
            box-sizing: border-box;
        }
        button {
            background: #004080;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s;
        }
        button:hover {
            background: #002b5e;
        }
        a {
            color: #ffd700;
            text-decoration: none;
        }
        @media (max-width: 600px) {
            .container {
                padding: 20px;
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
    <div class="container">
        <h2>Login</h2>
        <form method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" name="login">Login</button>
        </form>
        <p>Don't have an account? <a href="register.php">Register</a></p>
    </div>
    <div class="wave"></div>
    <?php
    session_start();
    if (isset($_POST['login'])) {
        $conn = new mysqli('localhost', 'u7bkx8pwvemeg', 'qredcpdgqd9j', 'dbvmf3g3ppsw4p');
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $username = $_POST['username'];
        $password = $_POST['password'];
        $sql = "SELECT * FROM users WHERE username='$username'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if (password_verify($password, $row['password'])) {
                $_SESSION['user_id'] = $row['id'];
                echo "<script>window.location.href = 'index.php';</script>";
            } else {
                echo "Invalid password.";
            }
        } else {
            echo "No user found.";
        }
        $conn->close();
    }
    ?>
</body>
</html>
