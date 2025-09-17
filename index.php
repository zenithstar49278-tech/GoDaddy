<!-- index.php (Homepage) -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Domain Platform - Homepage</title>
    <style>
        body {
            background: linear-gradient(to bottom, #0077be, #00bfff);
            font-family: Arial, sans-serif;
            color: #fff;
            margin: 0;
            padding: 0;
        }
        header {
            text-align: center;
            padding: 50px 20px;
        }
        h1 {
            font-size: 2.5em;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }
        .search-bar {
            max-width: 600px;
            margin: 0 auto;
        }
        input[type="text"] {
            width: 70%;
            padding: 15px;
            border: none;
            border-radius: 5px 0 0 5px;
            font-size: 1.2em;
        }
        button {
            padding: 15px 20px;
            border: none;
            background: #004080;
            color: #fff;
            border-radius: 0 5px 5px 0;
            font-size: 1.2em;
            cursor: pointer;
            transition: background 0.3s;
        }
        button:hover {
            background: #002b5e;
        }
        .extensions, .promotions {
            text-align: center;
            margin: 20px 0;
        }
        .extensions span, .pricing span {
            background: rgba(255, 255, 255, 0.2);
            padding: 5px 10px;
            margin: 5px;
            border-radius: 5px;
        }
        .pricing {
            text-align: center;
            margin: 40px 0;
        }
        nav {
            position: absolute;
            top: 10px;
            right: 20px;
        }
        nav a {
            color: #fff;
            margin: 0 10px;
            text-decoration: none;
        }
        @media (max-width: 600px) {
            h1 {
                font-size: 1.8em;
            }
            input[type="text"] {
                width: 60%;
            }
            button {
                padding: 15px 10px;
            }
        }
        .wave {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 150px;
            background: url('data:image/svg+xml;utf8,<svg viewBox="0 0 1200 120" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 0L50 20C100 40 150 40 200 30C250 20 300 0 350 0C400 0 450 20 500 40C550 60 600 80 650 70C700 60 750 30 800 20C850 10 900 20 950 40C1000 60 1050 80 1100 70C1150 60 1200 30 1200 30V120H0V0Z" fill="#0077be"/></svg>') repeat-x;
        }
    </style>
</head>
<body>
    <nav>
        <?php
        session_start();
        if (isset($_SESSION['user_id'])) {
            echo '<a href="dashboard.php">Dashboard</a> <a href="logout.php">Logout</a>';
        } else {
            echo '<a href="login.php">Login</a> <a href="register.php">Register</a>';
        }
        ?>
    </nav>
    <header>
        <h1>Find Your Perfect Domain</h1>
        <form action="search.php" method="GET" class="search-bar">
            <input type="text" name="domain" placeholder="Enter domain name" required>
            <button type="submit">Search</button>
        </form>
        <div class="extensions">
            <h3>Popular Extensions:</h3>
            <span>.com</span> <span>.net</span> <span>.org</span> <span>.io</span> <span>.app</span>
        </div>
        <div class="promotions">
            <h3>Promotions:</h3>
            <p>Get .com for just $9.99/year!</p>
        </div>
        <div class="pricing">
            <h3>Pricing Plans:</h3>
            <span>.com - $12.99/year</span> <span>.net - $14.99/year</span> <span>.org - $10.99/year</span>
        </div>
    </header>
    <div class="wave"></div>
</body>
</html>
