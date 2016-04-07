<?php
    session_start();


    include 'form.php';
    $arrayOfInputTextField[0]= new InputTextField("Ime","ime");
    $arrayOfInputTextField[1]=new InputTextField("Prezime","prezime");
    $arrayOfInputTextField[2]=new InputTextField("Indeks","indeks");
    $arrayOfDropDownMenu[0]=new dropDownMenu("gradovi.txt","lista_gradova","Prebivalište");
    $arrayOfInputTextFieldForSecondForm[0]=new InputTextField("Predmet","predmet");
    $arrayOfInputTextFieldForSecondForm[1]=new InputTextField("Ocena","ocena");
    function getStudentData($a,$b,$c,$d,$e,$f)
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            if(isset($_POST[$a]) and isset($_POST[$b])
            and isset($_POST[$c]) and isset($_POST[$d]))
            {
                $_SESSION[$a]=$_POST[$a];
                $_SESSION[$b]=$_POST[$b];
                $_SESSION[$c]=$_POST[$c];
                $_SESSION[$d]=$_POST[$d];
            }
            if(isset($_POST[$e])and isset($_POST[$f]) and isset($_SESSION[$a]) and isset($_SESSION[$b])
                and isset($_SESSION[$c]) and isset($_SESSION[$d]))
            {
                $i=1;
                $id=$_SESSION[$a].$_SESSION[$b].$_SESSION[$c].$_SESSION[$d];
                while(isset($_SESSION[$id][$i][1])){
                    $i++;
                }
                $_SESSION[$id][$i][1]=$_POST[$e];
                $_SESSION[$id][$i][2]=$_POST[$f];
            }
        }
    }
    getStudentData("ime","prezime","indeks","lista_gradova","predmet","ocena");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="author" content="Trajko">
        <meta charset="UTF-8">
        <title>Studentska administracija</title>
        <link rel="stylesheet" type="text/css" href="css/mycss.css">
    </head>
    <body>
        <div>
            <h2>Forma za unos podataka o studentu:</h2>
        </div>
        <div id="firstForm">
            <h2>Forma za studenta</h2>
            <?=new Form($arrayOfInputTextField,$arrayOfDropDownMenu,"Unesi") ?>
        </div>
        <div style="text-align: center">
            <h2>Spisak predmeta sa ocenama studenta <?php if(isset($_SESSION['ime']) and isset($_SESSION['prezime']))
                {echo $_SESSION['ime']." ".$_SESSION['prezime'];}
                else{echo "unspecified";}?>:</h2>
            <?=new Table("PREDMET","OCENA","ime","prezime","indeks","lista_gradova");?>
        </div>
        <div id="thirdForm">
            <h2>Unos predmeta</h2>
            <?=new Form($arrayOfInputTextFieldForSecondForm,null,"Sacuvaj")?>
        </div>
    </body>
</html>
