<?php
     
    class Sprint extends Db{
        
        private $sprint_id;
        private $project_id;
        private $sprint_name;
        private $start_date;
        private $end_date;
        private $created_by;
        function __construct($project_id, $sprint_name, $start_date, $end_date, $created_by)
        {
           $this->project_id = $project_id;
           $this->sprint_name = $sprint_name;
           $this->start_date = $start_date;
           $this->end_date = $end_date;
           $this->created_by = $created_by;
        }

        function add(){
            $query = "INSERT INTO sprints (project_id, sprint_name, start_date, end_date, created_by) VALUES (? , ? , ? , ? , ?)";
            $stmt = $this->connection()->prepare($query);
            $stmt->execute([$this->project_id, $this->sprint_name, $this->start_date, $this->end_date, $this->created_by]);
        }

        function showall(){
            $query = "SELECT sprints.*, user.username, projects.project_name FROM sprints JOIN user ON created_by = user_id JOIN projects ON sprints.project_id = projects.project_id";
            $stmt = $this->connection()->query($query);
            $found = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $found;
        }

        function amount($project_id){
            $query = "SELECT COUNT(*) AS amount FROM sprints  WHERE project_id = ?";
            $stmt = $this->connection()->prepare($query);
            $stmt->execute([$project_id]);
            $found = $stmt->fetch(PDO::FETCH_ASSOC);
            return $found;
        }
        function amounts(){
            $query = "SELECT COUNT(*) AS amount FROM sprints";
            $stmt = $this->connection()->query($query);
            $found = $stmt->fetch(PDO::FETCH_ASSOC);
            return $found;
        }

        function showsome($project_id){
            $query = "SELECT sprints.*, user.username, projects.project_name FROM sprints JOIN user ON created_by = user_id JOIN projects ON sprints.project_id = projects.project_id WHERE sprints.project_id = ?";
            $stmt = $this->connection()->prepare($query);
            $stmt->execute([$project_id]);
            $found = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $found;
        }

        function deletesprint($sprint_id){
            $query = "DELETE FROM sprints WHERE sprint_id = ?";
            $stmt = $this->connection()->prepare($query);
            $stmt->execute([$sprint_id]);
        }
    }
    ?>