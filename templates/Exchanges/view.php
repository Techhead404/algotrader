<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Exchange $exchange
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Exchange'), ['action' => 'edit', $exchange->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Exchange'), ['action' => 'delete', $exchange->id], ['confirm' => __('Are you sure you want to delete # {0}?', $exchange->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Exchanges'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Exchange'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="symbols view content">
            <h3><?= h($exchange->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($exchange->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Domain') ?></th>
                    <td><?= $this->Html->link(h($exchange->domain), $exchange->domain) ?></td>
                </tr>
                <tr>
                    <th><?= __('USD') ?></th>
                    <td><?= $exchange->usd?></td>
                </tr>
                <tr>
                    <th><?= __('Spot') ?></th>
                    <td><?= $exchange->spot?></td>
                </tr>
                <tr>
                    <th><?= __('Futures') ?></th>
                    <td><?= $exchange->futures?></td>
                </tr>
                <tr>
                    <th><?= __('Staking') ?></th>
                    <td><?= $exchange->staking?></td>
                </tr>
                <tr>
                    <th><?= __('Api') ?></th>
                    <td><?= $exchange->api?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
