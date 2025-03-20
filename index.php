<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Register</h2>

        <!-- Display Success or Error Message -->
        <?php if (isset($_GET['success'])): ?>
            <p class="success"><?php echo htmlspecialchars($_GET['success']); ?></p>
        <?php elseif (isset($_GET['error'])): ?>
            <p class="error"><?php echo htmlspecialchars($_GET['error']); ?></p>
        <?php endif; ?>

        <form id="registerForm" action="register.php" method="POST">
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" id="password" placeholder="Password" required>
            <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password" required>
            <p class="error" id="error-message"></p>
            <button type="submit">Register</button>
        </form>
    </div>

    <script>
        document.getElementById("registerForm").addEventListener("submit", function(e) {
            let password = document.getElementById("password").value;
            let confirmPassword = document.getElementById("confirm_password").value;
            let errorMessage = document.getElementById("error-message");

            if (password !== confirmPassword) {
                e.preventDefault();
                errorMessage.textContent = "Passwords do not match!";
            } else {
                errorMessage.textContent = "";
            }
        });
    </script>
</body>
</html>
