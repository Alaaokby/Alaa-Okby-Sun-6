<?php

class Image{
    public $image,$imgName,$ext,$randomStr,$imgNewName,$imgTmpName;
    public function __construct()
    {
        if (isset($_POST["submit"])) {
            $this->image=$_FILES["img"];
            $this->imgName=$this->image["name"];
            $this->ext=pathinfo($this->imgName, PATHINFO_EXTENSION);
            $this->imgTmpName=$this->image["tmp_name"];


        }
    }
    public function validate(){
        if(! in_array($this->ext,["jpg","jpeg","png","gif"]))
    {
        return false;
    }
    else {
        return true;
    }
    }
    public function rename(){
        $this->randomStr=uniqid();
        $this->imgNewName="$this->randomStr.$this->ext";
        echo $this->imgNewName;
        return $this;
    }
    public function upload(){
        move_uploaded_file($this->imgTmpName, "uploads/$this->imgNewName");

    }
}
$img=new Image;
echo $img->rename()->upload();
?>