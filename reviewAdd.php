<?php
require 'header.php';
require 'model/database.php';
require 'model/review.php';
require 'model/review_db.php';
require 'model/category.php';
require 'model/categoryDB.php';
include 'validation/validation.php';
include 'validation/validation_field.php';
include 'validation/validation_fields.php';


$firstName = '';
$lastName = '';
$review_text = '';
$rating = '';
$date = '';
$category_review = '';


$validation = new Validation();

$form_fields = $validation->getFields();
$form_fields->addField('firstName');
$form_fields->addField('lastName');
$form_fields->addField('review_text');
$form_fields->addField('rating');
$form_fields->addField('date');
$form_fields->addField('category');


if (isset($_POST['addReview'])) {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $review_text = $_POST['review_text'];
    $rating = $_POST['rating'];
    $date = date('Y-m-d');
    $category_review = $_POST['category'];

    $validation->isNotEmpty('firstName', $firstName);
    $validation->isNotEmpty('lastName', $lastName);
    $validation->isNotEmpty('review_text', $review_text);
    $validation->isDigit('rating', $rating);
    $validation->isNotEmpty('category', $category_review);


    if ($form_fields->isValid()) {
        $review = new Review($category_review, $firstName, $lastName, $review_text, $rating, $date);
        ReviewDB::addReview($review);
        header("Location: success.php");
    }
}
?>



    <div id="main">
        <article class="placeholder">
            <a href="review.php" class="btn btn-primary">List Of Reviews</a>
        </article>

        <h1>Please write your Review</h1>

        <form action="reviewAdd.php" method="post">


            <div class="form-group">
                <label for="firstName">First Name</label>
                <input type="text" class="form-control" name="firstName" id="firstName"
                       placeholder="Enter your First Name">
                <?php echo $form_fields->getField('firstName')->getHTMLError(); ?>
            </div>
            <div class="form-group">
                <label for="lastName">Last Name</label>
                <input type="text" class="form-control" name="lastName" id="lastName"
                       placeholder="Enter your Last Name">
                <?php echo $form_fields->getField('lastName')->getHTMLError(); ?>
            </div>
            <div class="form-group">
                <label for="category">Category</label>
                <select name="category">
                    <option>--select--</option>
                    <?php
                    $categories = CategoryDB::getCategories();
                    foreach ($categories as $category): ?>

                        <option
                            value="<?php echo $category->getID(); ?>"<?php if($category->getID() == $category_review ){ ?>selected <?php }?>>
                            <?php echo $category->getTitle();?>
                        </option>

                    <?php endforeach; ?>
                </select>

            </div>

            <div class="well well-sm">
                <div class="form-group">
                    <label for="rating">Enter a rating: </label>
             <span class="star-rating">
              <input class="glyphicon glyphicon-star-empty" type="radio" id="rating" name="rating" value="1">
              <input class="glyphicon glyphicon-star-empty" type="radio" id="rating" name="rating" value="2">
              <input class="glyphicon glyphicon-star-empty" type="radio" id="rating" name="rating" value="3">
              <input class="glyphicon glyphicon-star-empty" type="radio" id="rating" name="rating" value="4">
              <input class="glyphicon glyphicon-star-empty" type="radio" id="rating" name="rating" value="5">
            </span>

                </div>
                <?php echo $form_fields->getField('rating')->getHTMLError(); ?>
            </div>


            <div class="form-group">
                <label for="review_text">Write your Review</label>
                <textarea class="form-control" name="review_text" id="review_text"  placeholder="Enter your Review"></textarea>
                <?php echo $form_fields->getField('review_text')->getHTMLError(); ?>
            </div>


            <div>
                <button type="submit" class="btn btn-primary" name="addReview">Submit</button>
                <a class="btn btn-default" href="reviewAdd.php">Cancel</a>
            </div>
        </form>
    </div>


<?php
require 'footer.php';
?>