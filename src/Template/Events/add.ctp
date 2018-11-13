<?php
$urlToLinkedListFilter = $this->Url->build([
    "controller" => "Souseventtypes",
    "action" => "getByEventType",
    "_ext" => "json"
        ]);
echo $this->Html->scriptBlock('var urlToLinkedListFilter = "' . $urlToLinkedListFilter . '";', ['block' => true]);
echo $this->Html->script('Events/add', ['block' => 'scriptBottom']);
?>
<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Event $event
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Events'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Clubs'), ['controller' => 'Clubs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Club'), ['controller' => 'Clubs', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Eventtypes'), ['controller' => 'Eventtypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Eventtype'), ['controller' => 'Eventtypes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="events form large-9 medium-8 columns content">
    <?= $this->Form->create($event) ?>
    <fieldset>
        <legend><?= __('Add Event') ?></legend>
        <?php
            echo $this->Form->control('date');
            echo $this->Form->control('name');
            echo $this->Form->control('distance');
            echo $this->Form->control('other');
            echo $this->Form->control('clubs_id', ['options' => $clubs]);
            echo $this->Form->control('eventTypes_id', ['options' => $eventtypes]);
            echo $this->Form->control('sousEventTypes_id', ['options' => $souseventtypes]);
            echo $this->Form->control('modifed');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
