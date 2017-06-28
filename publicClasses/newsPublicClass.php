<?php
/*BY PHILIP JAMES DE VRIES */
class newsPublicClass{
    
/*******************************************************************************
 *      GET NEWS
 *      USE THIS FUNCTION TO DISPLAY ALL NEWS ARTICLES WITH 'PUBLISHLIVE' COLUMN 'YES'
 *      REFERENCE THIS FUNCTION BY INCLUDING THE NEWSPUBLICCLASS.PHP FILE
 ******************************************************************************/ 
    
    public function getNews(){
        require config::DB;
        $selectthreenews = "SELECT * FROM newsarticles WHERE publishlive = 'yes' ORDER BY id DESC LIMIT 3";
        $articles = $db->query($selectthreenews);
        //fetch associative arrays from the data so we can reference column names in the foreach loop
        $articles->setFetchMode(PDO::FETCH_ASSOC);
        //reference constants for file paths
        
        /*//$stmt = $dbh->prepare ("INSERT INTO user (firstname, surname) VALUES (:f-name, :s-name)");
        $stmt = $db->prepare ("SELECT * FROM newsarticles WHERE :pub = 'yes' ORDER BY id DESC LIMIT 3");
        $publish = 'publishlive';
        $stmt -> bindParam(':pub', $publish);
        $stmt -> execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC); */
    

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
            '<a href="article.php?id='. urlencode($article['title']).'"><div class="col-sm-4">'
            . '<h3>' . $article['title'] . '</h3></a>
                <input type="hidden" value="' . $article['id'] . '" name="id" />
         <figure>
         <img class="news-thumb" src="' . config::IMGCONSTANT . $article['image'] . '" alt="" />
         </figure>
         <aside>
         <p>' . $excerpt . '...</p>
         </aside>
         </div>';
            }
    }
    
/*******************************************************************************
 *      GET ARTICLE BY ID
 *      USE THIS FUNCTION TO DISPLAY THE DETAILS OF AN INDIVIUAL NEWS ARTICLE
 *      REFERENCE THIS FUNCTION BY INCLUDING THE NEWSPUBLICCLASS.PHP FILE
 ******************************************************************************/ 

    public function getArticleById(){
        require config::DB;
        //get the id so right row is updated (we are using the article title as the ID)
        $id = urldecode($_GET['id']);
        $selectall = "SELECT * FROM newsarticles WHERE title='$id'";
        $data = $db->query($selectall);
        //fetch associative arrays from the data so we can reference column names in the foreach loop
        $data->setFetchMode(PDO::FETCH_ASSOC);
        
        //loop through the news article data
        foreach($data as $items){
            echo '<div class="col-md-8"><h1>' . $items['title'] . '</h1><p class="date">Published: ' . $items['pubdate'] . '<br />By ' . $items['author'] . '</p><p><img class="articleImage img-responsive" src="' . config::IMGCONSTANT . $items['image'] . '" alt="">' . $items['body'] . '</p>';
            include 'socialmediabuttons.php';
            echo '</div>';
        }
    }
    
/******************************************************************************/ 

/*******************************************************************************
 *      GET ALL NEWS ARTICLES (ARCHIVE PAGE)
 *      USE THIS FUNCTION TO DISPLAY ALL NEWS ARTICLES
 *      REFERENCE THIS FUNCTION BY INCLUDING THE NEWSPUBLICCLASS.PHP FILE
 ******************************************************************************/ 
    
    public function getAllNews(){
        require config::DB;
        $selectthreenews = "SELECT * FROM newsarticles WHERE publishlive = 'yes' ORDER BY id DESC";
        $articles = $db->query($selectthreenews);
        //fetch associative arrays from the data so we can reference column names in the foreach loop
        $articles->setFetchMode(PDO::FETCH_ASSOC);
        foreach($articles as $article){
            $title = $article['title'];
            $author = $article['author'];
            $pubdate = $article['pubdate'];
            $image = $article['image'];
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
           
           //output the article fields onto the page
            echo
                    '<div class="col-md-12"><h2 class="articleTitle">'
                    . '<a href="article.php?id=' . urlencode($title) . '">' . $title . '</a></h2></div>'
                    . '<div class="col-md-8"><p class="date">' . $pubdate . '</p>'
                    . '<p class="date">By ' . $author . '</p>'
                    . '<p>' . $excerpt . '...</p>'
                    . '<p><a href="article.php?id=' . urlencode($title) . '">Continue reading...</a></p></div>'
                    .'<div class="col-md-4 right"><a href="article.php?id=' . urlencode($title) . '">'
                    . '<img class="allNewsThumb" src="' . config::IMGCONSTANT . $image . '" alt="" /></a></div>';
                    
        }
    }
    
/*******************************************************************************
 *      GET SIDEBAR NEWS ARTICLES
 *      USE THIS FUNCTION TO DISPLAY THE NEWS SIDEBAR
 *      ADJUST THE QUANTIY PARAMETER TO CHANGE THE NUMBER OF NEWS ARTICLS DISPLAYED
 *      REFERENCE THIS FUNCTION BY INCLUDING THE NEWSPUBLICCLASS.PHP FILE
 ******************************************************************************/ 
    
    public function sidebarNews($articleQuantity){
        require config::DB;
        $currentitle = $_GET[urldecode('id')];
        
        //get news articles, exclude current article being viewed based on URL title decode
        $selectnews = "SELECT * FROM newsarticles WHERE publishlive = 'yes' AND title <> '$currentitle' ORDER BY id DESC LIMIT $articleQuantity";
        $articles = $db->query($selectnews);
        //fetch associative arrays from the data so we can reference column names in the foreach loop
        $articles->setFetchMode(PDO::FETCH_ASSOC);
        foreach($articles as $article){
            $title = $article['title'];
            $author = $article['author'];
            $pubdate = $article['pubdate'];
            $image = $article['image'];
            $body = $article['body'];
            
        echo '<div class="col-md-4"><a href="article.php?id='.urlencode($article['title']).'"><h4>' . $article['title'] . '</h4></a>' 
                . '<img class="news-thumb" src="' . config::IMGCONSTANT . $article['image'] . '" alt="News Image"></div>';
        }
    }
}