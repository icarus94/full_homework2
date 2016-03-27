<?php
    include 'inputTextField.php';
    include 'dropDownMenu.php';
class Form
{
    private $inputTextField;
    private $dropDownMenu;
    private $nameForSubmitButton;

    /**
     * @return mixed
     */
    public function getInputTextField()
    {
        return $this->inputTextField;
    }

    /**
     * @return mixed
     */
    public function getDropDownMenu()
    {
        return $this->dropDownMenu;
    }

    function __construct($arrayOfInputTextField, $arrayOfDropDownMenu, $nameForSubmitButton)
    {
        $this->inputTextField = $arrayOfInputTextField;
        $this->dropDownMenu = $arrayOfDropDownMenu;
        $this->nameForSubmitButton=$nameForSubmitButton;
    }


    function __toString()
    {
       $a=null;
       if(isset($this->inputTextField))
       {
           foreach ($this->inputTextField as $input)
           {
               if($a==null)
               {
                   $a=$input;
                   continue;
               }
               $a=$a.$input;
           }
       }
       if(isset($this->dropDownMenu))
       {
           foreach ($this->dropDownMenu as $input)
           {
               if($a==null)
               {
                   $a=$input;
                   continue;
               }
               $a=$a.$input;
           }
       }
       $a=$a."<input type=\"submit\" value=".$this->nameForSubmitButton." name=\"form_submit\">";
       return "<form method='post' action=".$_SERVER['PHP_SELF'].">".$a."</form>";
    }


}