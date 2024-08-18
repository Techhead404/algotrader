<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Symbol Entity
 *
 * @property int $id
 * @property int $exchange_id
 * @property string $name
 * @property string $min_size
 * @property string $ticker
 *
 * @property \App\Model\Entity\Exchange $exchange
 */
class Symbol extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'exchange_id' => true,
        'name' => true,
        'ticker' => true,
        'min_size' => true,
        'exchange' => true,
    ];
}
