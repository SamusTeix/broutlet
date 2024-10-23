<?php
use Migrations\AbstractMigration;

class CreateAppointmentTypes extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('appointment_types');
        $table->addColumn('name', 'string', ['limit' => 255])
              ->create();
    }
}
