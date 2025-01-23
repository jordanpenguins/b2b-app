<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Project Entity
 *
 * @property int $id
 * @property string $project_name
 * @property string $description
 * @property string $management_tool_link
 * @property \Cake\I18n\Date $project_due_date
 * @property \Cake\I18n\Date|null $last_checked
 * @property bool $complete
 * @property int $organisation_id
 * @property int|null $contractor_id
 *
 * @property \App\Model\Entity\Organisation $organisation
 * @property \App\Model\Entity\Contractor $contractor
 * @property \App\Model\Entity\Skill[] $skills
 */
class Project extends Entity
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
        'project_name' => true,
        'description' => true,
        'management_tool_link' => true,
        'project_due_date' => true,
        'last_checked' => false,
        'complete' => true,
        'organisation_id' => true,
        'contractor_id' => true,
        'organisation' => true,
        'contractor' => true,
        'skills' => true,
    ];
}
