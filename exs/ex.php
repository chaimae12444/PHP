<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
        <label for="nom">Name :</label><br>
        <input id="nom" name="nom" type="text"><br>
        <label for="age">Age :</label><br>
        <input type="text" name="age" id="age"><br>

        <label for="check">Genre :</label><br>
        <input type="radio" name="gendre" id="check" value="male">Male
        
        <input type="radio" name="gendre" value="female">Female

        <br><br>
        <button type="submit" name= "send">Submit</button>
    </form>

<?php
$errors="<ul>";
if (isset($_POST["send"])){

    if (!empty ($_POST['nom']) && !empty ($_POST['age']) && !empty ($_POST['gendre']) && is_numeric ($_POST['age'])  ){
    
    $name = $_POST ["nom"];
    $age = $_POST ["age"];
    $gender = $_POST ["gendre"];

    $textGender="Ms";

        if ($gender == "male"){
         $textGender="Mr";

    } 
    echo "$textGender $name a $age";
    }
    else{
       if(empty ($_POST['nom'])){
        $errors.="<li>Name is empty !</li>";

       }
        if(empty ($_POST['age'])){
        $errors.="<li>Age is empty !</li>";

       }
        if(empty ($_POST['gendre'])){
        $errors.="<li>Gender is empty !</li>";

       }
        if(!is_numeric ($_POST['age'])){
        $errors.="<li>Age is not a number !</li>";

       }
       $errors.="</ul>";
       echo $errors;
    }
}
?>
</body>
</html>