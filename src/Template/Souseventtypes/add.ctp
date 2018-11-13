<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Souseventtype $souseventtype
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Souseventtypes'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Eventtypes'), ['controller' => 'Eventtypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Eventtype'), ['controller' => 'Eventtypes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="souseventtypes form large-9 medium-8 columns content">
    <?= $this->Form->create($souseventtype) ?>
    <fieldset>
        <legend><?= __('Add Souseventtype') ?></legend>
        <?php
            echo $this->Form->control('eventtypes_id', ['options' => $eventtypes]);
            echo $this->Form->control('description');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
