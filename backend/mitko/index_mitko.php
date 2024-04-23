<?php
    include ("mitko.class.php");
?>

<?php

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $json = file_get_contents('php://input');
        $array = json_decode($json);

        $object = new Mitko();
        echo $object->postMitko($array);
    }

    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        $object = new Mitko();
        echo $object->getCorrectMitko();
    }

?>