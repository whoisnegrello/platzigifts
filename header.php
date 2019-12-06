<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <?php wp_head(); ?>
</head>

<body>

    <header>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-4 col-12">
                    <img src="<?php echo get_template_directory_uri();?>/assets/img/logo.png" alt="logo">
                </div>
                <div class="col-md-8 col-12">
                    <nav>
                        <?php wp_nav_menu(array(
                            'theme_location' => 'top_menu',
                            'menu_class' => 'menu-principal',
                            'container_class' => 'container-menu',
                        ));?>
                    </nav>
                </div>
            </div>
        </div>
    </header>