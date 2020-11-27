<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Member Entity
 *
 * @property int $id
 * @property string $firstname
 * @property string $lastname
 * @property \Cake\I18n\FrozenDate $dob
 * @property string $gender
 * @property string $national_card_number
 * @property string $phone
 * @property string $marital_status
 * @property int $group_id
 *
 * @property \App\Model\Entity\Group $group
 */
class Member extends Entity
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
        'firstname' => true,
        'lastname' => true,
        'dob' => true,
        'gender' => true,
        'national_card_number' => true,
        'phone' => true,
        'marital_status' => true,
        'group_id' => true,
        'group' => true,
    ];
}
