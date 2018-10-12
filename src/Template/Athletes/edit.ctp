<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Athlete $athlete
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $athlete->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $athlete->id)]
            )
        ?></li>
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
<div class="athletes form large-9 medium-8 columns content">
    <?= $this->Form->create($athlete) ?>
    <fieldset>
        <legend><?= __('Edit Athlete') ?></legend>
        <?php
            echo $this->Form->control('firstName');
            echo $this->Form->control('lastName');
            echo $this->Form->control('other');
            echo $this->Form->control('clubs_id', ['options' => $clubs, 'empty' => true]);
            echo $this->Form->control('user_id', ['options' => $users, 'empty' => true]);
            echo $this->Form->control('genres_id', ['options' => $genres, 'empty' => true]);
            echo $this->Form->control('events_id', ['options' => $events, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
