<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Author;
use App\Models\Book;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('books')->delete();
        $faker = Faker::create();
        $author_ids = Author::all()->pluck('id')->toArray();
        for($i = 0 ; $i < 100; $i++){
            Book::create([
                'title' => $faker->sentence,
                'author_id' => $faker->randomElement($author_ids)
            ]);
        }
    }
}
