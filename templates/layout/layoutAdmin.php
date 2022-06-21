<?php

$this->loadHelper('Authentication.Identity');
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

$cakeDescription = 'Bull Gym';
?>


<!DOCTYPE html>
<html>

<head>

    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>


    <?= $this->Html->css(['bootstrap.min', 'font-awesome.min','flaticon','owl.carousel.min', 'barfiller',  'maginific-popup',   'slicknav.min', 'style']) ?>

    
    
    

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>



    <!-- Google Font -->


    <?= $this->Html->meta([
        'link' => 'https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap',
        'rel' => 'stylesheet'
    ]);

    ?>

    <?= $this->Html->meta([
        'link' => 'https://fonts.googleapis.com/css?family=Oswald:300,400,500,600,700&display=swap',
        'rel' => 'stylesheet'
    ]);

    ?>

<?= $this->Html->meta([
        'link' => 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css',
        'rel' => 'stylesheet'
    ]);

    ?>





</head>
<body>

<!-- Header Section Begin -->
<!-- Page Preloder -->
<div id="preloder">
    <div class="loader"></div>
</div>

<!-- Offcanvas Menu Section Begin -->
<div class="offcanvas-menu-overlay"></div>
<div class="offcanvas-menu-wrapper">
    <div class="canvas-close">
        <i class="fa fa-close"></i>
    </div>
    <div class="canvas-search search-switch">
        <i class="fa fa-search"></i>
    </div>
    <nav class="canvas-menu mobile-menu">
        <ul>
            <li><?php echo $this->Html->link('Inicio', ['controller' => 'Pages', 'action' => 'home']) ?></li>
            <li><a href="./about-us.html">About Us</a></li>
            <li><a href="./classes.html">Classes</a></li>
            <li><a href="./services.html">Services</a></li>
            <li><a href="./team.html">Our Team</a></li>
            <li><a href="#">Pages</a>
                <ul class="dropdown">
                    <li><a href="./about-us.html">About us</a></li>
                    <li><a href="./class-timetable.html">Classes timetable</a></li>
                    <li><a href="./bmi-calculator.html">Bmi calculate</a></li>
                    <li><a href="./team.html">Our team</a></li>
                    <li><a href="./gallery.html">Gallery</a></li>
                    <li><a href="./blog.html">Our blog</a></li>
                    <li><a href="./404.html">404</a></li>
                </ul>
            </li>
            <li><a href="./contact.html">Contact</a></li>
        </ul>
    </nav>
    <div id="mobile-menu-wrap"></div>
    <div class="canvas-social">
        <a href="#"><i class="fa fa-facebook"></i></a>
        <a href="#"><i class="fa fa-twitter"></i></a>
        <a href="#"><i class="fa fa-youtube-play"></i></a>
        <a href="#"><i class="fa fa-instagram"></i></a>
    </div>
</div>
<!-- Offcanvas Menu Section End -->

<!-- Header Section Begin -->
<header class="header-section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3">
                <div class="logo">
                    <a href="./index.html">
                        <?php echo $this->Html->image('logo.png', ['alt' => '', 'url'=>['controller' => 'Pages', 'action'  => 'index']]); ?>
                    </a>
                </div>
            </div>
            <div class="col-lg-6">
                <nav class="nav-menu">
                    <ul>
                        <li class="active"> <?php echo $this->Html->link('Inicio', ['controller' => 'Pages', 'action' => 'index']) ?></li>
                        <li><?php echo $this->Html->link('Noticias', ['controller' => 'Noticias', 'action' => 'index']) ?></li>
                        <li><?php echo $this->Html->link('Actividades', ['controller' => 'Actividades', 'action' => 'index']) ?></li>
                        <li><?php echo $this->Html->link('Galeria', ['controller' => 'Fotos', 'action' => 'index']) ?></li>

                    <li><a href="#">Administracion</a>
                    <ul class="dropdown">
                    <li><?php echo $this->Html->link('Gestion de usuarios', ['controller' => 'Users', 'action' => 'admin']) ?></li>
                    <li><?php echo $this->Html->link('Gestion de actividades', ['controller' => 'Actividades', 'action' => 'admin']) ?></li>
                    <li><?php echo $this->Html->link('Gestion de rutinas', ['controller' => 'Rutinas', 'action' => 'admin']) ?></li>
                    <li><?php echo $this->Html->link('Gestion de noticias', ['controller' => 'Noticias', 'action' => 'admin']) ?></li>
                    <li><?php echo $this->Html->link('Gestion de galeria', ['controller' => 'Fotos', 'action' => 'admin']) ?></li>
                    
                    </ul>
                </li>
                        
                        <?php if ($this->Identity->isLoggedIn()) :  ?><li><?php echo $this->Html->link('Logout', ['controller' => 'Users', 'action' => 'logout']) ?></li>
                        <?php else : ?>
                        <li><?php echo $this->Html->link('Área Personal', ['controller' => 'Users', 'action' => 'login']) ?></li>
                        <li><?php echo $this->Html->link('Date de Alta', ['controller' => 'Users', 'action' => 'register']) ?></li>
                        <?php endif ?>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3">
                <div class="top-option">
                    <div class="to-search search-switch">
                        <i class="fa fa-search"></i>
                    </div>
                    <div class="to-social">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-youtube-play"></i></a>
                        <a href="#"><i class="fa fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="canvas-open">
            <i class="fa fa-bars"></i>
        </div>
    </div>
</header>
<!-- Header End -->






<?= $this->Flash->render() ?>
<?= $this->fetch('content') ?>










    <!-- Footer Section Begin -->
    <section class="footer-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="fs-about">
                        <div class="fa-logo">
                            <?php echo $this->Html->image('logo.png', ['alt' => '']); ?>
                        </div>
                        <p>Av. de Lobete, número 3, 26003 Logroño, La Rioja</p>
                        <div class="fa-social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-youtube-play"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <?php echo $this->Html->link("<i class='fa fa-twitter'></i>", ['action' => ''], ['escape' => false]) ?>

                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6">
                    <div class="fs-widget">
                        <h4>Useful links</h4>
                        <ul>
                            <li><a href="#">About</a></li>
                            <li><a href="#">Blog</a></li>
                            <li><a href="#">Classes</a></li>
                            <li><a href="#">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6">
                    <div class="fs-widget">
                        <h4>Support</h4>
                        <ul>
                            <li><a href="#">Login</a></li>
                            <li><a href="#">My account</a></li>
                            <li><a href="#">Subscribe</a></li>
                            <li><a href="#">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="fs-widget">
                        <h4>Tips & Guides</h4>
                        <div class="fw-recent">
                            <h6><a href="#">Physical fitness may help prevent depression, anxiety</a></h6>
                            <ul>
                                <li>3 min read</li>
                                <li>20 Comment</li>
                            </ul>
                        </div>
                        <div class="fw-recent">
                            <h6><a href="#">Fitness: The best exercise to lose belly fat and tone up...</a></h6>
                            <ul>
                                <li>3 min read</li>
                                <li>20 Comment</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="copyright-text">
                        <p>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;<script>
                                document.write(new Date().getFullYear());
                            </script> All rights reserved | Alejandro agudelo made it with <i class="fa fa-heart" aria-hidden="true"></i> 
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?= $this->Html->script(['jquery-3.3.1.min', 'bootstrap.min', 'jquery.magnific-popup.min', 'masonry.pkgd.min', 'jquery.barfiller',  'jquery.slicknav', 'owl.carousel.min', 'main',]) ?>



</body>

<!-- Footer Section End -->