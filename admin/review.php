<?php
include "adminHeader.php";
include 'adminNav.php';

require '../model/database.php';
require '../model/review.php';
require '../model/review_db.php';
require '../model/category.php';
require '../model/categoryDB.php';

if(isset($_POST['review_id'])){
    $review_id = $_POST['review_id'];
    ReviewDB::deleteReview($review_id);
    header("Location: review.php");
}

$reviews = ReviewDB::getReviews();
?>

<script>
    function deleteconfig() {
        var del = confirm("Are you sure to delete this review?");
        if (del == true) {
            alert("The Review is deleted")
        }
        return del;
    }
</script>


<div id="main">

    <div class="panel panel-default">
        <div class="panel-heading">List Of Reviews</div>
        <table class="table">
            <thead>
            <tr>
                <th> Name</th>
<!--           <th>Category</th>-->
                <th>Review</th>
                <th>Rate</th>
                <th>Date</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            <?php

            foreach ($reviews as $item):
                ?>
                <tr>
                    <td>
                        <a href="ReviewDetail.php?id=<?php echo $item->getID();?>">
                            <?php echo $item->getFirstName() . " " .$item->getLastName() ; ?>
                        </a>
                    </td>
<!--                    <td>--><?php //echo $item->getCategoryTitle(); ?><!--</td>-->
                    <td><?php echo $item->getReview(); ?></td>
                    <td><?php echo $item->getRate(); ?></td>
                    <td><?php echo $item->getDate(); ?></td>

                    <td>
                        <form action="review.php" method="post">
                            <input type="hidden" name="review_id" value="<?php echo $item->getID(); ?>"/>
                            <button class="btn btn-link" type="submit" value="Delete" onclick="return deleteconfig()">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>


    </div>
    <?php include "adminFooter.php";
    ?>

