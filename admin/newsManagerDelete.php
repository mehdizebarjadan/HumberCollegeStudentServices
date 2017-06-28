<?php
include 'adminHeader.php';
include 'adminNav.php';

require_once 'adminClasses/newsManagerClass.php';
    $newsclass=new newsManagerClass();
    $newsclass->deleteArticle();

?>

        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <?php echo '<h2 class="success">Article Deleted!</h2>'; ?>
                    <h3><a href="newsManager.php"><< Back To News Manager</a></h3>
                </div> 
            </div>
        </div>