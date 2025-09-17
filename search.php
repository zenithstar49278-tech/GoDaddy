<!-- search.php (Domain Availability Checker) -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results - Domain Platform</title>
    <style>
        body {
            background: linear-gradient(to bottom, #0077be, #00bfff);
            font-family: Arial, sans-serif;
            color: #fff;
            margin: 0;
            padding: 20px;
        }
        .results {
            max-width: 800px;
            margin: 0 auto;
            background: rgba(255, 255, 255, 0.1);
            padding: 20px;
            border-radius: 10px;
        }
        h2 {
            text-align: center;
        }
        ul {
            list-style: none;
            padding: 0;
        }
        li {
            background: rgba(0, 0, 0, 0.1);
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        button {
            background: #004080;
            color: #fff;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background: #002b5e;
        }
        .available {
            color: #00ff00;
        }
        .taken {
            color: #ff0000;
        }
        @media (max-width: 600px) {
            li {
                flex-direction: column;
            }
            button {
                margin-top: 10px;
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
    <div class="results">
        <h2>Domain Search Results for <?php echo htmlspecialchars($_GET['domain']); ?></h2>
        <ul>
            <?php
            $domain_name = strtolower(htmlspecialchars($_GET['domain']));
            $extensions = ['.com', '.net', '.org', '.io', '.app'];
            // Dummy taken domains
            $taken_domains = ['example.com', 'test.net', 'domain.org'];
            foreach ($extensions as $ext) {
                $full_domain = $domain_name . $ext;
                $status = in_array($full_domain, $taken_domains) ? 'Taken' : 'Available';
                $class = in_array($full_domain, $taken_domains) ? 'taken' : 'available';
                echo "<li>$full_domain - <span class='$class'>$status</span>";
                if ($status == 'Available') {
                    echo " <button onclick=\"addToCart('$full_domain')\">Add to Cart</button>";
                }
                echo "</li>";
            }
            ?>
        </ul>
        <p style="text-align: center;"><a href="index.php" style="color: #ffd700;">Back to Home</a></p>
    </div>
    <div class="wave"></div>
    <script>
        function addToCart(domain) {
            alert(domain + ' added to cart! Proceeding to checkout (non-functional).');
            // Non-functional checkout
            window.location.href = 'index.php';
        }
    </script>
</body>
</html>
