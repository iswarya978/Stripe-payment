<link href="<?php print HTTP_CSS_PATH; ?>style1.css" rel="stylesheet">
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
<body>
    <div class="container">
    <h2>Register</h2>
    <form action="<?= base_url('StripePayment/register_user') ?>" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>
        <label for="password">Email-Id:</label>
        <input type="password" id="password" name="password" required><br><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        <!-- Additional fields for registration -->
        <!-- You can add more fields like email, name, etc. here -->
        <button type="submit">Register</button>
    </form>
    <p style="margin-left: 23px">Already have an account? <a href="<?= base_url('StripePayment/login') ?>">Login</a></p>
</div>
</body>
<div class="copyright-container">
        <p class="text-muted small mb-4 mb-lg-0">Copyright &copy; 2011 - <?php echo date('Y', time());?> 
        <a href="https://Socxo.com/" style="color: #fff;">Socxo.com</a> All rights reserved.</p>
    </div>

