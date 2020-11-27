<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Group $group
 */
?>
<nav class="large-2 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Group'), ['action' => 'edit', $group->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Group'), ['action' => 'delete', $group->id], ['confirm' => __('Are you sure you want to delete # {0}?', $group->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Groups'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Group'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="groups view large-9 medium-8 columns content">
    <h3><?= h($group->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($group->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($group->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Share Value') ?></th>
            <td><?= $this->Number->format($group->share_value) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Max Share') ?></th>
            <td><?= $this->Number->format($group->max_share) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Saving Ratio') ?></th>
            <td><?= $this->Number->format($group->saving_ratio) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Interest Rate') ?></th>
            <td><?= $this->Number->format($group->interest_rate) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Max Loan') ?></th>
            <td><?= $this->Number->format($group->max_loan) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Contribution Amount') ?></th>
            <td><?= $this->Number->format($group->contribution_amount) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Meeting Day') ?></th>
            <td><?= h($group->meeting_day) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Meeting Time') ?></th>
            <td><?= h($group->meeting_time) ?></td>
        </tr>
    </table>
    <h3>Members</h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('firstname') ?></th>
                <th scope="col"><?= $this->Paginator->sort('lastname') ?></th>
                <th scope="col"><?= $this->Paginator->sort('dob') ?></th>
                <th scope="col"><?= $this->Paginator->sort('gender') ?></th>
                <th scope="col"><?= $this->Paginator->sort('national_card_number') ?></th>
                <th scope="col"><?= $this->Paginator->sort('phone') ?></th>
                <th scope="col"><?= $this->Paginator->sort('marital_status') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($members as $member): ?>
            <tr>
                <td><?= h($member->firstname) ?></td>
                <td><?= h($member->lastname) ?></td>
                <td><?= h($member->dob) ?></td>
                <td><?= h($member->gender) ?></td>
                <td><?= h($member->national_card_number) ?></td>
                <td><?= h($member->phone) ?></td>
                <td><?= h($member->marital_status) ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
