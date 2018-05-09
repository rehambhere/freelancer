<?php
namespace System\Http;
class UploadedFile
{
    /**
     * @var array
     * the uploded file
     */
    private $file =[];
    /**
     * uplod file name
     * @var
     */
    private $fileName;
    /**
     * uploaded file name without extintion
     * @var
     */
    private $nameOnly;
    /**
     * extinsion
     * @var
     */
    private $extension;
    /**
     * uploaded mim type
     * @var
     */
    private $mimType;
    /**
     * temp file
     * @var
     */
    private $tempFile;
    /**
     * dize
     * @var
     */
    private $size;
    /**
     * uploade file errors
     * @var
     */
    private $error;
    /**
     * uploaded kind
     * @var array
     */
    private  $allowedImageExtension=['gif','jpg','jpeg','png'];

    public function __construct($input)
    {
        $this->getFileInfo($input);
    }

    /**
     * start collection uploaded file data
     */
    private function getFileInfo($input)
    {
        if(empty($_FILES[$input])){
            return;
        }
        $file = $_FILES[$input];
        $this->error = $file['error'];
        if($this->error != UPLOAD_ERR_OK){
            return;
        }
        $this->file = $file;

        $this->fileName = $this->file['name'];
        $fileNameInfo = pathinfo($this->fileName);


        $this->nameOnly = strtolower($fileNameInfo['basename']);
        $this->extension = $fileNameInfo['extension'];

        $this->mimType =$this->file['type'];
        $this->tempFile = $this->file['tmp_name'];
        $this->size =$this->file['size'];
        

    }

    /**
     * if the is uploades
     */
    public function exists()
    {
        return ! empty($this->file);

    }

    /**
     * get file name
     */
    public function getFileName()
    {
        return $this->fileName;
    }

    /**
     * get file name without ext
     */
    public function getNameOnly()
    {
        return $this->nameOnly;
    }

    /**
     * get file extension
     */
    public function getExtension()
    {
        return $this->extension;
    }

    /**
     * get File mim type
     */
    public function getMimType()
    {
        return $this->mimType;
    }

    /**
     * get File kind is Image
     */
    public function isImage()
    {
        if(strpos($this->mimType, 'image/')===0 AND in_array($this->extension, $this->allowedImageExtension))
        {
            return true;
        }
        return false;
    }

    /**
     * Move the uploaded file to the given target
     */
    public function moveTo($target,$newFileName = null )
    {
        $fileName = $newFileName ? : sha1(mt_rand()).'_'.sha1(mt_rand());
        $fileName .= '.'. $this->extension;
        if( ! is_dir($target)) {
            mkdir($target, 0777, true);
        }
        $uploadedFilePath= rtrim($target,'/').'/'. $fileName;
        move_uploaded_file($this->tempFile, $uploadedFilePath);
      return $fileName;
    }

   



}