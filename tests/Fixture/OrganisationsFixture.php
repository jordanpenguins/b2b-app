<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * OrganisationsFixture
 */
class OrganisationsFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'business_name' => 'Lorem ipsum dolor sit amet',
                'contact_first_name' => 'Lorem ipsum dolor sit amet',
                'contact_last_name' => 'Lorem ipsum dolor sit amet',
                'contact_email' => 'Lorem ipsum dolor sit amet',
                'current_website' => 'Lorem ipsum dolor sit amet',
                'industry_id' => 1,
            ],
        ];
        parent::init();
    }
}
