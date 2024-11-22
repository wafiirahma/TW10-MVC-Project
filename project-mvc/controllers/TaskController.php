<?php
require_once 'models/Task.php';

class TaskController {
    private $taskModel;

    public function __construct() {
        $this->taskModel = new Task();
    }

    public function index() {
        $tasks = $this->taskModel->getAll();
        require 'views/tasks/index.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title']; // Ambil data dari form
            $this->taskModel->create($title); // Simpan ke database
            header('Location: /project-mvc/TaskController/index'); // Redirect ke halaman utama
            exit;
        } else {
            require 'views/tasks/create.php';
        }
    }    

    public function edit($id = null) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Simpan data yang diperbarui
            $title = $_POST['title'];
            $this->taskModel->update($id, $title);
            header('Location: /project-mvc/TaskController/index');
            exit;
        } else {
            // Tampilkan form edit
            $task = $this->taskModel->getById($id);
            require 'views/tasks/edit.php';
        }
    }    

    public function delete($id = null) {
        if ($id) {
            $this->taskModel->delete($id);
            header('Location: /project-mvc/TaskController/index');
            exit;
        }
    }    
}
?>