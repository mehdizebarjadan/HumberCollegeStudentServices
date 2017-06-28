<?php

class classifiedsPublicClass{
    
/************************************************************************ 
**GET CLASSIFIED ADS - PASS CATEGORY TYPE 'all' or 'textbooks' or 'housing'
**AS PARAMETER WHEN USING FUNCTION TO FILTER ADS BY CATEGORY
**    
*************************************************************************/
    
    public function getAds($adType){
        //connect to database
        require 'admin/adminClasses/db.php';
        
        //get all ads
        if($adType === 'all'){
            $selectads = "SELECT * FROM classifieds ORDER BY id DESC LIMIT 3";
            $ads = $db->query($selectads);
            //fetch associative arrays from the data so we can reference column names in the foreach loop
            $ads->setFetchMode(PDO::FETCH_ASSOC);

            foreach($ads as $ad){
                $body = strip_tags($ad['body']);
                $title = $ad['title'];
                $image = $ad['image'];
                //if the article body is less than 500 characters, output that as the excerpt as well
                if(strlen($body) < 300){
                $excerpt = $body;
                }
                //if the article body is more than 500 characters, trim it to the nearest word to the 500th character
                else{
                $pos=strpos($body, ' ', 300);
                $excerpt = substr($body,0,$pos ); 
                }
                echo
                '<div class="col-lg-4">'
                    . '<a href="classified.php?id='. urlencode($ad['title']).'"><h3>' . $ad['title'] . '<br>$' . $ad['price'] . '</h3></a>'
                    .   ' <figure>
                            <img class="classifieds-thumb floatnone" src="images/' . $ad['image'] . '" alt="" />
                        </figure>
                        <input type="hidden" value="' . $ad['id'] . '" name="id" />
                            <br>
                        <aside>
                            <p>' . $excerpt . '...</p>
                        </aside>'
                    . '</div>';
            }
        }
        
        //get ads from textbooks category
        if($adType === 'textbooks'){
            $selectads = "SELECT * FROM classifieds WHERE category = 'textbooks' ORDER BY id DESC";
            $ads = $db->query($selectads);
            //fetch associative arrays from the data so we can reference column names in the foreach loop
            $ads->setFetchMode(PDO::FETCH_ASSOC);

            foreach($ads as $ad){
                $body = strip_tags($ad['body']);
                $title = $ad['title'];
                $image = $ad['image'];
                //if the article body is less than 500 characters, output that as the excerpt as well
                if(strlen($body) < 300){
                $excerpt = $body;
                }
                //if the article body is more than 500 characters, trim it to the nearest word to the 500th character
                else{
                $pos=strpos($body, ' ', 300);
                $excerpt = substr($body,0,$pos ); 
                }
                echo
                '<div class="col-lg-12">'
                    .   ' <figure>
                            <img class="classifieds-thumb" src="images/' . $ad['image'] . '" alt="" />
                        </figure>'
                    . '<a href="classified.php?id='. urlencode($ad['title']).'"><h3>' . $ad['title'] . '<br>$' . $ad['price'] . '</h3></a>
                        <input type="hidden" value="' . $ad['id'] . '" name="id" />
                        <aside>
                            <p>' . $excerpt . '...</p>
                        </aside>'
                    . '</div>';
            }
        }
        
        //get ads from housing category
        else if($adType === 'housing'){
            $selectads = "SELECT * FROM classifieds WHERE category = 'housing' ORDER BY id DESC";
            $ads = $db->query($selectads);
            //fetch associative arrays from the data so we can reference column names in the foreach loop
            $ads->setFetchMode(PDO::FETCH_ASSOC);

            foreach($ads as $ad){
                $body = strip_tags($ad['body']);
                $title = $ad['title'];
                $image = $ad['image'];
                //if the article body is less than 500 characters, output that as the excerpt as well
                if(strlen($body) < 300){
                $excerpt = $body;
                }
                //if the article body is more than 500 characters, trim it to the nearest word to the 500th character
                else{
                $pos=strpos($body, ' ', 300);
                $excerpt = substr($body,0,$pos ); 
                }
                echo
                '<div class="col-lg-12">'
                    .   ' <figure>
                            <img class="classifieds-thumb" src="images/' . $ad['image'] . '" alt="" />
                        </figure>'
                    . '<a href="classified.php?id='. urlencode($ad['title']).'"><h3>' . $ad['title'] . '<br>$' . $ad['price'] . '</h3></a>
                        <input type="hidden" value="' . $ad['id'] . '" name="id" />
                        <aside>
                            <p>' . $excerpt . '...</p>
                        </aside>'
                    . '</div>';
            }
        }
        
        //get ads from cars category
        else if($adType === 'cars'){
            $selectads = "SELECT * FROM classifieds WHERE category = 'cars' ORDER BY id DESC";
            $ads = $db->query($selectads);
            //fetch associative arrays from the data so we can reference column names in the foreach loop
            $ads->setFetchMode(PDO::FETCH_ASSOC);

            foreach($ads as $ad){
                $body = strip_tags($ad['body']);
                $title = $ad['title'];
                $image = $ad['image'];
                //if the article body is less than 500 characters, output that as the excerpt as well
                if(strlen($body) < 300){
                $excerpt = $body;
                }
                //if the article body is more than 500 characters, trim it to the nearest word to the 500th character
                else{
                $pos=strpos($body, ' ', 300);
                $excerpt = substr($body,0,$pos ); 
                }
                echo
                '<div class="col-lg-12">'
                    .   ' <figure>
                            <img class="classifieds-thumb" src="images/' . $ad['image'] . '" alt="" />
                        </figure>'
                    . '<a href="classified.php?id='. urlencode($ad['title']).'"><h3>' . $ad['title'] . '<br>$' . $ad['price'] . '</h3></a>
                        <input type="hidden" value="' . $ad['id'] . '" name="id" />
                        <aside>
                            <p>' . $excerpt . '...</p>
                        </aside>'
                    . '</div>';
            }
        }
        //get ads from bikes category
        else if($adType === 'bikes'){
            $selectads = "SELECT * FROM classifieds WHERE category = 'bikes' ORDER BY id DESC";
            $ads = $db->query($selectads);
            //fetch associative arrays from the data so we can reference column names in the foreach loop
            $ads->setFetchMode(PDO::FETCH_ASSOC);

            foreach($ads as $ad){
                $body = strip_tags($ad['body']);
                $title = $ad['title'];
                $image = $ad['image'];
                //if the article body is less than 500 characters, output that as the excerpt as well
                if(strlen($body) < 300){
                $excerpt = $body;
                }
                //if the article body is more than 500 characters, trim it to the nearest word to the 500th character
                else{
                $pos=strpos($body, ' ', 300);
                $excerpt = substr($body,0,$pos ); 
                }
                echo
                '<div class="col-lg-12">'
                    .   ' <figure>
                            <img class="classifieds-thumb" src="images/' . $ad['image'] . '" alt="" />
                        </figure>'
                    . '<a href="classified.php?id='. urlencode($ad['title']).'"><h3>' . $ad['title'] . '<br>$' . $ad['price'] . '</h3></a>
                        <input type="hidden" value="' . $ad['id'] . '" name="id" />
                        <aside>
                            <p>' . $excerpt . '...</p>
                        </aside>'
                    . '</div>';
            }
        }
        else{
            
        }
    }

/************************************************************************ 
**GET CLASSIFIED ADS BY ID TO DISPLAY ON INDIVIDUAL PAGES 
*************************************************************************/
    
