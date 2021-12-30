<?php
class SuratmasukModel extends Model
{
    function get($id)
    {
        //Query database
        $sql = "SELECT *
                FROM pengajuan_surat
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
            $result->jenis_surat = '';
        }
        return $result;
    }

    function getAll()
    {
        //TODO: implementasi paging
        //TODO: implementasi filter

        //Query database
        $sql = "SELECT *
                FROM pengajuan_surat
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
        $jenis_surat = trim($_REQUEST['jenis_surat']) ? $_REQUEST['jenis_surat'] : '';


        $error = array();

        if (count($error) == 0) {
            if ($id == 0) {
                $sql = "INSERT INTO pengajuan_surat (
                            nisn, nama, email, jenis_surat
                        ) VALUES (
                            :nisn, :nama, :email, :jenis_surat
                        )";
                $params = array(
                    ':nisn' => $nisn,
                    ':nama' => $nama,
                    ':email' => $email,
                    ':jenis_surat' => $jenis_surat
                );
            } else {
                //Foto di-update terpisah bergantung ada tidaknya file baru
                $sql = "UPDATE pengajuan_surat
                        SET nisn=:nisn, nama=:nama, email=:email, jenis_surat=:jenis_surat
                        WHERE id='" . $id . "'";
                $params = array(
                    ':nisn' => $nisn,
                    ':nama' => $nama,
                    ':email' => $email,
                    ':jenis_surat' => $jenis_surat
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

    function delete($id)
    {
        //Query database
        $sql = "DELETE
                FROM pengajuan_surat
                WHERE id=:id";
        $params = array(
            ':id' => $id
        );
        $rowCount = 0;
        try {
            $sth = $this->connection->prepare($sql);
            $sth->setFetchMode(PDO::FETCH_OBJ);
            $sth->execute($params);
            $rowCount = $sth->rowCount();
            $sth->closeCursor();
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            exit();
        }
        return $rowCount;
    }
}
