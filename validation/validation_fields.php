<?php

class ValidationFields
{
    private $fields = array();

    public function addField($name, $error_message = '')
    {
        $field = new ValidationField($name, $error_message);
        $this->fields[$field->getName()] = $field;
    }

    public function getField($name)
    {
        return $this->fields[$name];
    }

    public function isValid()
    {
        foreach ($this->fields as $field) {
            if (!$field->isValid()) {
                return false;
            }
        }
        return true;
    }
}
