<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Athlete $athlete
 */
?>
<div class="athletes view large-9 medium-8 columns content">
    <h3><?= h($athlete->firstName) ?> <?= h($athlete->lastName) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Other') ?> : </th>
            <td><?= h($athlete->other) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Club') ?> : </th>
            <td><?= $athlete->has('club') ? h($athlete->club->name) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?> : </th>
            <td><?= $athlete->has('user') ? h($athlete->user->email) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Genre') ?> : </th>
            <td><?= $athlete->has('genre') ? h($athlete->genre->description) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Event') ?> : </th>
            <td><?= $athlete->has('event') ? h($athlete->event->name) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?> : </th>
            <td><?= h($athlete->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?> : </th>
            <td><?= h($athlete->modified) ?></td>
        </tr>
    </table>
</div>
