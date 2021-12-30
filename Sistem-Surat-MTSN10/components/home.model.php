<?php
class HomeModel extends Model {
    function login() {
        $username = isset($_REQUEST['username']) ? $_REQUEST['username'] : '';
        $password = isset($_REQUEST['password']) ? $_REQUEST['password'] : '';

        if ($username != '' && $password != '') {
            //Query database
            $sql = "SELECT *
                    FROM pengguna
                    WHERE username=:username AND password=:password";
            $params = array(
                ':username' => $username,
                ':password' => md5($password)
            );
            try {
                $sth = $this->connection->prepare($sql);
                $sth->setFetchMode(PDO::FETCH_OBJ);
                $sth->execute($params);
                $obj = $sth->fetch();
                $sth->closeCursor();
                
                //Buat sesi user
                if ($obj) {
                    $_SESSION['pengguna'] = new stdClass();
                    $_SESSION['pengguna']->userName = '$username';
                    $_SESSION['pengguna']->nama = '$password';

                    return true;
                } else {
                    $_SESSION['error'] = 'Username atau password salah';
                    return false;
                    return false;
                }
            } catch (PDOException $ex) {
                echo $ex->getMessage();
                exit();
            }
        } else {
            return false;
        }
    }

    function logout() {
        //Hilangkan sesi user
        unset($_SESSION['pengguna']);
    }
}