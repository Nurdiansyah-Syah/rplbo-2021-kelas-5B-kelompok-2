<?php
class SuratkeluarModel extends Model {
    function get($id) {
        //Query database
        $sql = "SELECT *
                FROM surat_keluar
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
            $result->kode_surat = '';
            $result->tanggal_keluar = '';
            $result->jenis_surat = '';
            $result->nama_pemohon = '';
        }
        return $result;
    }

    function getAll() {
        //TODO: implementasi paging
        //TODO: implementasi filter

        //Query database
        $sql = "SELECT *
                FROM surat_keluar
                ORDER BY kode_surat";
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

    function save($id) {
        $kode_surat = trim($_REQUEST['kode_surat']) ? $_REQUEST['kode_surat'] : '';
        $tanggal_keluar = trim($_REQUEST['tanggal_keluar']) ? $_REQUEST['tanggal_keluar'] : '';
        $jenis_surat = trim($_REQUEST['jenis_surat']) ? $_REQUEST['jenis_surat'] : '';
        $nama_pemohon = trim($_REQUEST['nama_pemohon']) ? $_REQUEST['nama_pemohon'] : '';
        

        $error = array();
        
        if (count($error) == 0) {
            if ($id == 0) {
                $sql = "INSERT INTO surat_keluar (
                            kode_surat, tanggal_keluar, jenis_surat, nama_pemohon
                        ) VALUES (
                            :kode_surat, :tanggal_keluar, :jenis_surat, :nama_pemohon
                        )";
                $params = array(
                    ':kode_surat' => $kode_surat,
                    ':tanggal_keluar' => $tanggal_keluar,
                    ':jenis_surat' => $jenis_surat,
                    ':nama_pemohon' => $nama_pemohon
                );
            } else {
                //Foto di-update terpisah bergantung ada tidaknya file baru
                $sql = "UPDATE surat_keluar
                        SET kode_surat=:kode_surat, tanggal_keluar=:tanggal_keluar, jenis_surat=:jenis_surat, nama_pemohon=:nama_pemohon
                        WHERE id='".$id."'";
                $params = array(
                    ':kode_surat' => $kode_surat,
                    ':tanggal_keluar' => $tanggal_keluar,
                    ':jenis_surat' => $jenis_surat,
                    ':nama_pemohon' => $nama_pemohon
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

    function delete($id) {
        //Query database
        $sql = "DELETE
                FROM surat_keluar
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