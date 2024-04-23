<?php
    include ("domka.class.php");
?>

<?php

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $json = file_get_contents('php://input');
        $array = json_decode($json);

        $object = new Domka();
        echo $object->postDomka($array);
    }

    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        $object = new Domka();
        echo $object->getCorrectDomka();
    }

?>