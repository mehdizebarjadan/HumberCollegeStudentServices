<?php
$newtitle = 'News';
        //get header but replace the title in the head tags
        ob_start();
        include('header.php');
        $buffer=ob_get_contents();
        ob_end_clean();
        $buffer=str_replace("%TITLE%",$newtitle,$buffer);
        echo $buffer;
    require_once 'publicClasses/newsPublicClass.php';
        $newsPublicClass = new newsPublicClass();
         ?>

<h1>All News</h1>
<?php
     $newsPublicClass->getAllNews();
    include 'footer.php';
?>

