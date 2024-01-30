<?php

include "../../models/Author.php";

class Book {
    public $id;
    public $title;
    public $genre;
    public $authorId;
    public $author;

    function __construct($id = 0, $title = "", $genre = "", $authorId = 0, $author = false) {
        $this->id = $id;
        $this->title = $title;
        $this->genre = $genre;
        $this->authorId = $authorId;
        $this->author = !$author ? new Author() : $author;
    }

    public static function all() {
        
        $db = new mysqli("localhost", "root", "", "library");
        $sql = "SELECT
            b.id, title, genre, author_id, name, surname 
        FROM 
            `books` b
        join author a ON 
            a.id = b.author_id";
        $result = $db->query($sql);
        $books = [];
        while ($row = $result->fetch_assoc()) {
            $books[] = new Book($row['id'], $row['title'], $row['genre'], $row['author_id'], new Author($row['author_id'], $row['name'], $row['surname']));
        }
        $db->close();
        return $books;
    }

    public static function find($id) {
        
        $db = new mysqli("localhost", "root", "", "library");
        $sql = "SELECT * FROM books WHERE `id` = ?";
        $stmt = $db->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        $book = new Book();
        while ($row = $result->fetch_assoc()) {
            $books[] = new Book($row['id'], $row['title'], $row['genre'], $row['author_id']);
        }
        $db->close();
        return $book;
    }

    public function update() {
        $db = new mysqli("localhost", "root", "", "library");
        $sql = "UPDATE `books` SET `title`=?,`genre`=? ,`author_id`=? WHERE `id` = ?";
        $stmt = $db->prepare($sql);
        $stmt->bind_param("ssii",$this->title,$this->genre,$this->authorId,$this->id);
        $stmt->execute();
        $db->close();
    }

    public function save() {
        $db = new mysqli("localhost", "root", "", "library");
        $sql = "INSERT INTO `books` (`title`, `genre`, `author_id`) VALUES (?,?,?)";
        $stmt = $db->prepare($sql);
        $stmt->bind_param("ssi",$this->title,$this->genre,$this->authorId);
        $stmt->execute();
        echo "Error: " . mysqli_error($db);
        $db->close();
        die;
    }

    public static function destroy() {
        $db = new mysqli("localhost", "root", "", "library");
        $sql = "DELETE FROM `books` WHERE `id` = ?";
        $stmt = $db->prepare($sql);
        $stmt->bind_param("i", $_POST['id']);
        $stmt->execute();
        $db->close();
      
    }
}

?>

