<form action="api/signup.php" method="POST" onsubmit="return validateForm();">
    <label for="username">Username</label>
    <input type="text" id="username" name="username" required>
    <label for="password">Password</label>
    <input type="password" id="password" name="password" required>
    <input type="hidden" name="csrf_token" value="YOUR_CSRF_TOKEN">
    <button type="submit">Sign Up</button>
</form>
