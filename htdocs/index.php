<?php
require_once './config/db_connexion.php';

$preparedRequest =  $connexion->prepare(
    "SELECT * FROM message 
    JOIN user
        ON user.id = message.user_id
    ORDER BY message.date_name ASC
    "
);
$preparedRequest->execute();
$messages = $preparedRequest->fetchAll(PDO::FETCH_ASSOC);
?>

<?php $prepareRequest = $connexion->prepare("SELECT * FROM `user` ORDER BY `user`.`id` ASC ;");

$prepareRequest->execute();

$listusers = $prepareRequest->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Chat a PT</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="./style//style.css">
</head>

<body>
    <div class="header">
        <img src="./img/chat.png" class="logo" alt="Logo de Chat a PT">
        <span class="text-light">Chat a PT</span>
    </div>

    <div class="chat-container">
        <div class="message-list">
            <?php foreach ($messages as $key => $message) { ?>
                <div class="message <?= $message['pseudo'] === 'Robin' ? 'user-message' : '' ?>">
                    <b><?= $message['pseudo'] ?>:</b>
                    <?= $message['content'] ?>
                </div>
            <?php } ?>

            <div class="input-group">
                <form action="./process/process_add_user_message.php" method="post">
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="Pseudo" id="pseudo" name="pseudo">
                    </div>
                    <div class="mb-3">
                        <textarea class="form-control" placeholder="Message" id="content" name="message" rows="5"></textarea>
                    </div>
                    <input id="ip_adress" type="hidden" name="ip_adress" value="<?= $_SERVER['REMOTE_ADDR'] ?>">
                    <button type="submit" class="btn btn-warning">Envoyer</button>
                </form>
            </div>
        </div>

        <div class="user-list">
            <h3>Personne en ligne</h3>
            <?php foreach ($listusers as $key) { ?>
                <div class="online-profile">
                    <img src="./img/pvert.png" width="30px" alt="">
                    <span class="fw-bold"><?= $key['pseudo'] ?></span>
                </div>
            <?php  } ?>
        </div>
    </div>

    <script src="https://kit.fontawesome.com/776d2897eb.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="./asset js/ajax_add_user_message.js"></script>


            
</body>

</html>