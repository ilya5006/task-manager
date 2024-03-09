<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Status;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Status::factory()->create([
            'name' => 'Выполнено'
        ]);

        Status::factory()->create([
            'name' => 'В ожидании выполнения'
        ]);

        Status::factory()->create([
            'name' => 'Выполняется'
        ]);

        Status::factory()->create([
            'name' => 'Создано'
        ]);
    }
}
