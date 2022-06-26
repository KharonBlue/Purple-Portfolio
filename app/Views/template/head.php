<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Purple Art</title>
</head>
<body>
    <div class="nav-box">
        <nav>
            <ul>
                <li><a href="<?=base_url('/') ?>">Inicio</a></li>
                <li><a href="<?=base_url('portfolio/create') ?>">Crear</a></li>
                <li><a href="<?=base_url('portfolio/list') ?>">Listar</a></li>
                <li>
                    <ul>
                        <li><a href="<?=base_url('session') ?>"></a></li>
                        <li><a href="<?=base_url('profile') ?>">Perfil</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
    <h1>Purple Art</h1>
    <?php if(session('message')){ ?>
<div class="alert">
<?php echo session('message'); ?>
</div>
<?php } ?>
    
