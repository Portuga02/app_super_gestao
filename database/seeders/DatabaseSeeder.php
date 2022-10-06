<?php

namespace Database\Seeders;

use App\Models\Fornecedor;
use App\Models\SiteContato;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(Fornecedor::class);
        $this->call(SiteContato::class);
        $this->call(MotivoContatoSeeder::class);
    }
}
