<?php

class Validation
{
    private $fields;

    // Regular expressions
    public static $time_pattern = '/^(([0-1][0-9]|2[0-3]):[0-5][0-9](:[0-5][0-9])?)$/';
    public static $phone_pattern = '/^[0-9]\d{2}-\d{3}-\d{4}$/';
    public static $numbers_pattern = '#[0-9]+#';
    public static $postal_pattern = '/^[A-Z][0-9][A-Z]\s?[0-9][A-Z][0-9]$/i';

    public function __construct()
    {
        $this->fields = new ValidationFields();
    }

    public function getFields()
    {
        return $this->fields;
    }

    // Validate if a value is not empty
    public function isNotEmpty($name, $value)
    {
        // Get FieldToValidate object
        $field = $this->fields->getField($name);

        if(empty($value)){
            if($field->message == ''){
                $field->message = 'Required';
            }
            $field->setErrorMessage($field->message);
        }
    }

    // Validate if a value matches a specified pattern
    public function isInPattern($name, $value, $pattern, $message, $required = true)
    {
        $field = $this->fields->getField($name);

        // If not required and empty, clear errors
        if (!$required && empty($value)) {
            $field->clearErrorMessage();
            return;
        }

        // Check field and set or clear error message
        if($required && empty($value)){
            $field->setErrorMessage('Required');
            return;
        } else if (!preg_match($pattern, $value)) {
            $field->setErrorMessage($message);
        } else {
            $field->clearErrorMessage();
        }
    }

    // Validate if a value is an email address
    public function isEmail($name, $value, $required = true)
    {
        $field = $this->fields->getField($name);

        // If not required and empty, clear errors
        if (!$required && empty($value)) {
            $field->clearErrorMessage();
            return;
        }

        if($required && empty($value)){
            $field->setErrorMessage('Required');
            return;
        } else if(!filter_var($value, FILTER_VALIDATE_EMAIL)){
            if($field->message == ''){
                $field->message = 'Email is not valid';
            }
            $field->setErrorMessage($field->message);
        }
    }

    // Validate if a value is a URL
    public function isURL($name, $value, $required = true)
    {
        $field = $this->fields->getField($name);

        // If not required and empty, clear errors
        if (!$required && empty($value)) {
            $field->clearErrorMessage();
            return;
        }

        if($required && empty($value)){
            $field->setErrorMessage('Required');
            return;
        } else if(!filter_var($value, FILTER_VALIDATE_URL)){
            if($field->message == ''){
                $field->message = 'URL is not valid';
            }
            $field->setErrorMessage($field->message);
        }
    }

    // Validate if a value is an integer number
    public function isDigit($name, $value, $required = true)
    {
        $field = $this->fields->getField($name);

        // If not required and empty, clear errors
        if (!$required && empty($value)) {
            $field->clearErrorMessage();
            return;
        }

        if($required && empty($value)){
            $field->setErrorMessage('Required');
            return;
        } else if(!ctype_digit($value)){
            if($field->message == ''){
                $field->message = 'It has to be a digit value';
            }
            $field->setErrorMessage($field->message);
        }
    }

    // Validate if a value is a number
    public function isNumber($name, $value, $required = true){
        $field = $this->fields->getField($name);

        // If not required and empty, clear errors
        if (!$required && empty($value)) {
            $field->clearErrorMessage();
            return;
        }

        if($required && empty($value)){
            $field->setErrorMessage('Required');
            return;
        } else if(!is_numeric($value)){
            if($field->message == ''){
                $field->message = 'It has to be a number';
            }
            $field->setErrorMessage($field->message);
        }
    }

    // Validate if a value doesn't contain numeric or special characters
    public function isCharsOnly($name, $value, $required = true){
        $field = $this->fields->getField($name);

        // If not required and empty, clear errors
        if (!$required && empty($value)) {
            $field->clearErrorMessage();
            return;
        }

        if($required && empty($value)){
            $field->setErrorMessage('Required');
            return;
        } else if(!ctype_alpha($value)){
            if($field->message == ''){
                $field->message = 'No numbers or special symbols allowed';
            }
            $field->setErrorMessage($field->message);
        }
    }

