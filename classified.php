<?php
        $newtitle = urldecode($_GET['id']);
        //get header but replace the title in the head tags
        ob_start();
        include('header.php');
        $buffer=ob_get_contents();
        ob_end_clean();
        $buffer=str_replace("%TITLE%",$newtitle,$buffer);
        echo $buffer;
        require_once 'publicClasses/classifiedsPublicClass.php';
        $classifiedPublicClass = new classifiedsPublicClass();
        $classifiedPublicClass->getAdById();
        include 'footer.php';
?>
