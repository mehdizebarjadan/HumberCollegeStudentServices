<?php
        include 'adminHeader.php';
        include 'adminNav.php'; 
        require_once 'adminClasses/newsManagerClass.php';
        $managerClass = new newsManagerClass();
        $managerClass->insertArticle();
?>

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h3><a href="newsManager.php"><< Back To News Manager</a></h3>
                    </div>
         </div>
        </div>
<!-- /#page-content-wrapper -->
        
<?php include 'adminFooter.php'; ?>

