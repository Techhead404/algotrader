<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Symbol> $symbols
 */
?>
<div class="symbols index content">
    <?= $this->Html->link(__('New Symbol'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Symbols') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('ticker') ?></th>
                    <th><?= $this->Paginator->sort('exchange_id') ?></th>
                    <th><?= $this->Paginator->sort('min_size') ?></th>
                    c
                </tr>
            </thead>
            <tbody>
                <?php foreach ($symbols as $symbol): ?>
                <tr>
                    <td><?= h($symbol->name) ?></td>
                    <td><?= h($symbol->ticker) ?></td>
                    <td><?= $symbol->hasValue('exchange') ? $this->Html->link($symbol->exchange->name, ['controller' => 'Exchanges', 'action' => 'view', $symbol->exchange->id]) : '' ?></td>
                    <td><?= $this->Number->format($symbol->min_size) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $symbol->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $symbol->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $symbol->id], ['confirm' => __('Are you sure you want to delete # {0}?', $symbol->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
