<?php

class Author {
    public $id;
    public $name;
    public $surname;

    function __construct($id = 0, $name = "", $surname = "") {
        $this->id = $id;
        $this->name = $name;
        $this->surname = $surname;
    }

    public static function all() {
        
        $db = new mysqli("localhost", "root", "", "library");
        $sql = "SELECT * FROM author";
        $result = $db->query($sql);
        $authors = [];
        while ($row = $result->fetch_assoc()) {
            $authors[] = new Author($row['id'], $row['name'], $row['surname']);
        }
        $db->close();
        return $authors;
    }

    public static function find($id) {
        
        $db = new mysqli("localhost", "root", "", "library");
        $sql = "SELECT * FROM author WHERE `id` = ?";
        $stmt = $db->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        $author = new Author();
        while ($row = $result->fetch_assoc()) {
            $author = new Author($row['id'], $row['name'], $row['surname']);
        }
        $db->close();
        return $author;
    }

    public function update() {
        $db = new mysqli("localhost", "root", "", "library");
        $sql = "UPDATE `author` SET `name`=?,`surname`=? WHERE `id` = ?";
        $stmt = $db->prepare($sql);
        $stmt->bind_param("ssi",$this->name,$this->surname,$this->id);
        $stmt->execute();
        $db->close();
    }

    public function save() {
        $db = new mysqli("localhost", "root", "", "library");
        $sql = "INSERT INTO `author` (`name`, `surname`) VALUES (?,?)";
        $stmt = $db->prepare($sql);
        $stmt->bind_param("ss",$this->name,$this->surname);
        $stmt->execute();
        $db->close();
    }

    public static function destroy() {
        $db = new mysqli("localhost", "root", "", "library");
        $sql = "DELETE FROM `author` WHERE `id` = ?";
        $stmt = $db->prepare($sql);
        $stmt->bind_param("i", $_POST['id']);
        $stmt->execute();
        $db->close();
      
    }
}

?>

