<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Group $group
 */
?>
<nav class="large-2 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Groups'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="groups form large-10 medium-8 columns content">
    <?= $this->Form->create($group) ?>
    <fieldset>
        <legend><?= __('Add Group') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('meeting_day');
            echo $this->Form->control('meeting_time');
            echo $this->Form->control('share_value');
            echo $this->Form->control('max_share');
            echo $this->Form->control('saving_ratio');
            echo $this->Form->control('interest_rate');
            echo $this->Form->control('max_loan');
            echo $this->Form->control('contribution_amount');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
