<?php 
    require_once "connect.php";

    $insert = "INSERT INTO usuarios(usuario, email, senha, token, acesso)
     VALUES ('teste', 'teste@gmail.com', 'teste', 'testetoken', '1')";

   

    if ( $mysqli->query($insert) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $insert . "<br>" . $mysqli->error;
    }
?>