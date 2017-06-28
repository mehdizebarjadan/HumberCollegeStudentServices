<?php
        $newtitle = urldecode($_GET['id']);
        //get header but replace the title in the head tags
        ob_start();
        include('header.php');
        $buffer=ob_get_contents();
        ob_end_clean();
        $buffer=str_replace("%TITLE%",$newtitle,$buffer);
        echo $buffer;
        //get the article by id
        require_once 'publicClasses/newsPublicClass.php';
        $newsPublicClass = new newsPublicClass();
        $newsPublicClass->getArticleById(); ?>
        <h2>Other news</h2>
        <?php
        $newsPublicClass->sidebarNews(3);
        ?>
        <div class="clear"></div>
<?php
        include 'footer.php';
?>
        
