<?php
include 'adminHeader.php';
include 'adminNav.php';

require_once 'adminClasses/classifiedsManagerClass.php';
    $e=new classifiedsManagerClass();
    $e->deleteClassified();
?>

        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <?php echo '<h2 class="success">Post Deleted!</h2>'; ?>
                    <h3><a href="classifiedsManager.php"><< Back To Classifieds Manager</a></h3>
                </div> 
            </div>
        </div>