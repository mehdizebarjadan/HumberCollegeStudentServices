<?php
include "adminHeader.php";
include 'adminNav.php';

require '../model/database.php';
require '../model/event.php';
require '../model/event_db.php';
include '../validation/validation.php';
include '../validation/validation_field.php';
include '../validation/validation_fields.php';

if (isset($_GET['id'])) {
    $event_id = $_GET['id'];
} else {
    $event_id = $_POST['event_id'];
}
$event = EventDB::getEventByID($event_id);

$title = $event->getTitle();
$location = $event->getLocation();
$description = $event->getDescription();
$image = $event->getImage();


$validation = new Validation();

$form_fields = $validation->getFields();
$form_fields->addField('title');
$form_fields->addField('location');
$form_fields->addField('description');
$form_fields->addField('image');


if (isset($_POST['eventUpdate'])) {
    $title = $_POST['title'];
    $location = $_POST['location'];
    $description = $_POST['description'];
    $date = date('Y-m-d');
    if (!empty($_FILES['image']['name'])) {
        $image = time() . $_FILES['image']['name'];
        $validation->isImage('image', $image, false);
        $validation->fileSizeIsMaximum('image', 1048576 * 2);
    }


    $validation->isNotEmpty('title', $title);
    $validation->isNotEmpty('location', $location);
    $validation->isNotEmpty('description', $description);


    if ($form_fields->isValid()) {
        $event = new event($title, $location, $description, $date, $image);
        EventDB::updateEvent($event, $event_id);
        if (!empty($_FILES['image']['name'])) {
            File::upload('../uploads/event/', 'image', $image);
        }
        header("Location: event.php");
    }

}
?>


<div id="main">
    <h1>Edit  <?php echo $title; ?></h1>

    <form action="eventUpdate.php" method="post">
        <input type="hidden" name="event_id" value="<?php echo $event_id; ?>"/>

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" value="<?php echo $title; ?>" class="form-control" name="title" id="title">
            <?php echo $form_fields->getField('title')->getHTMLError(); ?>
        </div>
        <div class="form-group">
            <label for="location">Location</label>
            <textarea   class="form-control" name="location" id="location"><?php echo $location; ?></textarea>
            <?php echo $form_fields->getField('location')->getHTMLError(); ?>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea rows="5"  class="form-control" name="description"
                   id="description"><?php echo $description; ?></textarea>
            <?php echo $form_fields->getField('description')->getHTMLError(); ?>
        </div>

        <?php if ($image != ''): ?>
            <div class="form-group clearfix no-padding">
                <div class="col-md-2">
                    <img src="../uploads/event/<?php echo $image; ?>" alt="<?php echo $title; ?>"/>
                </div>
                <div class="form-group">
                    <label for="image">Image</label>

                    <input type="file" class="form-control" value="<?php echo $image; ?>" name="image" id="image">
                    <?php echo $form_fields->getField('image')->getHTMLError(); ?>

                </div>
                <!--                    <div class="form-group">-->
                <!--                        <label for="image">Image Upload</label>-->
                <!--                        <input type="hidden" name="MAX_FILE_SIZE" value="100000" />-->
                <!--                        <input name="uploadedfile" type="file" /><br />-->
                <!--                    </div>-->

            </div>
        <?php endif; ?>



        <button type="submit" class="btn btn-primary" name="eventUpdate">Submit</button>
        <a class="btn btn-default" href="event.php">Cancel</a>
    </form>
</div>


<?php //include "adminFooter.php";?>


