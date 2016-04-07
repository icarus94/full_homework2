<?php

/**
 * Created by PhpStorm.
 * User: Nikola
 * Date: 26-Mar-16
 * Time: 15:25
 */
class InputTextField
{
    private $description;
    private $name;

    public function __construct($des, $nam)
    {
        $this->description=$des;
        $this->name=$nam;
    }


    public function getName()
    {
        return $this->name;
    }

    function __toString()
    {
        $a="";
        if($this->name!=null and $this->description!=null)
        {
            $default=$this->checkSession();
            $a=$this->description.":<br><input type='text' name='$this->name' value='$default' required><br>";
        }
        return $a;
    }

    function checkSession(){
        $a="";
        if(isset($_SESSION[$this->name]))
        {
            $a=$_SESSION[$this->name];
        }
        return $a;
    }


}