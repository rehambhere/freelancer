<?php
namespace System;

class Validation
{
    /**
     * @var Application
     */
    private $app;
    /**
     * errors Container
     * @var array
     */
    private $errors = [];

    public function __construct(Application $app)
    {
        $this->app = $app;
    }
    /**
     * if the given input is not empty
     */
    public function required($inputName, $customErrorMEssage= null )
    {
        if($this->hasError($inputName)){
            return $this;
        }
        $inputValue = $this->value($inputName);
        if(! $inputValue) {
            $message= $customErrorMEssage ? :sprintf('%s is required', ucfirst($inputName));
            $this->addError($inputName, $message);
        }
        return $this;
    }
    /**
     * if the given input is valid email
     */
    public function email($inputName , $customErrorMessage= null)
    {
        if($this->hasError($inputName)){
            return $this;
        }

        $inputValue = $this->value($inputName);
        if(! filter_var($inputValue, FILTER_VALIDATE_EMAIL)){
            $message = $customErrorMessage?:sprintf('%s the email is required', ucfirst($inputName));
            $this->addError($inputName, $message);

        }

        return $this;
    }
    /**
     * if the first input matches the seconde input
     */
    public function match($firstInput, $secondInput, $customErrorMessage = null)
    {
        if($this->hasError($firstInput)){
            return $this;
        }
        $firstInputValue = $this->value($firstInput);
        $secondInputValue = $this->value($secondInput);
        if($secondInputValue != $firstInputValue) {
            $message = $customErrorMessage?:sprintf('%s should match %s', ucfirst($secondInput), ucfirst($firstInput));
            $this->addError($secondInput, $message);

        }
        return $this;

    }
    /**
     * if the given input value should be at least the given
     */
    public function minLen($inputName, $length,$customErrorMessage=null)
    {
        if($this->hasError($inputName)){
            return $this;
        }

        $inputValue = $this->value($inputName);

        if(strlen($inputValue) < $length){
            $message =$customErrorMessage?: sprintf('%s its should least %d',ucfirst($inputName),$length);

            $this->addError($inputName, $message);
        }
        return $this;
    }

    public function maxLen($inputName, $length, $customErrorMessage = null)
    {
        if($this->hasError($inputName)){
            return $this;
        }
        $inputValue = $this->value($inputName);
        if(strlen($inputValue) > $length) {
            $message = $customErrorMessage?:sprintf('%s should be at most  %d',ucfirst($inputName),$length);
            $this->addError($inputName, $message);

        }
        return $this;
    }

    /**
     * if the given input is unique in database
     */
    /**
     * if the given input is unique
     */
    public function unique($inputName, array$databaseData,$customErrorMessage=null)
    {
        if($this->hasError($inputName)){
            return $this;
        }
        $inputValue = $this->value($inputName);
        $table = null;
        $column=null;
        $exceptionColumn = null;
        $exceptionColumnValue = null;
        if(count($databaseData)==2) {
            list($table, $column) = $databaseData;
        } elseif (count($databaseData == 4)) {
            list($table, $column, $exceptionColumn, $exceptionColumnValue)= $databaseData;
        }
        if($exceptionColumn AND $exceptionColumnValue) {
            $result = $this->app->db->select($column)
                ->from($table)
                ->where($column . ' = ? AND '. $exceptionColumnValue. '!= ?', $inputValue, $exceptionColumnValue)
                ->fetch();
        } else {
            $result = $this->app->db->select($column)
                ->from($table)
                ->where($column . ' = ? ', $inputValue)
                ->fetch();
        }
        if($result){
            $message =$customErrorMessage?: sprintf('%s already exists',ucfirst($inputName))  ;
            $this->addError($inputName, $message);
        }

    }

    /**
     *Add input error
     */
    private function addError($inputName, $errorMessage)
    {
        $this->errors[$inputName] = $errorMessage;


    }

    /**
     * get the value for the given input name
     */
    private function value($input)
    {
        $inputValue = $this->app->request->post($input);
        return $inputValue;
    }

    /**
     * if have any error befor esend
     * @param $input
     */
    private function hasError($input)
    {
        return array_key_exists($input, $this->errors);

    }

    /**
     * validat All inputs
     */

    public function validate()
    {

    }

    /**
     * if there any invalid inputs
     */

    public function fails()
    {
        return ! empty($this->errors);
    }

    /***
     * if all inputs are valid
     */
    public function passes()
    {
        return empty($this->errors);
    }
    /**
     * get all errors
     */
    public function getMessages()
    {
        return $this->errors;
    }

    /**
     * add custom message
     */
    public function message($message)
    {
        $this->errors[] = $message;
        return $this;
    }

    /**
     * flatten the messages errors
     */
    public function flattenMessages()
    {
      return implode('<br>',$this->errors);
    }


    /**
     *
     */
    public function requiredFile($inputName, $cusomErrorMessage = null)
    {
        if($this->hasError($inputName)) {
            return $this;
        }
        $file = $this->app->request->file($inputName);
        if(! $file->exists()) {
            $message = $cusomErrorMessage?:sprintf('%s the file  is required', ucfirst($inputName));
            $this->addError($inputName, $message);
        }
    }

    /**
     * validate is_image
     */
    public function image($inputName, $cusomErrorMessage = null)
    {
        if($this->hasError($inputName)) {
            return $this;
        }
        $file = $this->app->request->file($inputName);
        if(! $file->exists())
        {
            return $this;
        }
            if(! $file->isImage()) {
            $message = $cusomErrorMessage?:sprintf('%s the file  is required', ucfirst($inputName));
            $this->addError($inputName, $message);
        }
    }



}