<?php

class Review {

    private $id, $category,$firstName, $lastName, $review_text, $rate, $date;

    public function __construct($category, $firstName, $lastName, $review_text, $rate, $date){
        $this->category = $category;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->review_text = $review_text ;
        $this->rate = $rate;
        $this->date = $date;


    }

    public function getID() {
        return $this->id;
    }

    public function setID($value) {
        $this->id = $value;
    }

    public function getCategory() {
        return $this->category;
    }

    public function setCategory($value) {
        $this->category = $value;
    }

    public function getFirstName() {
        return $this->firstName;
    }

    public function setFirstName($value) {
        $this->firstName = $value;
    }

    public function getLastName() {
        return $this->lastName;
    }

    public function setLastName($value) {
        $this->lastName = $value;
    }


    public function getReview() {
        return $this->review_text;
    }

    public function setReview($value) {
        $this->review_text = $value;
    }

    public function getRate() {
        return $this->rate;
    }

    public function setRate($value) {
        $this->rate = $value;
    }

    public function getDate() {
        return $this->date;
    }

    public function setDate($value) {
        $this->date = $value;
    }

    public function getCategoryTitle() {
        return $this->category_title;
    }

    public function setCategoryTitle($value) {
        $this->category_title = $value;
    }



}



class AllReview {

    private $id, $category,$firstName, $lastName, $review_text, $rate, $date, $category_title;

    public function __construct($category, $firstName, $lastName, $review_text, $rate, $date, $category_title){
        $this->category = $category;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->review_text = $review_text ;
        $this->rate = $rate;
        $this->date = $date;
        $this->category_title = $category_title;



    }

    public function getID() {
        return $this->id;
    }

    public function setID($value) {
        $this->id = $value;
    }

    public function getCategory() {
        return $this->category;
    }

    public function setCategory($value) {
        $this->category = $value;
    }

    public function getFirstName() {
        return $this->firstName;
    }

    public function setFirstName($value) {
        $this->firstName = $value;
    }

    public function getLastName() {
        return $this->lastName;
    }

    public function setLastName($value) {
        $this->lastName = $value;
    }


    public function getReview() {
        return $this->review_text;
    }

    public function setReview($value) {
        $this->review_text = $value;
    }

    public function getRate() {
        return $this->rate;
    }

    public function setRate($value) {
        $this->rate = $value;
    }

    public function getDate() {
        return $this->date;
    }

    public function setDate($value) {
        $this->date = $value;
    }

    public function getCategoryTitle() {
        return $this->category_title;
    }

    public function setCategoryTitle($value) {
        $this->category_title = $value;
    }



}