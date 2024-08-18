<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Symbol $symbol
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Symbol'), ['action' => 'edit', $symbol->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Symbol'), ['action' => 'delete', $symbol->id], ['confirm' => __('Are you sure you want to delete # {0}?', $symbol->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Symbols'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Symbol'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="symbols view content">
            <h3><?= h($symbol->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($symbol->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Ticker') ?></th>
                    <td><?= h($symbol->ticker) ?></td>
                </tr>
                <tr>
                    <th><?= __('Exchange') ?></th>
                    <td><?= $symbol->hasValue('exchange') ? $this->Html->link($symbol->exchange->name, ['controller' => 'Exchanges', 'action' => 'view', $symbol->exchange->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Min Size') ?></th>
                    <td><?= $this->Number->format($symbol->min_size) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
