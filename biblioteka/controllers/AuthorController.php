<?php
include "../../models/Author.php";
class AuthorController {

    public static function all() {

        return Author::all();
    }

    public function create() {

    }

    public static function store() {
        $author = new Author();
        $author->name = $_POST['name'];
        $author->surname = $_POST['surname'];
        $author->save();
    }

    public static function find($id) {
        
        return Author::find($id);
    }

    public function edit() {

    }

    public static function update() {
        $author = new Author();
        $author->id = $_POST['id'];
        $author->name = $_POST['name'];
        $author->surname = $_POST['surname'];
        $author->update();
    }

    public static function destroy() {

        Author::destroy();
    }
}
?>