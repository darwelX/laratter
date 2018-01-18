<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Para ejecutar esto: php artisan db:seed
     * Para ejecutar desde cero: php artisan migrate:refresh --seed
     * Para borrar toda la BD crearla a partir de las migrations y seed: php artisan migrate:refresh --seed
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        // crea 100 instancias de mensajes
        // factory(App\Message::class, 100)->create();
        // crea 100 registros en la base de datos de la clase Message
        $users = factory(App\User::class, 50)->create();
        $users->each(function(App\User $user) use ($users) {
            factory(App\Message::class)
                ->times(20)
                ->create([
                    'user_id' => $user->id,
                ]);
            $user->follows()->sync(
                $users->random(10)
            );
        });
    }
}
