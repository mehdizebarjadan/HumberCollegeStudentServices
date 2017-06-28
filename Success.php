<?php
require 'header.php';
require 'model/database.php';
require 'model/review.php';
require 'model/review_db.php';
require 'model/category.php';
require 'model/categoryDB.php';
?>

    <div class="container clearfix">
        <article class="placeholder">
            <a href="review.php" class="btn btn-primary">See All Reviews</a>
        </article>
        <br/><br/>

        <section class="Success">
            <h2>You Have Successfully Add Your Review</h2>
        </section>
    </div>

<?php
require 'footer.php';
?>