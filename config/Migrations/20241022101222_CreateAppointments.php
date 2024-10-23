<?php
use Migrations\AbstractMigration;

class CreateAppointments extends AbstractMigration
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
        $table = $this->table('appointments');
        $table->addColumn('user_id', 'integer')
              ->addColumn('appointment_type_id', 'integer')
              ->addColumn('name', 'string', ['limit' => 255])
              ->addColumn('date', 'date')
              ->addColumn('start_time', 'time')
              ->addColumn('duration', 'enum', ['values' => ['5', '10', '15', '20', '30', '40', '45', '50', '60', '90', '120']])
              ->addColumn('status', 'enum', ['values' => ['open', 'finished', 'canceled']])
              ->addForeignKey('user_id', 'users', 'id')
              ->addForeignKey('appointment_type_id', 'appointment_types', 'id')
              ->create();
    }
}
