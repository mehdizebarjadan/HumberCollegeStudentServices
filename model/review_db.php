<?php
class ReviewDB {
    //use category and Review class
    //four static method
    public static function getReviews()
    {
        $db = Database::getDB();
        $query = 'SELECT * FROM review';
        $result = $db->query($query);
        $reviews = array();
        foreach ($result as $row) {
            $review = new review($row['category_id'],$row['first_name'], $row['last_name'], $row['review_text'], $row['rate'], $row['date']);
            $review->setID($row['id']);
            $reviews[] = $review;
        }
        return $reviews;
    }

    public static function getAllReviews()
    {
        $db = Database::getDB();
        $query = 'SELECT * FROM review Re JOIN category Ca ON Re.category_id = Ca.id ORDER BY Re.id';
        $result = $db->query($query);
        $reviews = array();
        foreach ($result as $row) {
            $review = new AllReview($row['category_id'],$row['first_name'], $row['last_name'], $row['review_text'], $row['rate'], $row['date'], $row['title']);
            $review->setID($row['id']);
            $reviews[] = $review;
        }
        return $reviews;
    }

    //get category_id
    //uses categoryDB method getCategory
    public static function getReviewByCategory($category_id) {
        $db = Database::getDB();

        $category = CategoryDB::getCategory($category_id);
        //select review in category
        $query = "SELECT * FROM products
                  WHERE category_id = '$category_id'
                  ORDER BY id";
        $result = $db->query($query);
        //create review array
        $reviews = array();
        //for each row in the result, create review object
        foreach ($result as $row) {
            $review = new Review($category, //store category object
                $row['first_name'],
                $row['last_name'],
                $row['review_text'],
                $row['rate'],
                $row['date']);
            $review->setID($row['productID']);
            //append the product object to review array
            $reviews[] = $review;
        }
        return $reviews;
    }

    //accept review id
    public static function getReviewById($review_id) {
        $db = Database::getDB();
        $query = "SELECT * FROM review
                  WHERE id = '$review_id'";
        $result = $db->query($query);
        //convert result into array
        $row = $result->fetch();
        //create category object
        //$category = CategoryDB::getCategory($row['category_id']);
        $review = new Review($row['category_id'],
            $row['first_name'],
            $row['last_name'],
            $row['review_text'],
            $row['rate'],
            $row['date']);
        $review->setID($row['id']);
        return $review;
    }

    public static function deleteReview($review_id) {
        $db = Database::getDB();
        $query = "DELETE FROM review
                  WHERE id = '$review_id'";
        $row_count = $db->exec($query);
        return $row_count;
    }

    public static function addReview($review) {
        $db = Database::getDB();

        $category_id = $review->getCategory();
        $firstName = $review->getFirstName();
        $lastName = $review->getLastName();
        $reviewText = $review->getReview();
        $rate = $review->getRate();
        $date = $review->getDate();

        $query =
            "INSERT INTO review
                 (category_id, first_name, last_name, review_text, rate, date)
             VALUES
                 ('$category_id','$firstName','$lastName', '$reviewText', '$rate', '$date')";

        $row_count = $db->exec($query);
        return $row_count;
    }
}
?>