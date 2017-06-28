<?php
/**
 * This config file contains constants referring to absolute file paths to be changed if necessary
 *
 * @author DVRS
 */
class config {
    
    const IMGCONSTANT = 'images/';
    
    const DB = 'admin/adminClasses/db.php';

    function showConstant() {
        echo  self::IMGCONSTANT . "\n";
    }
}