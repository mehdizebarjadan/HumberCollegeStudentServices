<?php
include "adminHeader.php";
include "adminNav.php";
require '../model/database.php';
require '../model/event.php';
require '../model/event_db.php';
include '../validation/validation.php';
include '../validation/validation_field.php';
include '../validation/validation_fields.php';



$title = '';
$location = '';
$description = '';
$image = '';
$date = '';


$validation = new Validation();

$form_fields = $validation->getFields();
$form_fields->addField('title');
$form_fields->addField('location');
$form_fields->addField('description');
$form_fields->addField('image');


if (isset($_POST['addEvent'])) {


    $title = $_POST['title'];
    $location = $_POST['location'];
    $description = $_POST['description'];
    $date = date('Y-m-d');
    if(!empty($_FILES['image']['name'])){
        $image_tmp = time() . $_FILES['image']['tmp_name'];//me
        $image = time() . $_FILES['image']['name'];
        $validation->isImage('image', $image, false);
        $validation->fileSizeIsMaximum('image', 1048576 * 2);
    }

    $validation->isNotEmpty('title', $title);
    $validation->isNotEmpty('location', $location);
    $validation->isNotEmpty('description', $description);


    if($form_fields->isValid()){


        $target_path = "../uploads/event/";


        $target_path = $target_path . basename( $_FILES['uploadedfile']['name']);
        $image = $_FILES['uploadedfile']['name'];

        $event = new event ($title, $location, $description, $date, $image);
        EventDB::addEvent($event);


        if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {
            echo "The file ".  basename( $_FILES['uploadedfile']['name']).
                " has been uploaded";
        } else{
            echo "There was an error uploading the file, please try again!";
        }




//        if(!empty($_FILES['image']['name'])) {
//            $target_path = "../uploads/event/";
//
//            move_uploaded_file($image_tmp, "$target_path/$image");
//            echo "The file has been uploaded";
//           // File::upload('../uploads/event/', 'image', $image);
//        }
        //header("Location: event.php");
    }


//    $target_path = "uploads/";
//
//    $target_path = $target_path . $file_name;
//
//    if(move_uploaded_file($file_temp, $target_path)){
//        echo "The file " .  $file_name . " has been uploaded";
//
//    }
//    else{
//        echo "There was an error uploading file";
//    }
}
?>



<div id="main">
    <article class="placeholder">
        <a href="event.php" class="btn btn-primary">List Of Events</a>
    </article>

    <h1>Add New Event</h1>

    <form action="eventAdd.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title" id="title" placeholder="Enter title">
            <?php echo $form_fields->getField('title')->getHTMLError(); ?>
        </div>

        <div class="form-group">
            <label for="location">Location</label>
            <textarea class="form-control" name="location" id="location"  placeholder="Enter address"></textarea>
            <?php echo $form_fields->getField('location')->getHTMLError(); ?>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea  class="form-control" name="description" id="description" placeholder="Enter Description"></textarea>
            <?php echo $form_fields->getField('description')->getHTMLError(); ?>
        </div>



        <div class="form-group">
            <label for="image">Image Upload</label>
            <input type="hidden" name="MAX_FILE_SIZE" value="100000" />
            <input name="uploadedfile" type="file" /><br />
        </div>

        <button type="submit" class="btn btn-primary" name="addEvent" value="upload">Submit</button>
        <a class="btn btn-default" href="eventAdd.php">Cancel</a>
    </form>
</div>


<?php include "adminFooter.php"; ?>