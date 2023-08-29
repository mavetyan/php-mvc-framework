<?php

namespace App\Models;

use Core\Model;

class User extends Model {
    private $db;
    /**
     * The parent Model class has already instantiated the Database class.
     */

    /**
     * Fetch all users from the database.
     * 
     * @return array An array of user objects.
     */
    public function getAllUsers() {
        $query = "SELECT * FROM users";
        $this->db->query($query);
        return $this->db->resultSet();
    }

    /**
     * Fetch a single user from the database by their ID.
     * 
     * @param int $id The ID of the user.
     * @return object|null A user object or null if not found.
     */
    public function getUserById($id) {
        $query = "SELECT * FROM users WHERE id = :id";
        $this->db->query($query);
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    /**
     * Add a new user to the database.
     * 
     * @param array $data An associative array containing 'name' and 'email'.
     * @return bool True on success, false on failure.
     */
    public function addUser($data) {
        $query = "INSERT INTO users (name, email) VALUES (:name, :email)";
        $this->db->query($query);
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);
        return $this->db->execute();
    }

    /**
     * Update an existing user's details in the database.
     * 
     * @param array $data An associative array containing 'id', 'name', and 'email'.
     * @return bool True on success, false on failure.
     */
    public function updateUser($data) {
        $query = "UPDATE users SET name = :name, email = :email WHERE id = :id";
        $this->db->query($query);
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':id', $data['id']);
        return $this->db->execute();
    }

    /**
     * Delete a user from the database by their ID.
     * 
     * @param int $id The ID of the user to be deleted.
     * @return bool True on success, false on failure.
     */
    public function deleteUser($id) {
        $query = "DELETE FROM users WHERE id = :id";
        $this->db->query($query);
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }
}