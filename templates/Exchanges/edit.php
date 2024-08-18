<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Exchange $sxchange
 * @var string[]|\Cake\Collection\CollectionInterface $exchanges
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $exchange->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $exchange->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Exchanges'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="Exchanges form content">
            <?= $this->Form->create($exchange) ?>
            <fieldset>
                <legend><?= __('Edit Exchange') ?></legend>
                <?php
                    echo $this->Form->create($exchange);
                    echo $this->Form->control('name');
                    echo $this->Form->control('domain');
                    echo $this->Form->control('usd');
                    echo $this->Form->control('spot');
                    echo $this->Form->control('futures');
                    echo $this->Form->control('staking');
                    echo $this->Form->control('api');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->FORM->button(__('Cancel'), ['type' => 'button', 'onclick' => 'window.location=\'/exchanges\'']); ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
