<?php

class Event {
    private $id, $title,$location, $description, $date, $image;

    public function __construct( $title, $location, $description, $date, $image) {
        $this->title = $title;
        $this->location = $location;
        $this->description = $description;
        $this->date = $date;
        $this->image = $image;

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

    public function getLocation() {
        return $this->location;
    }

    public function setLocation($value) {
        $this->location = $value;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setDescription($value) {
        $this->description = $value;
    }

    public function getDate() {
        return $this->date;
    }

    public function setDate($value) {
        $this->date = $value;
    }


    public function getImage() {
        return $this->image;
    }
    public function getImagePath(){
        $image_path = '../uploads/event/'.$this->getImage();
        return $image_path;
    }

    public function setImage($value) {
        $this->image = $value;
    }



}

