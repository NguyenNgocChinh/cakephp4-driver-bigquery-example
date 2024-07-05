<?php
declare(strict_types=1);

namespace App\Model\Table;

use Chinh\BigQuery\BigQueryDateTimeBehavior;
use Chinh\BigQuery\Model\Table\BigQueryTable;

/** `
 * User Table
 * 
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UserTable extends BigQueryTable
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('users');
        $this->setPrimaryKey('id');

        // Add the custom datetime behavior
        $this->addBehavior(BigQueryDateTimeBehavior::class);
    }
}
