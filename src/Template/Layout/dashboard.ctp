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
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>

<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('style.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>

<body>
    <?= $this->element('Appointment/loader') ?>
    <nav class="top-bar expanded" data-topbar role="navigation">
        <ul class="title-area large-3 medium-4 columns">
            <li class="name">
                <h1><a href=""><?= $this->fetch('title') ?></a></h1>
            </li>
        </ul>
    </nav>
    <?= $this->Flash->render() ?>
    <nav class="large-3 medium-4 columns" id="actions-sidebar" style="display: block">
        <ul class="side-nav">
            <li class="nav-item">
                <?= $this->Html->link('Usuários', ['controller' => 'Users', 'action' => 'index'], ['class' => 'nav-link']) ?>
            </li>
            <li class="nav-item">
                <?= $this->Html->link('Agenda', ['controller' => 'Appointments', 'action' => 'index'], ['class' => 'nav-link']) ?>
            </li>
            <li class="nav-item">
                <?= $this->Html->link('Calendario (V2, INCOMPLETO)', ['controller' => 'Appointments', 'action' => 'index_v2'], ['class' => 'nav-link']) ?>
            </li>
        </ul>
    </nav>

    <div class="large-9 medium-8 columns" id="actions-sidebar" style="display: block">
        <div class="panel panel-default">
            <div class="panel-heading">
                <?= $this->fetch('title') ?>
            </div>
            <div class="panel-body">
                <?= $this->fetch('content') ?>
            </div>
        </div>
    </div>


    <footer>
    </footer>

    <script>
        function get(url, success = null, error = null) {
            success = success ?? ((res) => {
                console.log("Default SUCCESS Message", res);
            })

            error = error ?? ((jqXHR, textStatus, errorThrown) => {
                console.error("Default ERROR Message:", textStatus, errorThrown);
            })

            loader(true);
            $.ajax({
                url: url,
                type: 'GET',
                success: success,
                error: error,

            }).always(() => loader());
        }

        $(document).ready(() => {
            get('/appointments/verify-appointments', (res) => {
                console.log(res);
            })
        });
    </script>
</body>

</html>