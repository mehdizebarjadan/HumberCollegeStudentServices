<?php
require 'header.php';
require 'model/database.php';
require 'model/review.php';
require 'model/review_db.php';
require 'model/category.php';
require 'model/categoryDB.php';

//$reviews = ReviewDB::getReviews();
$allReviews = ReviewDB::getAllReviews();

?>

    <div class="container clearfix">
        <article class="placeholder">
            <a href="reviewAdd.php" class="btn btn-primary">Add your Reviews</a>
        </article>

        <section>
            <h1>All Reviews</h1>
            <?php

            foreach ($allReviews as $item):?>
                <div class="contact-wrapper">
                    <div class="heading"><h2>category: <?php echo $item->getCategoryTitle(); ?></h2></div>
                    <div><span class="date">Date: <?php echo $item->getDate();?></span></div>
                    <div><span>First Name: <?php echo $item->getFirstName();?></span></div>
                    <div><span>Last Name: <?php echo $item->getLastName();?></span></div>
                    <div><span class="">Rate: <?php $rates= $item->getRate();
                            if($rates >= 1){
                                for($i=0; $i<$rates; $i++){
                                    echo '<span class="glyphicon glyphicon-star"></span>';
                                }
                            }elseif($rates = 0){
                                echo '<span class="glyphicon glyphicon-star-empty"></span>';
                            }



                            ?></span></div>
                    <div><span class="">Comment: <?php echo $item->getReview();?></span></div>

                </div>

            <?php endforeach; ?>

        </section>
    </div>

<?php
require 'footer.php';
?>