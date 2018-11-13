<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Souseventtype[]|\Cake\Collection\CollectionInterface $souseventtypes
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Souseventtype'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Eventtypes'), ['controller' => 'Eventtypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Eventtype'), ['controller' => 'Eventtypes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="souseventtypes index large-9 medium-8 columns content">
    <h3><?= __('Souseventtypes') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('eventtypes_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('description') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($souseventtypes as $souseventtype): ?>
            <tr>
                <td><?= $this->Number->format($souseventtype->id) ?></td>
                <td><?= $souseventtype->has('eventtype') ? $this->Html->link($souseventtype->eventtype->description, ['controller' => 'Eventtypes', 'action' => 'view', $souseventtype->eventtype->id]) : '' ?></td>
                <td><?= h($souseventtype->description) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $souseventtype->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $souseventtype->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $souseventtype->id], ['confirm' => __('Are you sure you want to delete # {0}?', $souseventtype->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
