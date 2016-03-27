<?php


class Table
{
    private $parametar1,$parameter2;

    public function __construct($par1,$par2)
    {
        $this->parametar1=$par1;
        $this->parameter2=$par2;
    }

    function __toString()
    {
        $a="";
        if(isset($this->parameter2) and isset($this->parametar1))
        {
            $var=$this->getTableDataFromSession();
            $a="<table><tr>
                    <td><b>REDNI BROJ</b></td>
                    <td><b>".$this->parameter1."<b></td>
                    <td><b>".$this->parameter2."</b></td>
                  </tr>.$var.
                </table>";
        }
        return $a;
    }
    function getTableDataFromSession()
    {
        $a="";
        /*if($_SESSION[][][])
        {

        }*/
        return $a;
    }
}