<?php   
    include 'adminHeader.php';
    include 'adminNav.php'; 
?>

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1>News Article Manager</h1>
                    </div>
                    <div class="col-lg-12">
                        <a href="newsManagerInsert.php">Create News Article</a>
                    </div>
                        <?php
                            require_once 'adminClasses/newsManagerClass.php';
                            $newsclass=new newsManagerClass();
                            $newsclass->getArticles();
                        ?>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->
        
<?php include 'adminFooter.php'; ?>
