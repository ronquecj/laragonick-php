<?php
include('./app/Email.php');
class Auth
{
    protected $pdo;
    protected $email;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
        $this->email = new Email();
    }

    public function login($data)
    {
        $username = $data['username'];
        $password = $data['password'];

        $sql = "SELECT * FROM user WHERE username='$username'";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch();

        if (!$result)
            return array('erro' => 'Wrong username or password.', 'data' => [], 'bool' => false);

        if ($result['is_verified'] !== 1)
            return array('erro' => 'Your account has not been verified yet!', 'data' => [], 'bool' => false);

        try {
            $verify = password_verify($password, $result['password']);

            if (!$verify)
                return array('erro' => 'Wrong username or password.', 'data' => [], 'bool' => false);

            return array('page' => '/?pages=home', 'bool' => true);
        } catch (\PDOException $e) {
            return array('erro' => 'Wrong user or password.', 'data' => [], 'bool' => false);
        }
    }

    public function register($data)
    {
        $sql = "INSERT INTO `user`(`firstname`, `lastname`, `date_of_birth`, `email`, `username`, `password`, `address`, `role`,`token`) VALUES (?,?,?,?,?,?,?,?,?)";
        $stmt = $this->pdo->prepare($sql);

        $hashedPassword = password_hash($data['password'], PASSWORD_DEFAULT);
        $hashedUsername = password_hash($data['username'], PASSWORD_DEFAULT);

        try {
            $stmt->execute([
                $data['firstname'],
                $data['lastname'],
                $data['date_of_birth'],
                $data['email'],
                $data['username'],
                $hashedPassword,
                $data['address'],
                $data['role'],
                $hashedUsername
            ]);

            if ($stmt) {
                if ($this->email->sendMail($data['email'], 'Email Verification', '<html>You are now verified! <br> Please click <a href="asd.test/?pages=verified&token=' . $hashedUsername . '&v=1&u=' . $data['username'] . '">here</a> to confirm your account. </html>')) {
                    return array('page' => '/?pages=verify-email', 'bool' => true);
                }
            } else {
                echo "<script>alert('Failed to register.');window.location.href = '/?pages=register'</script>";
            }
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function verifyUser($data)
    {
        $sql = "UPDATE `user` SET `is_verified` = 1 WHERE `username` = '" . $data['username'] . "'";
        $stmt = $this->pdo->prepare($sql);

        try {
            $verify = password_verify($data['username'], $data['token']);

            if ($verify) {
                $stmt->execute();

                return true;
            } else {
                return false;
            }
        } catch (\PDOException $e) {
            return $e->getMessage();
        }
    }
}
