<?php

namespace App\Controllers;

use App\Models\User;
use App\Repositories\UserRepository;
use OTPHP\TOTP;

class AuthController
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function login($username, $password)
    {
        $user = $this->userRepository->findByUsername($username);

        if ($user && password_verify($password, $user->getPassword())) {
            if ($user->getMFASecret()) {
                header("Location: mfa-verification.php?user=" . $user->getId());
                exit();
            } else {
                // User authentication successful
                // Set session/cookie to indicate user is logged in
                // Redirect to desired page/dashboard
                session_start();
                $_SESSION['user'] = $user->getId();
                header("Location: dashboard.php");
                exit();
            }
        } else {
            // Invalid username or password
            // Display error message or redirect back to login page
            header("Location: login.php?error=1");
            exit();
        }
    }

    public function signup($username, $password)
    {
        $existingUser = $this->userRepository->findByUsername($username);

        if ($existingUser) {
            // Username already taken
            // Display error message or redirect back to signup page
            header("Location: signup.php?error=1");
            exit();
        } else {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $user = new User(null,$username, $hashedPassword,null);

            $success = $this->userRepository->createUser($user);

            if ($success) {
                // User registration successful
                // Set session/cookie to indicate user is logged in
                // Redirect to desired page/dashboard
                session_start();
                $_SESSION['user'] = $user->getId();
                header("Location: dashboard.php");
                exit();
            } else {
                // User registration failed
                // Display error message or redirect back to signup page
                header("Location: signup.php?error=2");
                exit();
            }
        }
    }

    public function verifyMFA($userId, $otp)
    {
        $user = $this->userRepository->findById($userId);

        if ($user) {
            $totp = new TOTP($user->getMFASecret());

            if ($totp->verify($otp)) {
                // MFA verification successful
                // Set session/cookie to indicate user is logged in
                // Redirect to desired page/dashboard
                session_start();
                $_SESSION['user'] = $user->getId();
                header("Location: dashboard.php");
                exit();
            } else {
                // MFA verification failed
                // Display error message or redirect back to MFA verification page
                header("Location: mfa-verification.php?error=1&user=" . $user->getId());
                exit();
            }
        } else {
            // User not found
            // Display error message or redirect to an error page
            header("Location: error.php");
            exit();
        }
    }
    
    // Rest of the code...
}
