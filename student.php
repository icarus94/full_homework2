<?php
    session_start();
    include 'form.php';
    $arrayOfInputTextField[0]= new InputTextField("Ime","ime");
    $arrayOfInputTextField[1]=new InputTextField("Prezime","prezime");
    $arrayOfInputTextField[2]=new InputTextField("Indeks","indeks");
    $arrayOfDropDownMenu[0]=new dropDownMenu("gradovi.txt","lista_gradova","Prebivalište");
    $arrayOfInputTextFieldForSecondForm[0]=new InputTextField("Predmet","predmet");
    $arrayOfInputTextFieldForSecondForm[1]=new InputTextField("Ocena","ocena");
    function getStudentData()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {

        }
    }
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
            <h1>Forma za unos podataka o studentu:</h1>
        </div>
        <div id="firstForm">
            <?=new Form($arrayOfInputTextField,$arrayOfDropDownMenu,"Unesi") ?>
        </div>
        <div>
            <*/?=new Table("PREDMET","OCENA");?*/>
        </div>
        <div id="thirdForm">
            <?=new Form($arrayOfInputTextFieldForSecondForm,null,"Sacuvaj")?>
        </div>
    </body>
</html>
