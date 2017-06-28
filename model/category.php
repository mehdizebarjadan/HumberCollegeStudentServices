<?php
class Category {
    private $id;
    private $title;

    public function __construct($id, $title) {
        $this->id = $id;
        $this->title = $title;
    }

    public function getID() {
        return $this->id;
    }

    public function setID($value) {
        $this->id = $value;
    }

    public function getTitle() {
        return $this->title;
    }

    public function setTitle($value) {
        $this->title = $value;
    }
}
?>