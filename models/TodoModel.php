<?php
// models/TodoModel.php

require_once 'core/Database.php';

class TodoModel
{
    private $conn;
    private $table_name = "todos";

    /**
     * Konstruktor untuk kelas
     * 
     * Metode ini akan membuat objek koneksi PDO ke database
     * yang akan digunakan untuk operasi CRUD
     */
    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    /**
     * Mendapatkan semua todo yang ada di database
     * 
     * @return array|false Sebuah array berisi semua todo atau false jika terjadi kesalahan
     */
    public function getAllTodos()
    {
        try {
            $query = "SELECT * FROM " . $this->table_name . " ORDER BY created_at DESC";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error in getAllTodos: " . $e->getMessage());
            return false;
        }
    }

    /**
     * Membuat todo baru
     * 
     * @param string $task Teks dari tugas
     * @return boolean
     */
    public function createTodo($task)
    {
        try {
            $query = "INSERT INTO " . $this->table_name . " (task) VALUES (:task)";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":task", $task);
            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Error in createTodo: " . $e->getMessage());
            return false;
        }
    }

    /**
     * Memperbarui status todo
     * 
     * @param int $id ID dari todo yang akan diperbarui statusnya
     * @param int $is_completed Status yang akan diperbarui
     * @return boolean
     */
    public function updateTodoStatus($id, $is_completed)
    {
        try {
            $query = "UPDATE " . $this->table_name . " SET is_completed = :is_completed WHERE id = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":is_completed", $is_completed, PDO::PARAM_INT);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Error in updateTodoStatus: " . $e->getMessage());
            return false;
        }
    }

    /**
     * Menghapus todo
     * 
     * @param int $id ID dari todo yang akan dihapus
     * @return boolean
     */
    public function deleteTodo($id)
    {
        try {
            $query = "DELETE FROM " . $this->table_name . " WHERE id = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Error in deleteTodo: " . $e->getMessage());
            return false;
        }
    }
}