    public function getAdById(){
        require_once 'admin/adminClasses/db.php';
        
        //get the id so right row is updated (we are using the article title as the ID)
        $id = urldecode($_GET['id']);
        $selectall = "SELECT * FROM classifieds WHERE title='$id'";
        $data = $db->query($selectall);
        //fetch associative arrays from the data so we can reference column names in the foreach loop
        $data->setFetchMode(PDO::FETCH_ASSOC);
        
        //loop through the news article data
        foreach($data as $items){
            echo  
                    '<div class="col-md-7"><h1>' . $items['title'] . '<br>Price: $' . $items['price'] . '</h1>'
                    . '<p class="date">Published: ' . $items['pubdate'] . '</p>'
                    . '<h5>Posted in: ' . $items['category'] . '</h5>'
                    . '<p>' . $items['body'] . '</p>'
                    . '<div class="contact-details"><h4>Contact Seller:</h4>'
                    . '<h5>Email: <a href="mailto:' . $items['email'] . '?subject=' . $items['title'] . '">' . $items['email'] . '</a></h5>'
                    . '<h5>Phone: ' . $items['phone'] . '</h5>'
                    . '<h5>Contact Preference: ' . $items['contactpref'] .'</div></div>';
            echo    '<div class="col-md-5"><img class="img-responsive" src="images/' . $items['image'] . '" alt="">';
            include 'socialmediabuttons.php';
                    echo '</div>';
        }
    }
    
/************************************************************************ 
**POST AN AD PUBLICLY (INSERT)
 * NOTE - THIS VALIDATION WILL ONLY OCCUR IF THE CLIENT-SIDE JS VALIDATION IS DISABLED
 * PHP VALIDATION IS AN EXTRA SECURITY STEP HERE
*************************************************************************/

