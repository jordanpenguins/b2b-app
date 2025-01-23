<?php
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

$cakeDescription = 'Manage Data';
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
    <?= $this->Html->meta(
        'favicon.ico',
        '/favicon.ico',
        ['type' => 'icon']
    ); ?>

    <?= $this->Html->css('https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css', ['integrity' => 'sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH', 'crossorigin' => 'anonymous']) ?>
    <?= $this->Html->css('https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css') ?>
    <?= $this->Html->css('https://cdn.jsdelivr.net/npm/choices.js@11.0.2/public/assets/styles/choices.min.css') ?>
    <?= $this->Html->css(['normalize.min', 'milligram.min', 'fonts', 'cake']) ?>


    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
<nav class="navbar bg-dark navbar-expand-lg bg-body-tertiary pt-3 mb-5 top-nav-links" data-bs-theme="dark">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?= $this->Url->build('/') ?>">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $this->Url->build(['controller' => 'Projects', 'action' => 'index']) ?>">Project</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $this->Url->build(['controller' => 'Contractors', 'action' => 'index']) ?>">Contractor</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $this->Url->build(['controller' => 'Organisations', 'action' => 'index']) ?>">Organisations</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'index']) ?>">Users</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $this->Url->build(['controller' => 'Contacts', 'action' => 'index']) ?>">Contacts</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $this->Url->build(['controller' => 'Industries', 'action' => 'index']) ?>">Industries</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $this->Url->build(['controller' => 'Skills', 'action' => 'index']) ?>">Skills</a>
                </li>

                <?php
                if ($this->Identity->isLoggedIn()) {
                    echo $this->Html->link('Logout', ['controller' => 'Users', 'action' => 'logout'], ['class' => 'nav-link']);
                } else {
                    echo $this->Html->link('Login', ['controller' => 'Users', 'action' => 'login'], ['class' => 'nav-link']);
                }
                ?>

            </ul>
        </div>
    </div>
</nav>
    <main class="main">
        <div class="container">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
    </main>
    <footer>
    </footer>

    <!-- Add jQuery, Popper.js, and Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="
https://cdn.jsdelivr.net/npm/choices.js@11.0.2/public/assets/scripts/choices.min.js
"></script>
</body>
</html>
