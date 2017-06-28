<?php   
    include 'adminHeader.php';
    include 'adminNav.php'; 
?>

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1>Classifieds Manager</h1>
                    </div>
                        <?php
                            require_once 'adminClasses/classifiedsManagerClass.php';
                            $e = new classifiedsManagerClass();
                            $e ->getClassifieds();
                        ?>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->
        
<?php include 'adminFooter.php'; ?>