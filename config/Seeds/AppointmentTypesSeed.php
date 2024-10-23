<?php
use Migrations\AbstractSeed;

/**
 * AppointmentTypes seed.
 */
class AppointmentTypesSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'Medical appointment'],
            ['name' => 'Business meeting'],
            ['name' => 'Private lesson'],
            ['name' => 'Therapy session'],
            ['name' => 'Lunch with friends'],
            ['name' => 'Romantic dinner'],
            ['name' => 'Dentist appointment'],
            ['name' => 'Workout at the gym'],
            ['name' => 'Study for test'],
            ['name' => 'Shopping'],
        ];

        $table = $this->table('appointment_types');
        $table->insert($data)->save();
    }
}
