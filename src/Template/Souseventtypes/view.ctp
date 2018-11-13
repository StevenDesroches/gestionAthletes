<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Souseventtype $souseventtype
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Souseventtype'), ['action' => 'edit', $souseventtype->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Souseventtype'), ['action' => 'delete', $souseventtype->id], ['confirm' => __('Are you sure you want to delete # {0}?', $souseventtype->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Souseventtypes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Souseventtype'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Eventtypes'), ['controller' => 'Eventtypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Eventtype'), ['controller' => 'Eventtypes', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="souseventtypes view large-9 medium-8 columns content">
    <h3><?= h($souseventtype->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Eventtype') ?></th>
            <td><?= $souseventtype->has('eventtype') ? $this->Html->link($souseventtype->eventtype->description, ['controller' => 'Eventtypes', 'action' => 'view', $souseventtype->eventtype->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($souseventtype->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($souseventtype->id) ?></td>
        </tr>
    </table>
</div>
