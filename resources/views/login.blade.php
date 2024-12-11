<?php
// Start session
session_start();

// Database connection
$host = 'localhost';
$dbname = 'sparepart_komputer';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// Initialize variables
$message = "";

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['register'])) {
        // Registration logic
        $email = $_POST['email'];
        $password = $_POST['pswd'];
        $confirmPassword = $_POST['confirm_pswd'];

        // Check if passwords match
        if ($password !== $confirmPassword) {
            $message = "Passwords do not match!";
        } else {
            // Hash the password
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Insert user into database
            try {
                $stmt = $pdo->prepare("INSERT INTO users (email, password) VALUES (:email, :password)");
                $stmt->execute(['email' => $email, 'password' => $hashedPassword]);
                $message = "Registration successful! Please log in.";
            } catch (PDOException $e) {
                if ($e->getCode() == 23000) { // Duplicate entry error
                    $message = "Email is already registered!";
                } else {
                    $message = "An error occurred: " . $e->getMessage();
                }
            }
        }
    } elseif (isset($_POST['login'])) {
        // Login logic
        $email = $_POST['email'];
        $password = $_POST['pswd'];

        // Fetch user from the database
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->execute(['email' => $email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            // Store user in session and redirect
            $_SESSION['user'] = [
                'id' => $user['id'], // Save user ID
                'email' => $user['email'] // Save user email
            ];
            header("Location: admin.php");
            exit();
        } else {
            $message = "Invalid email or password!";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Register</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" type="text/css" href="slide-navbar-style.css">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <div class="logo"><i class="fa-solid fa-house-laptop"></i></div>
    <div class="main">
        <input type="checkbox" id="chk" aria-hidden="true">

        <!-- Registration Form -->
        <div class="signup">
            <form action="" method="POST">
                <label for="chk" aria-hidden="true">Register</label>
                <input type="email" name="email" id="register-email" placeholder="Email" required>
                <input type="password" name="pswd" id="register-pswd" placeholder="Password" required>
                <input type="password" name="confirm_pswd" id="confirm-pswd" placeholder="Confirm Password" required>
                <button type="submit" name="register">Sign up</button>
            </form>
        </div>

        <!-- Login Form -->
        <div class="login">
            <form action="" method="POST">
                <label for="chk" aria-hidden="true">Login</label>
                <input type="email" name="email" id="login-email" placeholder="Email" required>
                <input type="password" name="pswd" placeholder="Password" id="login-pswd" required>
                <button type="submit" name="login">Login</button>
            </form>
        </div>
    </div>

    <!-- Display PHP messages -->
    <?php if (!empty($message)): ?>
        <script>
            alert("<?php echo $message; ?>");
        </script>
    <?php endif; ?>
</body>

</html>
