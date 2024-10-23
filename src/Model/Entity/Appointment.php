<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Appointment Entity
 *
 * @property int $id
 * @property int $user_id
 * @property int $appointment_type_id
 * @property string $name
 * @property \Cake\I18n\FrozenDate $date
 * @property \Cake\I18n\FrozenTime $start_time
 * @property string $duration
 * @property string $status
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\AppointmentType $appointment_type
 */
class Appointment extends Entity
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
        'user_id' => true,
        'appointment_type_id' => true,
        'name' => true,
        'date' => true,
        'start_time' => true,
        'duration' => true,
        'status' => true,
        'user' => true,
        'appointment_type' => true,
    ];
}
