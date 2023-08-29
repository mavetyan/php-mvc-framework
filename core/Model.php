<?php
namespace Core;

use PDO;
use PDOException;
use Core\Database;

abstract class Model {
    protected $db;

    public function __construct() {
        $this->db = new Database();
    }

    /**
     * Execute a SELECT query and return all results.
     *
     * @param string $query The SQL query to execute.
     * @param array $bindings Optional parameter bindings.
     * @return array An array of result objects.
     */
    protected function selectAll($query, $bindings = []) {

        try {
            $stmt = $this->db->prepare($query);
            foreach ($bindings as $key => $value) {
                $stmt->bindValue($key, $value);
            }
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            // TODO: log the error and return a user-friendly message
            return ["error" => $e->getMessage()];
        }        
    }

    /**
     * Execute a SELECT query and return a single result.
     *
     * @param string $query The SQL query to execute.
     * @param array $bindings Optional parameter bindings.
     * @return object|null A result object or null if not found.
     */
    protected function selectOne($query, $bindings = []) {
        try {
            $stmt = $this->db->prepare($query);
            foreach ($bindings as $key => $value) {
                $stmt->bindValue($key, $value);
            }
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            // TODO: log the error and return a user-friendly message
            return ["error" => $e->getMessage()];
        }   
    }

    // ... additional CRUD methods as needed ...

}