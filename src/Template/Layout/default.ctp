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
</head>
<body>
    <nav class="top-bar expanded" data-topbar role="navigation">
        <ul class="title-area large-3 medium-4 columns">
            <li class="name">
                <h1><a href=""><?= $this->fetch('title') ?></a></h1>
            </li>
        </ul>
        <div class="top-bar-section">
        <ul class="left">
                        <li><?php
                            $loguser = $this->request->session()->read('Auth.User');
                            $id = $this->request->session()->read('Auth.User.id');
                            $type = $this->request->session()->read('Auth.User.type');
                             if ($loguser) {
                                $user = $loguser['email'];
                                if($type == 1) {
                                    echo $this->Html->link($user . ' Visiteur', ['controller' => 'Users', 'action' => 'view', $id]);
                                } else if ($type == 2){
                                    echo $this->Html->link($user . ' Manager', ['controller' => 'Users', 'action' => 'view', $id]);
                                } else if ($type == 3){
                                    echo $this->Html->link($user . ' Admin', ['controller' => 'Users', 'action' => 'view', $id]);
                                }
                            } else {
                                echo $this->Html->link('Visiteur', ['controller' => 'Users', 'action' => 'index']);
                            }
                            ?></li>
                            <li>
                            <?php
                                $loguser = $this->request->session()->read('Auth.User');
                                if (!$loguser) {
                                    echo $this->Html->link('Create new account', ['controller' => 'Users', 'action' => 'add']);
                                }
                            ?>
                            </li>
                            <li>
                            <?php
                            echo $this->Html->link('À Propos', ['controller' => 'Propos', 'action' => 'index']);
                            ?>
                            </li>
                    </ul>
            <ul class="right">
                <li><?php
                    $loguser = $this->request->session()->read('Auth.User');
                     if ($loguser) {
                        $user = $loguser['email'];
                        echo $this->Html->link('logout', ['controller' => 'Users', 'action' => 'logout']);
                    } else {
                        echo $this->Html->link('login', ['controller' => 'Users', 'action' => 'login']);
                    }
                    ?>
                    </li>
                    <li><?php
                    echo $this->Html->link('Français', ['action' => 'changeLang', 'fr_CA'], ['escape' => false])
                    ?></li>
                    <li><?php
                    echo $this->Html->link('Polish', ['action' => 'changeLang', 'pl'], ['escape' => false])
                    ?></li>
                    <li><?php
                    echo $this->Html->link('English', ['action' => 'changeLang', 'en_US'], ['escape' => false])
                    ?></li>
                <li><a target="_blank" href="https://book.cakephp.org/3.0/">Documentation</a></li>
                <li><a target="_blank" href="https://api.cakephp.org/3.0/">API</a></li>
            </ul>
        </div>
    </nav>
    <?= $this->Flash->render() ?>
    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>
    <footer>
    </footer>
</body>
</html>
