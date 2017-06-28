<?php
include "adminHeader.php";
include 'adminNav.php';

require '../model/database.php';
require '../model/review.php';
require '../model/review_db.php';
require '../model/category.php';
require '../model/categoryDB.php';

if (isset($_GET['id'])) {
    $review_id = $_GET['id'];
}
$Review = ReviewDB::getReviewById($review_id);
?>

<div class="container clearfix">
    <br/>
    <article class="placeholder">
        <a href="review.php" class="btn btn-primary">Back To List Of Reviews</a>
    </article>
    <br/> <br/>

    <section class="heading">
        <h2><?php echo $Review->getFirstName() . " " . $Review->getLastName(); ?></h2>

        <div class="contact-wrapper">
            <div><span class="date">Date: <?php echo $Review->getDate(); ?></span></div>
            <div><span class="">Rate: <?php $rates = $Review->getRate();
                    if ($rates >= 1) {
                        for ($i = 0; $i < $rates; $i++) {
                            echo '<span class="glyphicon glyphicon-star"></span>';
                        }
                    } elseif ($rates = 0) {
                        echo '<span class="glyphicon glyphicon-star-empty"></span>';
                    }

                    ?></span></div>
            <div><span class="">Comment: <?php echo $Review->getReview(); ?></span></div>

        </div>


    </section>
    <br/> <br/>
</div>