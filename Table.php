<?php



class Table
{
    private $parametar1,$parameter2,$a,$b,$c,$d;

    public function __construct($par1,$par2,$a,$b,$c,$d)
    {
        $this->parametar1=$par1;
        $this->parameter2=$par2;
        $this->a=$a;
        $this->b=$b;
        $this->c=$c;
        $this->d=$d;

    }

    function __toString()
    {
        $a="";
        if(isset($this->parameter2) and isset($this->parametar1))
        {
            $var=$this->getTableDataFromSession($this->a,$this->b,$this->c,$this->d);
            $a="<table><tr><td id=\"rb\"><b>REDNI BROJ</b></td>";
            $a.="<td><b>$this->parametar1<b></td><td><b>$this->parameter2</b></td>";
            $a.="</tr>$var</table>";
        }
        return $a;
    }
    function getTableDataFromSession($a,$b,$c,$d)
    {
        $x="";
        $i=1;
        if(isset($_SESSION["$a"]) and isset($_SESSION["$b"])
            and isset($_SESSION["$c"]) and isset($_SESSION["$d"])) {
            $id=$_SESSION[$a].$_SESSION[$b].$_SESSION[$c].$_SESSION[$d];
            echo "proso";
            var_dump($_SESSION[$id]);
            if (isset($_SESSION[$id][$i][1])) {
                do {
                    $col1 = $_SESSION[$id][$i][1];
                    $col2 = $_SESSION[$id][$i][2];
                    $x = $x . "<tr>
                        <td id='rb'><b> $i</b></td>
                        <td><b> $col1 <b></td>
                        <td><b> $col2 </b></td>
                      </tr>";
                } while (isset($_SESSION[$id][++$i][1]));
            }
        }
        return $x;
    }
}