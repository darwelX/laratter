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
            $messages = factory(App\Message::class)
                ->times(20)
                ->create([
                    'user_id' => $user->id,
                ]);

            $messages->each(function(App\Message $message) use ($users){
                factory(App\Response::class, random_int(1, 10) )->create([
                    'message_id' => $message->id,
                    'user_id' => $users->random(1)->first()->id,
                ]);
            });
            $user->follows()->sync(
                $users->random(10)
            );
        });
    }
}
