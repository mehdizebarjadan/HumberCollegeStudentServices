<?php

class classifiedsManagerClass{
    
/*******************************************************************************
 *      READ NEWS ARTICLE FUNCTION
 *      REFERENCE THIS FUNCTION BY INCLUDING THE NEWSMANAGERCLASS.PHP FILE
 *      THIS FUNCTION LISTS ALL OF THE NEWS ARTICLES IN THE MAIN NEWS MANAGER PAGE
 ******************************************************************************/ 
    
    public function getClassifieds(){
        require_once 'db.php';
        $selectclassifieds = "SELECT * FROM classifieds ORDER BY id DESC";
        $posts = $db->query($selectclassifieds);
        //fetch associative arrays from the data so we can reference column names in the foreach loop
        $posts->setFetchMode(PDO::FETCH_ASSOC);
        foreach($posts as $post){
            $body = $post['body'];
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
            . '<h3>' . $post['title'] . '</h3>
         <aside>
         <p>' . $excerpt . '</p>
         <input type="hidden" value="' . $post['id'] . '" name="id" />
         </aside>
         <br />
         <a href="../classified.php?id='. urlencode($post['title']).'">View Post</a> | <a href="classifiedsManagerDelete.php?id='.$post['id'].'" onclick="return confirm(\'Are you sure you want to delete this?\');" >Delete</a>
         </div>';
            }
    }

    
    public function deleteClassified(){
        require_once 'db.php';
        
        //Delete Post
        $deleteid = $_GET['id'];
        $deletedata = "DELETE FROM classifieds WHERE id='$deleteid'";
        $exec_delete = $db->exec($deletedata);
    }
    
}