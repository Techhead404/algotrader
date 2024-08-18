<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Exchange> $exchanges
 */
?>

<div class="exchanges index content">
    <?= $this->Html->link(__('New Exchange'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Exchanges') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>Exchange</th>
                    <th>Domain</th>
                    <th>USD</th>
                    <th>Spot</th>
                    <th>Futures</th>
                    <th>Staking</th>
                    <th>API</th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
        <tbody>
            <?php foreach ($exchanges as $exchange): ?>
            <tr>
                <td><?= $exchange->name ?></td>
                <td><?= $this->Html->link($exchange->domain, 'http://' . $exchange->domain, ['target' => '_blank']) ?></td>
                <td><?= $exchange->usd ?></td>
                <td><?= $exchange->spot ?></td>
                <td><?= $exchange->futures ?></td>
                <td><?= $exchange->staking ?></td>
                <td><?= $exchange->api ?></td>
                <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $exchange->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $exchange->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $exchange->id], ['confirm' => __('Are you sure you want to delete # {0}?', $exchange->id)]) ?>
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