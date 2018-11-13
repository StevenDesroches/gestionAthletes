<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Event $event
 */
?>
<?php
$urlToLinkedListFilter = $this->Url->build([
    "controller" => "Souseventtypes",
    "action" => "getByEventType",
    "_ext" => "json"
        ]);
echo $this->Html->scriptBlock('var urlToLinkedListFilter = "' . $urlToLinkedListFilter . '";', ['block' => true]);
echo $this->Html->script('Events/add', ['block' => 'scriptBottom']);
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $event->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $event->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Events'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Clubs'), ['controller' => 'Clubs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Club'), ['controller' => 'Clubs', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Souseventtypes'), ['controller' => 'Souseventtypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Souseventtype'), ['controller' => 'Souseventtypes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Eventtypes'), ['controller' => 'Eventtypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Eventtype'), ['controller' => 'Eventtypes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Athletes'), ['controller' => 'Athletes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Athlete'), ['controller' => 'Athletes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="events form large-9 medium-8 columns content">
    <?= $this->Form->create($event) ?>
    <fieldset>
        <legend><?= __('Edit Event') ?></legend>
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
