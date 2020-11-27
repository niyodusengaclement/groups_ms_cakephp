<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Group[]|\Cake\Collection\CollectionInterface $groups
 */
?>
<nav class="large-2 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Group'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="groups index large-10 medium-8 columns content">
    <h3><?= __('Groups') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('meeting_day') ?></th>
                <th scope="col"><?= $this->Paginator->sort('meeting_time') ?></th>
                <th scope="col"><?= $this->Paginator->sort('share_value') ?></th>
                <th scope="col"><?= $this->Paginator->sort('max_share') ?></th>
                <th scope="col"><?= $this->Paginator->sort('saving_ratio') ?></th>
                <th scope="col"><?= $this->Paginator->sort('interest_rate') ?></th>
                <th scope="col"><?= $this->Paginator->sort('max_loan') ?></th>
                <th scope="col"><?= $this->Paginator->sort('contribution_amount') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($groups as $group): ?>
            <tr>
                <td><?= $this->Number->format($group->id) ?></td>
                <td> <?= $this->Html->link(h($group->name), ['action' => 'view', $group->id]) ?></td>
                <td><?= h($group->meeting_day) ?></td>
                <td><?= h($group->meeting_time) ?></td>
                <td><?= $this->Number->format($group->share_value) ?></td>
                <td><?= $this->Number->format($group->max_share) ?></td>
                <td><?= $this->Number->format($group->saving_ratio) ?></td>
                <td><?= $this->Number->format($group->interest_rate) ?></td>
                <td><?= $this->Number->format($group->max_loan) ?></td>
                <td><?= $this->Number->format($group->contribution_amount) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $group->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $group->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $group->id], ['confirm' => __('Are you sure you want to delete # {0}?', $group->id)]) ?>
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
