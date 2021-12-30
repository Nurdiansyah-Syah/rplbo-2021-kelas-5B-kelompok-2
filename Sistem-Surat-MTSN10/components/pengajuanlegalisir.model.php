<?php
class PengajuanlegalisirModel extends Model
{
    function get($id)
    {
        //Query database
        $sql = "SELECT *
                FROM pengajuan_legalisir
                WHERE id=:id";
        $params = array(
            ':id' => $id
        );
        $result = null;
        try {
            $sth = $this->connection->prepare($sql);
            $sth->setFetchMode(PDO::FETCH_OBJ);
            $sth->execute($params);
            $result = $sth->fetch();
            $sth->closeCursor();
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            exit();
        }
        if (!$result) {
            $result = new stdClass();
            $result->id = 0;
            $result->nisn = '';
            $result->nama = '';
            $result->email = '';
        }
        return $result;
    }

    function getAll()
    {
        //TODO: implementasi paging
        //TODO: implementasi filter

        //Query database
        $sql = "SELECT *
                FROM pengajuan_legalisir
                ORDER BY nama";
        $params = array();
        $result = array();
        try {
            $sth = $this->connection->prepare($sql);
            $sth->setFetchMode(PDO::FETCH_OBJ);
            $sth->execute($params);
            while (($obj = $sth->fetch()) == true) {
                $result[] = $obj;
            }
            $sth->closeCursor();
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            exit();
        }
        return $result;
    }

    function save($id)
    {
        $nisn = trim($_REQUEST['nisn']) ? $_REQUEST['nisn'] : '';
        $nama = trim($_REQUEST['nama']) ? $_REQUEST['nama'] : '';
        $email = trim($_REQUEST['email']) ? $_REQUEST['email'] : '';


        $error = array();

        if (count($error) == 0) {
            if ($id == 0) {
                $sql = "INSERT INTO pengajuan_legalisir (
                            nisn, nama, email
                        ) VALUES (
                            :nisn, :nama, :email
                        )";
                $params = array(
                    ':nisn' => $nisn,
                    ':nama' => $nama,
                    ':email' => $email
                );
            } else {
                //Foto di-update terpisah bergantung ada tidaknya file baru
                $sql = "UPDATE pengajuan_legalisir
                        SET nisn=:nisn, nama=:nama, email=:email,
                        WHERE id='" . $id . "'";
                $params = array(
                    ':nisn' => $nisn,
                    ':nama' => $nama,
                    ':email' => $email
                );
            }
            try {
                $sth = $this->connection->prepare($sql);
                $sth->setFetchMode(PDO::FETCH_OBJ);
                $sth->execute($params);
                $sth->closeCursor();

                $id = $this->connection->lastInsertId();
            } catch (PDOException $ex) {
                echo $ex->getMessage();
                exit();
            }
        }

        return $error;
    }
}