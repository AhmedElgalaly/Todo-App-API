<?php

namespace Database\Seeders;

use App\Models\Todo;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $completedTodos = Todo::factory()->count(10)->create(['completed' => true]);

        $incompletedTodos = Todo::factory()->count(10)->create(['completed' => false]);

        $deletedTodos = Todo::factory()->count(10)->create(['deleted_at' => Carbon::now()]);
    }
}
