<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;

/**
 * Organisation Entity
 *
 * @property int $id
 * @property string $business_name
 * @property string $contact_first_name
 * @property string $contact_last_name
 * @property string $contact_email
 * @property string $current_website
 * @property int $industry_id
 *
 * @property \App\Model\Entity\Industry $industry
 * @property \App\Model\Entity\Contact[] $contacts
 * @property \App\Model\Entity\Project[] $projects
 */
class Organisation extends Entity
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
        'business_name' => true,
        'contact_first_name' => true,
        'contact_last_name' => true,
        'contact_email' => true,
        'current_website' => true,
        'industry_id' => true,
        'industry' => true,
        'contacts' => true,
        'projects' => true,
    ];

    // Virtual field for first name and last name and email
    protected function _getDetails() {
        return $this->business_name . ' | ' . $this->contact_first_name . ' ' . $this->contact_last_name . ' | ' . $this->contact_email;
    }




}
