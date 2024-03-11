<?php
include("./app/auth/Auth.php");

$auth = new Auth($pdo);
$page = [];
$page['erro'] = '';

if (isset($_POST['username']) && isset($_POST['password'])) {
    $data = [
        "username" => $_POST['username'],
        "password" => $_POST['password']
    ];

    $auth->login($data);
    $page = $auth->login($data);

    if ($page['bool'] == 1) {
        $p = $page['page'];

        echo "<script> window.location.href = '$p';</script>";
    }
}

?>
<div class="container d-flex justify-content-center">
    <div class="row">
        <div class="card my-5 " style="width: 20rem;">
            <div class=" card-body">
                <h5 class="card-title mb-4">Login</h5>
                <?php
                if ($page['erro']) {
                    echo '<p style="color:red;background-color:pink;padding:5px 10px;font-size:12px;border-radius:5px;">' . $page['erro'] . '</p>';
                }
                ?>
                </p>
                <form method="POST">
                    <label for="username" class="mb-2">Username</label>
                    <input type="text" name="username" id="username" class="w-100 mb-3">

                    <label for="password" class="mb-2">Password</label>
                    <input type="password" name="password" id="password" class="w-100 mb-4">
                    <input type="submit" value="Submit" class="btn btn-primary">
                </form>
                <p class="fs-6 mt-3">Don't have an account? Sign up <span><a href="/?pages=register">here</a></span></p>

            </div>
        </div>
    </div>
</div>