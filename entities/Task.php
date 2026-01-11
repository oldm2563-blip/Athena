<?php

    class Task extends Db{
        private $task_id;
        private $sprint_id;
        private $task_name;
        private $description;
        private $status;
        private $priority;
        private $assigned_to;
        private $created_by;
        
        public function __construct($task_name,$sprint_id, $description = "", $status, $priority, $created_by, $assigned_to)
        {
            $this->task_name = $task_name;
            $this->sprint_id = $sprint_id;
            $this->description = $description;
            $this->status = $status;
            $this->priority = $priority;
            $this->assigned_to = $assigned_to;
            $this->created_by = $created_by;
            
        }

        public function add(){
            $query = "INSERT INTO tasks (title, sprint_id, description, status, priority, assigned_to, created_by) VALUES (? , ? , ? , ? , ? , ? , ?)";
            $stmt = $this->connection()->prepare($query);
            $stmt->execute([$this->task_name, $this->sprint_id, $this->description, $this->status, $this->priority, $this->assigned_to, $this->created_by]);
        }

        public function showall($sprint_id ,$userid){
            $query = "SELECT * FROM tasks JOIN user ON user_id = created_by WHERE sprint_id = ? AND assigned_to = ? ";
            $stmt = $this->connection()->prepare($query);
            $stmt->execute([$sprint_id ,$userid]);
            $found = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $found;
        }
         public function count(){
            $query = "SELECT COUNT(*) AS amount FROM tasks";
            $stmt = $this->connection()->query($query);
            $found = $stmt->fetch(PDO::FETCH_ASSOC);
            return $found;
        }

        public function showone($task_id){
            $query = "SELECT * FROM tasks WHERE task_id = ?";
            $stmt = $this->connection()->prepare($query);
            $stmt->execute([$task_id]);
            $found = $stmt->fetch(PDO::FETCH_ASSOC);
            return $found;
        }

        public function deletetask($task_id){
            $query = "DELETE FROM tasks WHERE task_id = ?";
            $stmt = $this->connection()->prepare($query);
            $stmt->execute([$task_id]);
        }

        public function edit($task_id){
            $query = "UPDATE tasks SET title = ?, description = ?, status = ?, priority = ? WHERE task_id = ?";
            $stmt = $this->connection()->prepare($query);
            $stmt->execute([$this->task_name, $this->description, $this->status, $this->priority, $task_id]);
        }
    }
    ?>