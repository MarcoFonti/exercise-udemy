<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        /* CREO 5 UTENTI */
        User::factory(5)->has(
            /* ASSOCIO 10 TASK A CIASCUN UTENTE IN MODO CHE OGNI UTENTE AVRA ALMENO 10 TASKS */
            Task::factory(10)
        )->create();
    }
}
