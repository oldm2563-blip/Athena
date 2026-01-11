<?php

    class Comment extends Db{
        private $task_id;
        private $content;

        public function __construct($task_id, $content)
        {
            $this->task_id = $task_id;
            $this->content = $content;
            
        }

        public function add(){
            $query = "INSERT INTO comments (task_id, content) VALUES (? , ?)";
            $stmt = $this->connection()->prepare($query);
            $stmt->execute([$this->task_id, $this->content]);
        }

        public function showall($task_id ){
            $query = "SELECT * FROM comments WHERE task_id = ? ";
            $stmt = $this->connection()->prepare($query);
            $stmt->execute([$task_id]);
            $found = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $found;
        }
    }
?>