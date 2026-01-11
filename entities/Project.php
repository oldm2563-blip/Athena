<?php
class Project extends Db
{
    private $project_id;
    private $project_name;
    private $project_type;
    private $created_by;
    private $status;

    function __construct($project_name, $project_type, $created_by, $status = true)
    {
        $this->project_name = $project_name;
        $this->project_type = $project_type;
        $this->created_by = $created_by;
        $this->status = $status;
    }

    function add()
    {
        $query = "INSERT INTO projects (project_name, project_type, created_by, is_active) VALUES (? , ? , ? , ?)";
        $stmt = $this->connection()->prepare($query);
        $stmt->execute([$this->project_name, $this->project_type, $this->created_by, $this->status]);
    }

    function showall()
    {
        $query = "SELECT projects.*, user.username FROM projects JOIN user ON created_by = user_id";
        $stmt = $this->connection()->query($query);
        $found = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $found;
    }

    function showone($project_id)
    {
        $query = "SELECT * FROM projects WHERE project_id = ?";
        $stmt = $this->connection()->prepare($query);
        $stmt->execute([$project_id]);
        $found = $stmt->fetch(PDO::FETCH_ASSOC);
        return $found;
    }


    public function amount()
    {
        $queryy = "SELECT COUNT(*) AS amount FROM projects";
        $stmt = self::connection()->query($queryy);
        $found = $stmt->fetch(PDO::FETCH_ASSOC);
        return $found;
    }

    public function changeactivation($active, $id)
    {
        $queryy = "UPDATE projects SET is_active = ? WHERE project_id = ?";
        $stmt = self::connection()->prepare($queryy);
        $stmt->execute([$active, $id]);
    }

    public function searchByTitle($title)
    {
        $db = Db::connection();
        $stmt = $db->prepare("SELECT p.*, u.username FROM projects p 
                          JOIN user u ON p.created_by = u.user_id 
                          WHERE p.project_name LIKE ?");
        $stmt->execute(["%$title%"]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
