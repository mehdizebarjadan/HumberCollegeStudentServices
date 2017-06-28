<?php

class validationClass {
    public function validateEmail($value){
        if(filter_var($value, FILTER_VALIDATE_EMAIL)){         
        echo "<p style='color:green;'>" . $value . " is a valid email!</p>";
        }    
        else{
            echo "<p style='color:red;'>invalid email</p>";
        
        }
    }
}
