<?php
namespace Core;

use PDO;
use PDOException;
use Config\Config;

class Database {
    private $host = Config::DB_HOST;
    private $user = Config::DB_USER;
    private $pass = Config::DB_PASSWORD;
    private $dbname = Config::DB_NAME;

    private $dbh;  // Database handler
    private $stmt; // Statement handler
    private $error;

    public function __construct() {
        // Set DSN
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );

        // Create PDO instance
        try {
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }

    /**
     * Prepare a statement for execution.
     *
     * @param string $sql SQL query to be prepared.
     */
    public function prepare($sql) {
        $this->stmt = $this->dbh->prepare($sql);
    }

    /**
     * Bind values to the prepared statement.
     *
     * @param string $param Parameter placeholder.
     * @param mixed $value Actual value to be bound.
     * @param null|constant $type PDO::PARAM_* constant (optional).
     */
    public function bind($param, $value, $type = null) {
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }

        $this->stmt->bindValue($param, $value, $type);
    }

    /**
     * Execute the prepared statement.
     *
     * @return bool True on success, false on failure.
     */
    public function execute() {
        return $this->stmt->execute();
    }

    /**
     * Prepare an SQL statement for execution.
     *
     * @param string $sql The SQL statement to be prepared.
     */
    public function query($sql) {
        $this->stmt = $this->dbh->prepare($sql);
    }

    /**
     * Fetch all results from a SELECT statement.
     *
     * @return array An array of result objects.
     */
    public function resultSet() {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Fetch a single result from a SELECT statement.
     *
     * @return object|null A result object or null if not found.
     */
    public function single() {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }

    /**
     * Get the number of rows affected by the last DELETE, INSERT, or UPDATE statement.
     *
     * @return int Number of affected rows.
     */
    public function rowCount() {
        return $this->stmt->rowCount();
    }
}
