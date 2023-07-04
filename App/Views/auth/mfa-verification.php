<?php
namespace App\Views\auth;
// require_once 'vendor/autoload.php'; // Include required dependencies


use App\Controllers\AuthController;
use App\Repositories\UserRepository;
use PDO;

// Include your database configuration file or handle environment variables
// to get the database connection settings
$dbConfig = include '../../config/DataBase.php';

// Create a PDO instance using the database settings
$db = new PDO($dbConfig['dsn'], $dbConfig['username'], $dbConfig['password']);

// Instantiate UserRepository with the $db argument
$userRepository = new UserRepository($db); // Replace UserRepository instantiation with your actual implementation

// Instantiate AuthController with the UserRepository instance
$authController = new AuthController($userRepository); // Replace AuthController instantiation with your actual implementation

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $userId = $_POST['user_id'];
    $otp = $_POST['otp'];

    // Call the verifyMFA method in AuthController
    $authController->verifyMFA($userId, $otp);
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>MFA Verification</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <header>
        <h1>MFA Verification</h1>
    </header>
    <main>
        <form action="mfa-verification.php" method="POST">
            <input type="hidden" name="user_id" value="<?php echo $_GET['user']; ?>">
            <label for="otp">Enter One-Time Password (OTP)</label>
            <input type="text" id="otp" name="otp" required>
            <button type="submit">Verify</button>
        </form>
    </main>
    <footer>
        &copy; <?php echo date("Y"); ?> Note Taking App
    </footer>
</body>
</html>
?>