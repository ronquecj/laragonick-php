<?php
include("./app/auth/Auth.php");

$auth = new Auth($pdo);

if (isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['date_of_birth']) && isset($_POST['email']) && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['address']) && isset($_POST['role'])) {
    $data = [
        "firstname" => $_POST['firstname'],
        "lastname" => $_POST['lastname'],
        "date_of_birth" => $_POST['date_of_birth'],
        "email" => $_POST['email'],
        "username" => $_POST['username'],
        "password" => $_POST['password'],
        "address" => $_POST['address'],
        "role" => $_POST['role'],
    ];

    $d = $auth->register($data);

    print_r($d);

    if ($d['bool'] == 1) {
        $p = $d['page'];

        echo "<script> window.location.href = '$p';</script>";
    }
}
?>

<div class="container d-flex justify-content-center">
    <div class="row">
        <div class="card my-5">
            <div class=" card-body">
                <h5 class="card-title mb-4">Register</h5>
                <form method="POST">
                    <div class="row gap-3 mb-4">
                        <div class="col">
                            <label for="firstname" class="mb-2">Firstname</label>
                            <input type="text" name="firstname" id="firstname" class="w-100 mb-3" required>
                            <label for="lastname" class="mb-2">Lastname</label>
                            <input type="text" name="lastname" id="lastname" class="w-100 mb-3" required>
                            <label for="date_of_birth" class="mb-2">Date of birth</label>
                            <input type="date" name="date_of_birth" id="date_of_birth" class="w-100 " required>
                        </div>
                        <div class=" col">
                            <label for="email" class="mb-2">Email</label>
                            <input type="text" name="email" id="email" class="w-100 mb-3" required>
                            <label for="username" class="mb-2">Username</label>
                            <input type="text" name="username" id="username" class="w-100 mb-3" required>
                            <label for="password" class="mb-2">Password</label>
                            <input type="password" name="password" id="password" class="w-100" required>
                        </div>
                        <div class="col">
                            <label for="address" class="mb-2">Address</label>
                            <input type="text" name="address" id="address" class="w-100 mb-3" required <label for="role"
                                class="mb-2">Role</label>
                            <input type="text" name="role" id="role" class="w-100 mb-3" required>
                        </div>
                    </div>
                    <input type="submit" value="submit" class="btn btn-primary mb-2">
                </form>
                <p class="fs-6 mt-3">Already have an account? Login <span><a href="/?pages=login">here</a></span></p>
            </div>
        </div>
    </div>
</div>