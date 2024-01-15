<?php
    require_once "../config/connexion.php"; 

    $preparedRequest = $connexion->prepare(
        "SELECT content, date_name FROM message"
    );

    $preparedRequest->execute();

    $messages = $preparedRequest->fetchAll(PDO::FETCH_ASSOC);


    echo json_encode($messages);

