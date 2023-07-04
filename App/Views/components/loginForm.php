<div class="d-flex justify-content-center">
    <form action="api/login.php" method="POST" class="p-5" onsubmit="return validateForm();">
        <div class="mb-3 ">
            <label for="username" class="form-label">Username</label>
            <input type="text" name="username" id="username" class="form-control" required>
            <div class="invalid-feedback">Please enter your username.</div>
        </div>
        <div class="mb-3 ">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" id="password" class="form-control" required>
            <div class="invalid-feedback">Please enter your password.</div>
        </div>
        <input type="hidden" name="csrf_token" value="YOUR_CSRF_TOKEN">
        <div class="d-grid gap-2 ">
            <button type="submit" class="btn btn-primary m-auto col-lg-4">Login</button>
        </div>
    </form>
</div>

<div class="text-center mt-3">
    <p>Don't have an account? <a href="../signup.php">Sign up</a></p>
</div>
