<?php

class ValidationField
{
    private $name;
    private $error_message = '';
    private $is_valid = true;

    public function __construct($name, $error_message = '')
    {
        $this->name = $name;
        $this->message = $error_message;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getErrorMessage()
    {
        return $this->error_message;
    }

    public function isValid()
    {
        return $this->is_valid;
    }

    public function setErrorMessage($error_message)
    {
        $this->error_message = $error_message;
        $this->is_valid = false;
    }

    public function clearErrorMessage()
    {
        $this->error_message = '';
        $this->is_valid = true;
    }

    public function getHTMLError()
    {
        $error_message = htmlspecialchars($this->error_message);
        if (!$this->isValid()) {
            return "<span class='err-msg'>$error_message</span>";
        } else {
            return '';
        }
    }
}
