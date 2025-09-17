<!-- register.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Domain Platform</title>
    <style>
        /* Ocean theme CSS */
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
        input[type="text"], input[type="email"], input[type="password"] {
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
        /* Responsive */
        @media (max-width: 600px) {
            .container {
                padding: 20px;
            }
        }
        /* Wave effect */
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
        <h2>Register</h2>
        <form method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" name="register">Register</button>
        </form>
        <p>Already have an account? <a href="login.php">Login</a></p>
    </div>
    <div class="wave"></div>
    <?php
    if (isset($_POST['register'])) {
        $conn = new mysqli('localhost', 'u7bkx8pwvemeg', 'qredcpdgqd9j', 'dbvmf3g3ppsw4p');
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
        if ($conn->query($sql) === TRUE) {
            echo "<script>window.location.href = 'login.php';</script>";
        } else {
            echo "Error: " . $conn->error;
        }
        $conn->close();
    }
    ?>
</body>
</html>