    // Validate if a value is equal to the specified value
    public function isEqualTo($name, $value, $valueToCompare, $required = true){
        $field = $this->fields->getField($name);

        // If not required and empty, clear errors
        if (!$required && empty($value)) {
            $field->clearErrorMessage();
            return;
        }

        if($required && empty($value)){
            $field->setErrorMessage('Required');
            return;
        } else if($value !== $valueToCompare){
            if($field->message == ''){
                $field->message = "The value should be equal to $valueToCompare";
            }
            $field->setErrorMessage($field->message);
        }
    }

    // Validate if a value is in range between two specified values
    public function isInRange($name, $value, $minValue, $maxValue, $required = true){
        $field = $this->fields->getField($name);

        // If not required and empty, clear errors
        if (!$required && empty($value)) {
            $field->clearErrorMessage();
            return;
        }

        if($required && empty($value)){
            $field->setErrorMessage('Required');
            return;
        } else if($value < $minValue || $value > $maxValue){
            if($field->message == ''){
                $field->message = "The value should be in range between $minValue and $maxValue";
            }
            $field->setErrorMessage($field->message);
        }
    }


    // Validate if a value is equal or grater than a specified value
    public function isMinimum($name, $value, $minValue, $required = true){
        $field = $this->fields->getField($name);

        // If not required and empty, clear errors
        if (!$required && empty($value)) {
            $field->clearErrorMessage();
            return;
        }

        if($required && empty($value)){
            $field->setErrorMessage('Required');
            return;
        } else if($value < $minValue){
            if($field->message == ''){
                $field->message = "The value should be equal or grater than $minValue";
            }
            $field->setErrorMessage($field->message);
        }
    }

    // Validate if a value is equal or less than a specified value
    public function isMaximum($name, $value, $maxValue, $required = true){
        $field = $this->fields->getField($name);

        // If not required and empty, clear errors
        if (!$required && empty($value)) {
            $field->clearErrorMessage();
            return;
        }

        if($required && empty($value)){
            $field->setErrorMessage('Required');
            return;
        } else if($value > $maxValue){
            if($field->message == ''){
                $field->message = "The value should be less than or equal to $maxValue";
            }
            $field->setErrorMessage($field->message);
        }
    }

    // Validate if a value is a date
    public function isDate($name, $value, $required = true){
        $field = $this->fields->getField($name);

        // If not required and empty, clear errors
        if (!$required && empty($value)) {
            $field->clearErrorMessage();
            return;
        }

        $date_arr  = explode('-', $value);
        if($required && empty($value)){
            $field->setErrorMessage('Required');
            return;
        } else if (count($date_arr) == 3) {
            // $date_arr[2] is a month number
            // $date_arr[1] is a day number
            // $date_arr[0] is a year number
            if (!checkdate(intval($date_arr[1]), intval($date_arr[2]), intval($date_arr[0]))) {
                if($field->message == ''){
                    $field->message = "It is not a valid date. The date format is yyyy-mm-dd";
                }
                $field->setErrorMessage($field->message);
            }
        }
        else {
            if($field->message == ''){
                $field->message = "It is not a valid date. The date format is yyyy-mm-dd";
            }
            $field->setErrorMessage($field->message);
        }
    }


    // Validate if a value's length is equal to the specified length
    public function lengthIsEqualTo($name, $value, $lengthToCompare, $required = true){
        $field = $this->fields->getField($name);

        // If not required and empty, clear errors
        if (!$required && empty($value)) {
            $field->clearErrorMessage();
            return;
        }

        if($required && empty($value)){
            $field->setErrorMessage('Required');
            return;
        } else if(strlen(trim($value)) !== $lengthToCompare){
            if($field->message == ''){
                $field->message = "The value's length should be $lengthToCompare characters";
            }
            $field->setErrorMessage($field->message);
        }
    }

    // Validate if a value's length is in range between two specified lengths
    public function lengthIsInRange($name, $value, $minLength, $maxLength, $required = true){
        $field = $this->fields->getField($name);

        // If not required and empty, clear errors
        if (!$required && empty($value)) {
            $field->clearErrorMessage();
            return;
        }

        if($required && empty($value)){
            $field->setErrorMessage('Required');
            return;
        } else if(strlen(trim($value)) < $minLength || strlen(trim($value)) > $maxLength){
            if($field->message == ''){
                $field->message = "The value's length should be between $minLength and $maxLength characters";
            }
            $field->setErrorMessage($field->message);
        }
    }


