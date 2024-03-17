<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Page Title</title>
    <link rel="stylesheet" href="<?php print HTTP_CSS_PATH; ?>style1.css">
    <style>
        /* CSS styles for the footer container */
        .copyright-container {
            border: 1px solid #ccc;
            margin: 20px 0;
            text-align: center;
            background-color: #83aec4;
            height: 43px;
            line-height: 43px; /* vertically center the text */
        }

        /* CSS styles for the copyright text */
        .copyright-container p {
            margin: 0;
            font-size: 14px;
            color: #fff; /* change text color to white */
        }
        
    </style>
</head>
<body>
    <div class="container">
        <!-- <div class="header">
            <button onclick="location.href='<?= base_url('StripePayment/login') ?>'">Login</button>
            <button onclick="location.href='<?= base_url('StripePayment/register') ?>'">Register</button>
        </div> -->
        <div class="content">
            <h2>Login</h2>
            <form action="<?= base_url('StripePayment/index') ?>" method="post">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required><br><br>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required><br><br>
                <button type="submit">Login</button>
            </form>
            <p>Don't have an account? <a href="<?= base_url('StripePayment/register') ?>">Register</a></p>
        </div>
    </div>

    <div class="copyright-container">
        <p class="text-muted small mb-4 mb-lg-0">Copyright &copy; 2011 - <?php echo date('Y', time());?> 
        <a href="https://Socxo.com/" style="color: #fff;">Socxo.com</a> All rights reserved.</p>
    </div>
</body>
</html>
