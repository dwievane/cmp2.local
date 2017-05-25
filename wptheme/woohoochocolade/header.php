<!DOCTYPE html>
<html>
<head>
    <title>Home - Woohoo Chocolade</title>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="#">  
    <!-- Google Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Baloo" rel="stylesheet">
    <?php wp_head(); ?>
</head>
<body>
    <div class="header">
        <div class="container-fluid">
            <div class="container">

            <div class="img_logo">
                <?php
                    // Display the Custom Logo
                    the_custom_logo();
                    ?>
            <?php
            wp_nav_menu( array(
                'theme_location' => 'my-custom-menu',
                'container_class' => 'custom-menu-class' ) );
            ?>
            </div>
        </div>
    </div><!-- /.header -->