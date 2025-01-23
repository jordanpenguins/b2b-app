<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Contact Entity
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $phone_number
 * @property string $email
 * @property string $message
 * @property bool $replied
 * @property int|null $organisation_id
 * @property int|null $contractor_id
 *
 * @property \App\Model\Entity\Organisation $organisation
 * @property \App\Model\Entity\Contractor $contractor
 */
class Contact extends Entity
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
        'first_name' => true,
        'last_name' => true,
        'phone_number' => true,
        'email' => true,
        'message' => true,
        'replied' => true,
        'organisation_id' => true,
        'contractor_id' => true,
        'organisation' => true,
        'contractor' => true,
    ];
}
