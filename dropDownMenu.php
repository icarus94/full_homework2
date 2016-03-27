<?php


class dropDownMenu
{
    private $url;
    private $name;
    private $description;

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }


    public function __construct($url,$nam,$des)
    {
        $this->name=$nam;
        $this->url=$url;
        $this->description=$des;
    }


    function __toString()
    {
        $a="";
        if(isset($this->url) && isset($this->name))
        {
            $a=$this->description.":<br>".$this->getDataFromText($this->url,$this->name);
        }
        return $a;
    }

    function getDataFromText($textlocation,$name){
        $handle = fopen($textlocation, "r");
        $data="";
        if ($handle) {
            $lineNumber=1;
            $data="<select name=".$name.">";
            while (($line = fgets($handle)) !== false) {
                if($line!=null && $line!="" && ctype_space($line)===false ){
                    if(isset($_SESSION[$name])) {
                        if ($lineNumber == $_SESSION[$name]) {
                            $data = $data . "<option selected value=" . $lineNumber . ">$line</option>";
                            $lineNumber++;
                            continue;
                        }
                    }
                    $data=$data."<option value=".$lineNumber.">$line</option>";
                    $lineNumber++;
                }
            }
            $data=$data."</select><br>";
        }
        fclose($handle);
        return $data;
    }


}