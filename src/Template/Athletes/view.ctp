<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Athlete $athlete
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Athlete'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('Edit Athlete'), ['action' => 'edit', $athlete->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Athlete'), ['action' => 'delete', $athlete->id], ['confirm' => __('Are you sure you want to delete # {0}?', $athlete->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Athletes'), ['controller' => 'Athletes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Clubs'), ['controller' => 'Clubs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Events'), ['controller' => 'Events', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Event Types'), ['controller' => 'Eventtypes', 'action' => 'index']) ?></li>
        <li>
        <?php
        $type = $this->request->session()->read('Auth.User.type');
            if ($type == 3) {
                echo $this->Html->link(__('List Genres'), ['controller' => 'Genres', 'action' => 'index']);
            }
        ?>
        </li>
        <li>
        <?php
            $type = $this->request->session()->read('Auth.User.type');
            if ($type == 3) {
                echo $this->Html->link(__('List Files Images'), ['controller' => 'Files', 'action' => 'index']);
            }
        ?>
    </ul>
</nav>
<div class="athletes view large-9 medium-8 columns content">
    <h3><?= h($athlete->firstName) ?> <?= h($athlete->lastName) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Other') ?></th>
            <td><?= h($athlete->other) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Club') ?></th>
            <td><?= $athlete->has('club') ? $this->Html->link($athlete->club->name, ['controller' => 'Clubs', 'action' => 'view', $athlete->club->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $athlete->has('user') ? $this->Html->link($athlete->user->email, ['controller' => 'Users', 'action' => 'view', $athlete->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Genre') ?></th>
            <td><?= $athlete->has('genre') ? $this->Html->link($athlete->genre->description, ['controller' => 'Genres', 'action' => 'view', $athlete->genre->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Event') ?></th>
            <td><?= $athlete->has('event') ? $this->Html->link($athlete->event->name, ['controller' => 'Events', 'action' => 'view', $athlete->event->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($athlete->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($athlete->modified) ?></td>
        </tr>
    </table>
</div>
