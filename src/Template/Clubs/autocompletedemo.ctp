<?php
$urlToClubsAutocompletedemoJson = $this->Url->build([
    "controller" => "Clubs",
    "action" => "findClubs",
    "_ext" => "json"
        ]);
echo $this->Html->scriptBlock('var urlToAutocompleteAction = "' . $urlToCarsAutocompletedemoJson . '";', ['block' => true]);
echo $this->Html->script('Cars/autocompletedemo', ['block' => 'scriptBottom']);
?>


<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Club'), ['action' => 'add']) ?></li>
    </ul>
</nav>

<?= $this->Form->create('Cars') ?>
<fieldset>
    <legend><?= __('Search Car') ?></legend>
    <?php
    echo $this->Form->input('name', ['id' => 'autocomplete']);
    ?>
</fieldset>
<?= $this->Form->end() ?>