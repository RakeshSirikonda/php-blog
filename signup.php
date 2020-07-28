<?php
require('config/config.php');
require('config/db.php');

if (isset($_POST['submit'])) {
    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $age = mysqli_real_escape_string($conn, $_POST['age']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm password']);

    $fullname = $firstname . ' ' . $lastname;
    echo $fullname;

    $query = "INSERT INTO users(name, username, email, age, password) VALUES('$fullname', '$username', '$email', '$age', '$password')";
    if (mysqli_query($conn, $query)) {
        header('Location: ' . ROOT_URL . '/signin.php');
    } else {
        echo 'ERROR: ' . mysqli_error($conn);
    }
}
?>

<?php include('inc/header.php') ?>

<div class="container d-flex justify-content-center ">
    <div class="col-md-8 order-md-1">
        <h4 class="mb-3">Registration</h4>
        <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" class="needs-validation align-middle" novalidate>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="firstName">First name</label>
                    <input type="text" name="firstname" class="form-control" id="firstName" placeholder="" value="" required>
                    <div class="invalid-feedback">
                        Valid first name is required.
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="lastName">Last name</label>
                    <input type="text" name="lastname" class="form-control" id="lastName" placeholder="" value="" required>
                    <div class="invalid-feedback">
                        Valid last name is required.
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="username">Username</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">@</span>
                    </div>
                    <input type="text" name="username" class="form-control" id="username" placeholder="Username" required>
                    <div class="invalid-feedback" style="width: 100%;">
                        Your username is required.
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="you@example.com">
                <div class="invalid-feedback">
                    Please enter a valid email address for shipping updates.
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="" value="" required>
                    <div class="invalid-feedback">
                        Valid password is required.
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="confirm password">Confirm Password</label>
                    <input type="password" name="confirm password" class="form-control" id="confirm password" placeholder="" value="" required>
                    <div class="invalid-feedback">
                        Valid confirm password is required.
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="age">Age</span></label>
                <input type="number" name="age" class="form-control" id="age" placeholder="eg. 21">
                <div class="invalid-feedback">
                    Please enter a valid numbers.
                </div>
            </div>
            <button class="btn btn-primary btn-lg btn-block" name="submit" type="submit">Continue to SignUp</button>
        </form>
    </div>
</div>

<?php include 'inc/footer.php' ?>