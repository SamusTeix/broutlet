<?php
use Migrations\AbstractMigration;

class CreateToDoList extends AbstractMigration
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
        $table = $this->table('to_do_list');
        $table->addColumn('user_id', 'integer')
              ->addColumn('moment', 'datetime')
              ->addColumn('event_name', 'string', ['limit' => 255])
              ->addColumn('status', 'enum', ['values' => ['open', 'finished', 'canceled']])
              ->addForeignKey('user_id', 'users', 'id')
              ->create(); 
    }
}
