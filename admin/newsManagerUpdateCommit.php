<?php
    include 'adminHeader.php';
    require_once 'adminClasses/db.php';
    include 'adminNav.php';  

    if(isset($_POST['update'])){
    //get the values from the input boxes
        $publishLive = $_POST['publishLive'];
    $title = htmlentities($_POST['title'], ENT_QUOTES);
    $author = $_POST['author'];
    $pubDate = $_POST['pubDate'];
    $body = $_POST['body'];
    $hiddenid = $_POST['hiddenid'];
    //update the values according to the id
    $updatedata = "UPDATE newsarticles SET title='$title', publishlive='$publishLive', author='$author', pubdate='$pubDate', body='$body' WHERE id=$hiddenid";
    }
    
    /*
    $insertarticle = $db->prepare("INSERT INTO newsarticles (title, body, author, pubdate, publishlive, image) VALUES (:title, :body, :author, :pubdate, :publishlive, :image)");
                 $insertarticle->bindParam(':title', $title);
                 $insertarticle->bindParam(':body', $body);
                 $insertarticle->bindParam(':author', $author);
                 $insertarticle->bindParam(':pubdate', $pubDate);
                 $insertarticle->bindParam(':publishlive', $publishLive);
                 $insertarticle->bindParam(':image', $imagepath);
     
     */
    ?>

<div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <?php 
                        if(empty($title) || empty($author) || empty($body) ){
                        echo "<span style='color:red'>Invalid data. Record was not updated.</span>";
                        }
                        else
                        {
                        echo '<h2 class="success">update successful!</h2>';
                        $execute_update = $db->exec($updatedata);
                        } ?>
                        <a href="newsManager.php"> << Back</a>
                    </div>
                </div>
            </div>
<?php include 'adminFooter.php'; ?>