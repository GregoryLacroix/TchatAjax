<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?= URL ?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= URL ?>css/style.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>
    <!-- <script type="text/javascript" src="<?= URL ?>js/bootstrap.min.js"></script> -->
    <script type="text/javascript" src="<?= URL ?>js/tchat.js"></script>
    <script type="text/javascript">
    <?php 
    $resultat = $bdd->query("SELECT id FROM messages ORDER BY id LIMIT 1");
    $message = $resultat->fetch(PDO::FETCH_ASSOC);
    if($message['id'] != 0):
    ?>
    var lastid = <?= $message['id'] ?>

    <?php else: ?>    

    var lastid = 1;    

    <?php endif; ?>
    </script>
    <title>Mon TCHAT</title>
</head>
<body>
    <div class="container mon-container">