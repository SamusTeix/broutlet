<?php
use Migrations\AbstractSeed;
use Cake\Auth\DefaultPasswordHasher; // Importe o hasher

/**
 * Users seed.
 */
class UsersSeed extends AbstractSeed
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
        $hasher = new DefaultPasswordHasher(); // Crie uma instância do hasher
        $data = [
            [
                'name' => 'teste',
                'email' => 'teste@teste.com',
                'password' => $hasher->hash('123456') // Gere o hash da senha
            ],
        ];

        $table = $this->table('users');
        $table->insert($data)->save();
    }
}
