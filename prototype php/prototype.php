<form action="" method="post">
    <input type="text" name="n1" placeholder="Nombre 1">
    <input type="text" name="n2" placeholder="Nombre 2">

    <select name="op">
        <option value="+">Addition</option>
        <option value="-">Soustraction</option>
        <option value="*">Multiplication</option>
        <option value="/">Division</option>
    </select>

    <button type="submit" name="calc">Calculer</button>

    <br><br>

</form>
<?php

function validerNombre($x){
    return is_numeric($x);
}

function calculer($a, $b, $op, &$msgErr){
    if(!validerNombre($a) || !validerNombre($b)){
        $msgErr = "Erreur: veuillez saisir des nombres valides.";
        return null;
    }

    switch($op){
        case '+':
            return $a + $b;
        case '-':
            return $a - $b;
        case '*':
            return $a * $b;
        case '/':
            if($b == 0){
                $msgErr = "Erreur: division par zéro impossible !";
                return null;
            }
            return $a / $b;
        default:
            $msgErr = "Opération inconnue.";
            return null;
    }
}

if(isset($_POST['calc'])){
    $n1 = $_POST['n1'];
    $n2 = $_POST['n2'];
    $op = $_POST['op'];

    $msgErr = "";
    $resultat = calculer($n1, $n2, $op, $msgErr);

    if($msgErr != ""){
        $res = $msgErr;
    } else {
        $res = "Résultat de la $op = $resultat";
    }
}
?>


