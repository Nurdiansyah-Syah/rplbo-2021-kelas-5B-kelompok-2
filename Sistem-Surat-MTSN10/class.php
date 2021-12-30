<?php
class Configuration {
    public static $siteUrl = 'http://localhost/Sistem-Surat-MTSN10';
    public static $serverPath = '/Applications/XAMPP/xamppfiles/htdocs/Sistem-Surat-MTSN10';
    public static $uploadPath = '/Applications/XAMPP/xamppfiles/htdocs/Sistem-Surat-MTSN10/uploads';

    public static $sessionName = 'Sistem-Surat-MTSN10';

    public static $databaseName = 'db_mtsn10';
    public static $databaseHost = 'localhost';
    public static $databasePort = 3306;
    public static $databaseUsername = 'root';
    public static $databasePassword = '';
}

class Database {
    private $connection;

    public function __construct() {
        try {
            $this->connection = new PDO("mysql:host=".Configuration::$databaseHost.";port=".Configuration::$databasePort.";dbname=".Configuration::$databaseName, Configuration::$databaseUsername, Configuration::$databasePassword, array());
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $ex) {
            echo 'Connection failed: '.$ex->getMessage();
            exit();
        }
    }

    //INSERT, UPDATE, DELETE
    public function query($sql, $params = array()) {
        $affectedRows = 0;
        try {
            $stmt = $this->connection->prepare($sql);
            if (count($params) > 0) {
                $stmt->execute($params);
            } else {
                $stmt->execute();
            }
            $affectedRows = $stmt->rowCount();
            $stmt->closeCursor();
        } catch (PDOException $ex) {
            echo '<p>'.$ex->getMessage().' in query : '.$sql.'</p>';
        }
        return $affectedRows;
    }

    //SELECT one record
    public function queryObject($sql, $params = array()) {
        $result = null;
        try {
            $stmt = $this->connection->prepare($sql);
            $stmt->setFetchMode(PDO::FETCH_OBJ);
            if (count($params) > 0) {
                $stmt->execute($params);
            } else {
                $stmt->execute();
            }
            $result = $stmt->fetch();
            $stmt->closeCursor();
        } catch (PDOException $ex) {
            echo '<p>'.$ex->getMessage().' in query : '.$sql.'</p>';
        }
        return $result;
    }

    //SELECT multiple records
    public function queryArrayOfObject($sql, $params = array()) {
        $result = array();
        try {
            $stmt = $this->connection->prepare($sql);
            $stmt->setFetchMode(PDO::FETCH_OBJ);
            if (count($params) > 0) {
                $stmt->execute($params);
            } else {
                $stmt->execute();
            }
            while (($obj = $stmt->fetch()) == true) {
                $result[] = $obj;
            }
            $stmt->closeCursor();
        } catch (PDOException $ex) {
            echo '<p>'.$ex->getMessage().' in query : '.$sql.'</p>';
        }
        return $result;
    }
}

class Application {
    private $component;
    private $option;
    private $id;

    private $connection;

    public function __construct() {
        //Start session
        session_name(Configuration::$sessionName);
		session_start();

        //Connect to database
		$this->connection = new Database();

        //Get URL query
        $this->component = isset($_REQUEST['component']) ? $_REQUEST['component'] : 'Beranda';
        $this->option = isset($_REQUEST['option']) ? $_REQUEST['option'] : 'index';
        $this->id = isset($_REQUEST['id']) ? intval($_REQUEST['id']) : 0;
    }

    public function loadController() {
        $path = Configuration::$serverPath."/components/".strtolower($this->component).".php";
		if (file_exists($path)) {
			require_once($path);

            $className = $this->component.'Controller';
            $methodName = $this->option;
            
            //Over simplified, check typo, unknown class name, and unknown method name
            $controller = new $className();
            
            $reflection = new ReflectionMethod($className, $methodName);
            $hasId = false;
            foreach ($reflection->getParameters() as $argument) {
                if ($argument->getName() == 'id') {
                    $hasId = true;
                }
            }

            if ($hasId) {
                $controller->{$methodName}($this->id);
            } else {
                $controller->{$methodName}();
            }
        }

        $html = ob_get_contents();
        ob_clean();

        return $html;
    }

    public function setComponent($component) {
        $this->component = $component;
    }

    public function getComponent() {
        return $this->component;
    }

    public function setOption($option) {
        $this->option = $option;
    }

    public function getOption() {
        return $this->option;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }

    public function getConnection() {
        return $this->connection;
    }
}