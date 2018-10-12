<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Athlete $athlete
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Athletes'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="athletes form large-9 medium-8 columns content">
    <?= $this->Form->create($athlete) ?>
    <fieldset>
        <legend><?= __('Add Athlete') ?></legend>
        <?php
            echo $this->Form->control('firstName');
            echo $this->Form->control('lastName');
            echo $this->Form->control('other');
            echo $this->Form->control('clubs_id', ['options' => $clubs, 'empty' => true]);
            //echo $this->Form->control('user_id', ['options' => $users, 'empty' => true]);
            echo $this->Form->control('genres_id', ['options' => $genres, 'empty' => true]);
            echo $this->Form->control('events_id', ['options' => $events, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