        public function postAd(){
            require_once 'admin/adminClasses/db.php';
            
            ///INSERT NEW RECORD
        if(isset($_POST['submit'])){
                //upload image
                $target_dir = "images/";
                $imagepath = $_FILES["photo"]["name"];
                $target_file = $target_dir . basename($_FILES["photo"]["name"]);
                $uploadOk = 1;
                $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
                // Check if image file is a actual image or fake image
                $check = getimagesize($_FILES["photo"]["tmp_name"]);

                //get values from input boxes
                if(isset($_POST['category'])){ $category = $_POST['category']; } else {
                $category = ""; }
                if(isset($_POST['phone'])){ $phone = $_POST['phone']; } else {
                $phone = ""; }
                $title = htmlentities($_POST['title'], ENT_QUOTES);
                $price = $_POST['price'];
                $email = $_POST['email'];
                if(isset($_POST['contactpref'])){ $contactpref = $_POST['contactpref']; } else{ $contactpref="";}
                $postbody = $_POST['postbody'];
                //insert mySQL statement
                //$insertarticle = "INSERT INTO newsarticles (title, body, author, pubdate, publishlive, image) VALUES ('$title', '$body', '$author', '$pubDate', '$publishLive', '$imagepath')";
                $insertpost = $db->prepare("INSERT INTO classifieds (title, body, email, phone, image, category, price, contactpref) VALUES (:title, :body, :email, :phone, :image, :category, :price, :contactpref)");
                 $insertpost->bindParam(':title', $title);
                 $insertpost->bindParam(':body', $postbody);
                 $insertpost->bindParam(':email', $email);
                 $insertpost->bindParam(':phone', $phone);
                 $insertpost->bindParam(':category', $category);
                 $insertpost->bindParam(':price', $price);
                 $insertpost->bindParam(':contactpref', $contactpref);
                 $insertpost->bindParam(':image', $imagepath);
                
                 //////////////////VALIDATION////////////////////
                //check to make sure no required fields are blank 
                if(empty($title) || empty($postbody) || empty($email) || empty($category) || empty($price) ){
                    echo '<span class="error">You missed some required fields, go back. Your post was not created.</span>';
                    }
                    //check if the image file is the right file type
                    else if($check == false) {
                     echo '<span class="error">Sorry, the file you uploaded is not an image. Go back and try again.</span>';
                        $uploadOk = 0;     
                    }
                    //check if image already exists
                    else if (file_exists($target_file)) {
                    echo '<span class="error">Sorry, the image file you are trying to upload already exists.</span>';
                    $uploadOk = 0;
                    }
                    // Check file size for image, over 5mb too large
                    else if ($_FILES["photo"]["size"] > 500000) {
                    echo '<span class="error">Sorry, your image file is too large. Go back and upload a smaller file.</span>';
                    $uploadOk = 0;
                    }
                    // Allow certain file formats for image (jpg, png, jpeg, gif)
                    else if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                    && $imageFileType != "gif" ) {
                    echo '<span class="error">Sorry, only JPG, JPEG, PNG & GIF image files are allowed.</span>';
                    $uploadOk = 0;
                    }
                    
                    //if all the potential errors above are not an issue, run the database insert and image upload
                else
                {
                    echo "<h2 style='color:green'>New classified post added!</h2>";
                    echo '<h3>You can see your post at <a href="classified.php?id=' . urlencode($title) .'">classified.php?id=' . urlencode($title) . '</a></h3>' ;
                    
                    //execute the database commit
                    $insertpost->execute();
                    //upload the image file
                    if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file) && $uploadOk != 0) {
                        echo "Your image: ". basename( $_FILES["photo"]["name"]). " has been uploaded successfully.";
                    } else {
                        echo "Sorry, there was an error uploading your file.";
                    }
                } 

            } //end insert
        }
        
/************************************************************************ 
**COUNTER
 * this will count the number of posts in a particular category
*************************************************************************/
        public function postCount($category){
            require 'admin/adminClasses/db.php';
            $sqlCount = $db->prepare("select count(*) from classifieds where category = '$category'");
            //$sqlCount->bindValue(':category', $category);
            $sqlCount->execute();
            $count = $sqlCount->fetchColumn();
            echo '('. $count . ')';
            
            
        }

/************************************************************************ 
**FILTER CATEGORIES
 * this will filter the number of classifieds by category
*************************************************************************/
        public function filterClassifieds(){
            if(isset($_POST['filter'])){
                $category = isset($_POST['category']) ? $_POST['category'] : null;
                require 'admin/adminClasses/db.php';
                $sqlFilter = "SELECT * FROM classifieds WHERE category = '$category'";
                $results = $db->query($sqlFilter);
                $results->setFetchMode(PDO::FETCH_ASSOC);
                foreach($results as $article){
                    echo '<div class="col-md-8">'
                    . '<a href="classified.php?id=' . urlencode($article['title']) . '"><h3>'. $article['title'] .'</h3></a>'
                        .'<img class="classifieds-thumb img-responsive" alt="post image" src="images/' . $article['image'] . '"></div>';
                }
                
            }
        }
        
}