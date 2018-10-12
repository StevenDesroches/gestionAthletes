<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Eventtype $eventtype
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Eventtype'), ['action' => 'edit', $eventtype->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Eventtype'), ['action' => 'delete', $eventtype->id], ['confirm' => __('Are you sure you want to delete # {0}?', $eventtype->id)]) ?> </li>
        <li><?= $this->Html->link(__('New Eventtype'), ['action' => 'add']) ?> </li>
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
<div class="eventtypes view large-9 medium-8 columns content">
    <h3><?= h($eventtype->description) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($eventtype->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($eventtype->id) ?></td>
        </tr>
    </table>
</div>
