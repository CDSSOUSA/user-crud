<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home :: <?= esc($title); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

</head>

<body class="container">
  
    <div class="p-5 text-center bg-body-tertiary rounded-3 mb-5 mt-5">
        <h1 class="text-body-emphasis"><?= esc($title); ?></h1>       
        <p class="lead">Exemplo de um CRUD básico. Feito com PHP, Codigininer 4.3.5, Bootsrap 5.3.0</p>        
        <?= $button;?>
    </div>

  