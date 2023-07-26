<?php

$username= filter_input(INPUT_POST,'username');


//verifica si el campo está vacio o no para realizar el proceso.
if (!empty($username)) {
    require __DIR__."/database.php";
    $insertUserInfo= "INSERT INTO usuarios (username)
                    VALUES (?)";
    $statementObjet=$mysqli->stmt_init();
    if(!$statementObjet->prepare($insertUserInfo)){

        die("Error SQL: ".$mysqli->error);
    }
    //Enlace de la variable obtenida mediante POST al espacio vacio '?' en el insert en VALUES.
    $statementObjet->bind_param("s",$_POST["username"]);

    //Al ejecutarse indica si fue exitoso o no la insercion de datos en la tabla.
    try {
        $statementObjet->execute();
        //envio de pagina con mensaje de ingreso exitoso.
        header("Location: ../Views/success.html");
        exit;
    } catch (Exception $e) {
        if ($e->getCode()==1062) {
            echo 'Error: ','Este usuario ya existe', "\n";
        }else{
            echo 'Error: ',  $e->getMessage(), "\n";
        }
        
        die();
    }
    
                 
    
}
else {
    echo 'Nombre de usuario no debería estar vacío';
}




?>
