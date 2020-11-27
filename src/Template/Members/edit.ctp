<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Member $member
 */
?>
<nav class="large-2 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $member->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $member->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Members'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Groups'), ['controller' => 'Groups', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Group'), ['controller' => 'Groups', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="members form large-10 medium-8 columns content">
    <?= $this->Form->create($member) ?>
    <fieldset>
        <legend><?= __('Edit Member') ?></legend>
        <?php
            echo $this->Form->control('firstname');
            echo $this->Form->control('lastname');
            echo $this->Form->control('dob');
            echo $this->Form->control('gender');
            echo $this->Form->control('national_card_number');
            echo $this->Form->control('phone');
            echo $this->Form->control('marital_status');
            echo $this->Form->control('group_id', ['options' => $groups]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
