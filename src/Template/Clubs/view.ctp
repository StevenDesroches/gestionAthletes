<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Club $club
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Club'), ['action' => 'edit', $club->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Club'), ['action' => 'delete', $club->id], ['confirm' => __('Are you sure you want to delete # {0}?', $club->id)]) ?> </li>
        <li><?= $this->Html->link(__('New Club'), ['action' => 'add']) ?> </li>
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
<div class="clubs view large-9 medium-8 columns content">
    <h3><?= h($club->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($club->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Location') ?></th>
            <td><?= h($club->location) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($club->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($club->modified) ?></td>
        </tr>
    </table>
        <div class="related">
            <h4><?= __('Related Athletes') ?></h4>
            <?php if (!empty($club->athletes)): ?>
            <table cellpadding="0" cellspacing="0">
                <tr>
                    <th scope="col"><?= __('First Name') ?></th>
                    <th scope="col"><?= __('Last Name') ?></th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
                <?php foreach ($club->athletes as $athletes): ?>
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
             <div class="related">
                  <h4><?= __('Related Events') ?></h4>
                        <?php if (!empty($club->events)): ?>
                        <table cellpadding="0" cellspacing="0">
                            <tr>
                                <th scope="col"><?= __('Name') ?></th>
                                <th scope="col" class="actions"><?= __('Actions') ?></th>
                            </tr>
                            <?php foreach ($club->events as $events): ?>
                            <tr>
                                <td><?= h($events->name) ?></td>
                                <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'Events', 'action' => 'view', $events->id]) ?>
                                    <?= $this->Html->link(__('Edit'), ['controller' => 'Events', 'action' => 'edit', $events->id]) ?>
                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Events', 'action' => 'delete', $events->id], ['confirm' => __('Are you sure you want to delete # {0}?', $athletes->id)]) ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </table>
                        <?php endif; ?>
                    </div>
        <div class="related">
            <h4><?= __('Images Representing the club') ?></h4>
            <?php if (!empty($club->files)): ?>
                <?php foreach ($club->files as $files): ?>
                <?php echo $this->Html->image($files->name, ['alt' => $files->name]); ?>
                <?php endforeach; ?>
            <?php endif; ?>
</div>