    // Validate if a value's length is equal or longer than a specified length
    public function lengthIsMinimum($name, $value, $minLength, $required = true){
        $field = $this->fields->getField($name);

        // If not required and empty, clear errors
        if (!$required && empty($value)) {
            $field->clearErrorMessage();
            return;
        }

        if($required && empty($value)){
            $field->setErrorMessage('Required');
            return;
        } else if(strlen(trim($value)) < $minLength){
            if($field->message == ''){
                $field->message = "The value's length should be equal or longer than $minLength characters";
            }
            $field->setErrorMessage($field->message);
        }
    }

    // Validate if a value's length is equal or shorter than a specified length
    public function lengthIsMaximum($name, $value, $maxLength, $required = true){
        $field = $this->fields->getField($name);

        // If not required and empty, clear errors
        if (!$required && empty($value)) {
            $field->clearErrorMessage();
            return;
        }

        if($required && empty($value)){
            $field->setErrorMessage('Required');
            return;
        } else if(strlen(trim($value)) > $maxLength){
            if($field->message == ''){
                $field->message = "The value should be equal or shorter than $maxLength characters";
            }
            $field->setErrorMessage($field->message);
        }
    }

    // Validate if a value is an image and its format is appropriate
    public function isImage($name, $value, $required = true){
        $field = $this->fields->getField($name);

        // If not required and empty, clear errors
        if (!$required && empty($value)) {
            $field->clearErrorMessage();
            return;
        }

        if($required && empty($value)){
            $field->setErrorMessage('Required');
            return;
        } else {
            // Check if a file is an image
            if (!getimagesize($_FILES["$name"]["tmp_name"])) {
                $field->setErrorMessage('The uploaded file is not an image');
                return;
            }

            // Check if a file has an appropriate format
            $file_type = pathinfo($_FILES["$name"]["name"], PATHINFO_EXTENSION);
            if (!in_array($file_type , array("jpg", "jpeg", "png", "gif", "JPG", "JPEG", "PNG", "GIF"))) {
                $field->setErrorMessage('Sorry, only JPG, JPEG, PNG & GIF files are allowed');
                return;
            }
        }
    }

    // Validate if a file size is not bigger than specified size in bytes
    public function fileSizeIsMaximum($name, $maxSize){
        $field = $this->fields->getField($name);

        if ($_FILES["$name"]["size"] > $maxSize) {
            $field->setErrorMessage("Sorry, your file is too large. Maximum allowed size is $maxSize bytes");
            return false;
        }
    }


    //Validate if password contain number, capital and lowercase letter and also its length is more than minlength
    public function isPassword($name, $value, $minLength, $required = true)
    {
        $field = $this->fields->getField($name);

        // If not required and empty, clear errors
        if (!$required && empty($value)) {
            $field->clearErrorMessage();
            return;
        }

        // Check field and set or clear error message
        if($required && empty($value)){
            $field->setErrorMessage('Required');
            return;
        } else if(strlen(trim($value)) < $minLength){
            if($field->message == ''){
                $field->message = "The value's length should be equal or longer than $minLength characters";
            }
            $field->setErrorMessage($field->message);
        }else if (!preg_match("#[0-9]+#", $value)) {
            $field->setErrorMessage("Your Password Must Contain At Least 1 Number!");
        } else if (!preg_match("#[A-Z]+#", $value)) {
            $field->setErrorMessage("Your Password Must Contain At Least 1 Capital Letter!");
        }  else if (!preg_match("#[a-z]+#", $value)) {
            $field->setErrorMessage("Your Password Must Contain At Least 1 Lowercase Letter!");
        } else {
            $field->clearErrorMessage();
        }
    }


    //Validate if two password match
    public function isPasswordMatch($name, $value, $password, $required = true)
    {
        $field = $this->fields->getField($name);

        // If not required and empty, clear errors
        if (!$required && empty($value)) {
            $field->clearErrorMessage();
            return;
        }

        if($required && empty($value)){
            $field->setErrorMessage('Required');
            return;
        } else if($value !== $password){
            if($field->message == ''){
                $field->message = "The two passwords should match";
            }
            $field->setErrorMessage($field->message);
        }
    }

}
