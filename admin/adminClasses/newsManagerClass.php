<?php

class newsManagerClass{
    
/*******************************************************************************
 *      READ NEWS ARTICLE FUNCTION
 *      REFERENCE THIS FUNCTION BY INCLUDING THE NEWSMANAGERCLASS.PHP FILE
 *      THIS FUNCTION LISTS ALL OF THE NEWS ARTICLES IN THE MAIN NEWS MANAGER PAGE
 ******************************************************************************/ 
    
    public function getArticles(){
        require_once 'db.php';
        $selectnews = "SELECT * FROM newsarticles ORDER BY id DESC";
        $articles = $db->query($selectnews);
        //fetch associative arrays from the data so we can reference column names in the foreach loop
        $articles->setFetchMode(PDO::FETCH_ASSOC);
        foreach($articles as $article){
            $body = $article['body'];
            //if the article body is less than 500 characters, output that as the excerpt as well
           if(strlen($body) < 500){
                $excerpt = $body;
           }
           //if the article body is more than 500 characters, trim it to the nearest word to the 500th character
           else{
                $pos=strpos($body, ' ', 500);
                $excerpt = substr($body,0,$pos ); 
           }
            echo
            '<div class="col-sm-12">'
            . '<h3>' . $article['title'] . '</h3>
         <aside>
         <p>' . $excerpt . '</p>
         <input type="hidden" value="' . $article['id'] . '" name="id" />
         </aside>
         <br />
         <a href="newsManagerUpdate.php?id='.$article['id'].'">Edit</a> | <a href="newsManagerDelete.php?id='.$article['id'].'" onclick="return confirm(\'Are you sure you want to delete this?\');" >Delete</a>
         </div>';
            }
    }
 /*******************************************************************************/
 
/*******************************************************************************
 *      INSERT NEW NEWS ARTICLE FUNCTION
 *      REFERENCE THIS FUNCTION BY INCLUDING THE NEWSMANAGERCLASS.PHP FILE
 ******************************************************************************/   
    
    public function insertArticle(){
        require_once 'db.php';

        ///INSERT NEW RECORD
        if(isset($_POST['submit'])){
                //upload image
                $target_dir = "../images/";
                $imagepath = $_FILES["photo"]["name"];
                $target_file = $target_dir . basename($_FILES["photo"]["name"]);
                $uploadOk = 1;
                $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        // Check if image file is a actual image or fake image
                if(isset($_POST["submit"])) {
                    $check = getimagesize($_FILES["photo"]["tmp_name"]);
                    if($check !== false) {
                        echo "File is an image - " . $check["mime"] . ".";
                        $uploadOk = 1;
                    } else {
                     echo "File is not an image.";
                        $uploadOk = 0;
                    }
                } 
        // Check if file already exists
                if (file_exists($target_file)) {
                    echo "Sorry, file already exists.";
                    $uploadOk = 0;
                }
                // Check file size
                if ($_FILES["photo"]["size"] > 500000) {
                    echo "Sorry, your file is too large.";
                    $uploadOk = 0;
                }
                // Allow certain file formats
                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif" ) {
                    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                    $uploadOk = 0;
                }
                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                    echo "Sorry, your file was not uploaded.";
                // if everything is ok, try to upload file
                } else {
                    if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
                        echo "The file ". basename( $_FILES["photo"]["name"]). " has been uploaded.";
                    } else {
                        echo "Sorry, there was an error uploading your file.";
                    }
                }
                //get values from input boxes
                if(isset($_POST['publishLive'])){ $publishLive = $_POST['publishLive']; } else {
                $publishLive = ""; }
                $title = htmlentities($_POST['title'], ENT_QUOTES);
                $pubDate = $_POST['pubDate'];
                $author = $_POST['author'];
                $body = $_POST['body'];
                //insert mySQL statement
                //$insertarticle = "INSERT INTO newsarticles (title, body, author, pubdate, publishlive, image) VALUES ('$title', '$body', '$author', '$pubDate', '$publishLive', '$imagepath')";
                $insertarticle = $db->prepare("INSERT INTO newsarticles (title, body, author, pubdate, publishlive, image) VALUES (:title, :body, :author, :pubdate, :publishlive, :image)");
                 $insertarticle->bindParam(':title', $title);
                 $insertarticle->bindParam(':body', $body);
                 $insertarticle->bindParam(':author', $author);
                 $insertarticle->bindParam(':pubdate', $pubDate);
                 $insertarticle->bindParam(':publishlive', $publishLive);
                 $insertarticle->bindParam(':image', $imagepath);
                   
                if(empty($title) || empty($body) || empty($author) || empty($pubDate) || empty($publishLive) ){
                    echo "<span style='color:red'>Invalid data. Record was not added.</span>";
                    }
                else
                {
                    echo "<h2 style='color:green'>New article added!</h2>";
                    //$exec_insert = $db->exec($insertarticle);
                    $insertarticle->execute();
                } 

            } //end insert
    } //end insertArticle
 /*******************************************************************************/    
    
/*******************************************************************************
 *      DELETE NEWS ARTICLE FUNCTION
 *      REFERENCE THIS FUNCTION BY INCLUDING THE NEWSMANAGERCLASS.PHP FILE
 ******************************************************************************/ 
    public function deleteArticle(){
        require_once 'db.php';
        
        //Delete Article
        $deleteid = $_GET['id'];
        $deletedata = "DELETE FROM newsarticles WHERE id='$deleteid'";
        $exec_delete = $db->exec($deletedata);
        
    } //end delete
/*******************************************************************************/    

/*******************************************************************************
 *      UPDATE ARTICLE FUNCTION
 *      REFERENCE THIS FUNCTION BY INCLUDING THE NEWSMANAGERCLASS.PHP FILE
 ******************************************************************************/
    
    
    
/*******************************************************************************
 *      IMAGE UPLOAD FUNCTION
 *      REFERENCE THIS FUNCTION BY INCLUDING THE NEWSMANAGERCLASS.PHP FILE
 ******************************************************************************/    
    
    public function uploadImage(){
        
    }
    
} //end newsManager Class


