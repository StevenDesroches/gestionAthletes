<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Event $event
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Event'), ['action' => 'edit', $event->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Event'), ['action' => 'delete', $event->id], ['confirm' => __('Are you sure you want to delete # {0}?', $event->id)]) ?> </li>
        <li><?= $this->Html->link(__('New Event'), ['action' => 'add']) ?> </li>
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
<div class="events view large-9 medium-8 columns content">
    <h3><?= h($event->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Distance') ?></th>
            <td><?= h($event->distance) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Other') ?></th>
            <td><?= h($event->other) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Club') ?></th>
            <td><?= $event->has('club') ? $this->Html->link($event->club->name, ['controller' => 'Clubs', 'action' => 'view', $event->club->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Eventtype') ?></th>
            <td><?= $event->has('eventtype') ? $this->Html->link($event->eventtype->description, ['controller' => 'Eventtypes', 'action' => 'view', $event->eventtype->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Souseventtype') ?></th>
            <td><?= $event->has('souseventtype') ? $this->Html->link($event->souseventtype->description, ['controller' => 'Souseventtypes', 'action' => 'view', $event->souseventtype->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date') ?></th>
            <td><?= h($event->date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($event->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modifed') ?></th>
            <td><?= h($event->modifed) ?></td>
        </tr>
    </table>
            <div class="related">
                <h4><?= __('Related Athletes') ?></h4>
                <?php if (!empty($event->athletes)): ?>
                <table cellpadding="0" cellspacing="0">
                    <tr>
                        <th scope="col"><?= __('First Name') ?></th>
                        <th scope="col"><?= __('Last Name') ?></th>
                        <th scope="col" class="actions"><?= __('Actions') ?></th>
                    </tr>
                    <?php foreach ($event->athletes as $athletes): ?>
                    <tr>
                        <td><?= h($athletes->firstName) ?></td>
                        <td><?= h($athletes->lastName) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['controller' => 'Athletes', 'action' => 'view', $athletes->id]) ?>
                            <?= $this->Html->link(__('Edit'), ['controller' => 'Athletes', 'action' => 'edit', $athletes->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['controller' => 'Athletes', 'action' => 'delete', $athletes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $athletes->id)]) ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </table>
                <?php endif; ?>
            </div>
</div>
