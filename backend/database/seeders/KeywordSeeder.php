<?php

namespace Database\Seeders;

use App\Models\Keyword;
use Illuminate\Database\Seeder;

class KeywordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $defaults = ['Urgent', 'Bug', 'Improvement', 'Documentation', 'Frontend', 'Backend'];
        foreach ($defaults as $name) {
            Keyword::firstOrCreate(['name' => $name]);
        }
    }
}
