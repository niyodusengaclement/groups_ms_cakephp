<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Group Entity
 *
 * @property int $id
 * @property string $name
 * @property \Cake\I18n\FrozenDate $meeting_day
 * @property \Cake\I18n\FrozenTime $meeting_time
 * @property int $share_value
 * @property int $max_share
 * @property int $saving_ratio
 * @property int $interest_rate
 * @property int $max_loan
 * @property int $contribution_amount
 */
class Group extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
        'meeting_day' => true,
        'meeting_time' => true,
        'share_value' => true,
        'max_share' => true,
        'saving_ratio' => true,
        'interest_rate' => true,
        'max_loan' => true,
        'contribution_amount' => true,
    ];
}
