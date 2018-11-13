<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Club $club
 */
?>

<?php
$urlToClubsAutocompletedemoJson = $this->Url->build([
    "controller" => "Clubs",
    "action" => "findClubs",
    "_ext" => "json"
        ]);
echo $this->Html->scriptBlock('var urlToAutocompleteAction = "' . $urlToClubsAutocompletedemoJson . '";', ['block' => true]);
echo $this->Html->script('Clubs/autocompletedemo', ['block' => 'scriptBottom']);
?>

<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Clubs'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="clubs form large-9 medium-8 columns content">
    <?= $this->Form->create($club) ?>
    <fieldset>
        <legend><?= __('Add Club') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('location', ['id' => 'autocomplete']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
