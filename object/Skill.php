<?php
/**
 * Created by PhpStorm.
 * User: kryif
 * Date: 14/12/18
 * Time: 18:47
 */

class Skill {
    private $conn;
    private $tablename = "pkmgo_skill";

    public $skillid;
    public $skillname;
    public $skilldesc;

    public function __construct($db){
        $this->conn = $db;
    }

    public function read() {
        $query = "SELECT * FROM "
                    .$this->tablename.
                 " d   
                  ORDER BY
                    d.skill_id
                 ";

        $stmt = $this->conn->prepare($query);

        $stmt->execute();
        return $stmt;
    }

    public function create() {
        $query = "INSERT INTO "
                    .$this->tablename.
                 "   
                  SET 
                    skill_name=:skillname ,
                    skill_desc=:skilldesc 
                 ";

        $stmt = $this->conn->prepare($query);

        $this->skillname = htmlspecialchars(strip_tags($this->skillname));
        $this->skilldesc = htmlspecialchars(strip_tags($this->skilldesc));

        $stmt->bindParam(":skillname", $this->skillname);
        $stmt->bindParam(":skilldesc", $this->skilldesc);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function update() {
        $query = "UPDATE "
                    .$this->tablename.
                "   
                  SET 
                    skill_name=:skillname ,
                    skill_desc=:skilldesc  
                  WHERE 
                    skill_id=:skillid  
                 ";

        $stmt = $this->conn->prepare($query);

        $this->skillid = htmlspecialchars(strip_tags($this->skillid));
        $this->skillname = htmlspecialchars(strip_tags($this->skillname));
        $this->skilldesc = htmlspecialchars(strip_tags($this->skilldesc));

        $stmt->bindParam(":skillid", $this->skillid);
        $stmt->bindParam(":skillname", $this->skillname);
        $stmt->bindParam(":skilldesc", $this->skilldesc);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function delete() {
        $query = "DELETE FROM "
                    .$this->tablename.
                    "   
                  WHERE 
                    skill_id=:skillid  
                 ";

        $stmt = $this->conn->prepare($query);

        $this->skillid = htmlspecialchars(strip_tags($this->skillid));

        $stmt->bindParam(":skillid", $this->skillid);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}

?>