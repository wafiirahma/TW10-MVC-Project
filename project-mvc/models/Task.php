<?php
class Task {
    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=mvc_project', 'root', '');
    }

    public function getAll() {
        $stmt = $this->db->query("SELECT * FROM tasks");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($title) {
        $stmt = $this->db->prepare("INSERT INTO tasks (title) VALUES (:title)");
        return $stmt->execute(['title' => $title]);
    }

    public function find($id) {
        $stmt = $this->db->prepare("SELECT * FROM tasks WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $title) {
        $stmt = $this->db->prepare("UPDATE tasks SET title = :title WHERE id = :id");
        return $stmt->execute(['title' => $title, 'id' => $id]);
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM tasks WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }

    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM tasks WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }    
}
?>