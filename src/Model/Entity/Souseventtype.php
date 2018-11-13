<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Souseventtype Entity
 *
 * @property int $id
 * @property int $eventtypes_id
 * @property string $description
 *
 * @property \App\Model\Entity\Eventtype $eventtype
 */
class Souseventtype extends Entity
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
        'eventtypes_id' => true,
        'description' => true,
        'eventtype' => true
    ];
}
