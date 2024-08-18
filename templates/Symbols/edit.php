<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Symbol $symbol
 * @var string[]|\Cake\Collection\CollectionInterface $exchanges
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $symbol->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $symbol->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Symbols'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="symbols form content">
            <?= $this->Form->create($symbol) ?>
            <fieldset>
                <legend><?= __('Edit Symbol') ?></legend>
                <?php
                    echo $this->Form->control('exchange_id', ['options' => $exchanges]);
                    echo $this->Form->control('name');
                    echo $this->Form->control('ticker');
                    echo $this->Form->control('min_size');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->FORM->button(__('Cancel'), ['type' => 'button', 'onclick' => 'window.location=\'/symbols\'']); ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
