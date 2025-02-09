<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::Table('genres')->insert([
            ['genre' => 'Fantasy'],
            ['genre' => 'Romance'],
            ['genre' => 'Science Fiction'],
            ['genre' => 'Mystery'],
            ['genre' => 'Thriller'],
            ['genre' => 'Horror'],
            ['genre' => 'Historical'],
            ['genre' => 'Non-Fiction'],
            ['genre' => 'Biography'],
            ['genre' => 'Autobiography'],
            ['genre' => 'Self-Help'],
            ['genre' => 'Cookbook'],
            ['genre' => 'Poetry'],
            ['genre' => 'Art'],
            ['genre' => 'Children'],
            ['genre' => 'Young Adult'],
            ['genre' => 'Dystopian'],
            ['genre' => 'Adventure'],
            ['genre' => 'Humor'],
            ['genre' => 'Short Story'],
            ['genre' => 'Graphic Novel'],
            ['genre' => 'Science'],
            ['genre' => 'Travel'],
            ['genre' => 'Religion'],
            ['genre' => 'Spirituality'],
            ['genre' => 'Philosophy'],
            ['genre' => 'Psychology'],
            ['genre' => 'Business'],
            ['genre' => 'Economics'],
            ['genre' => 'History'],
            ['genre' => 'Politics'],
            ['genre' => 'Social Science'],
            ['genre' => 'Sports'],
            ['genre' => 'True Crime'],
            ['genre' => 'Western'],
            ['genre' => 'Paranormal'],
            ['genre' => 'Urban Fantasy'],
            ['genre' => 'Contemporary'],
            ['genre' => 'Chick Lit'],
            ['genre' => 'Erotica'],
            ['genre' => 'LGBTQ+'],
            ['genre' => 'Classics'],
            ['genre' => 'Literary Fiction'],
            ['genre' => 'Magical Realism'],
            ['genre' => 'Mythology'],
            ['genre' => 'Retellings'],
            ['genre' => 'Time Travel'],
            ['genre' => 'Apocalyptic'],
            ['genre' => 'Post-Apocalyptic'],
            ['genre' => 'Aliens'],
            ['genre' => 'Space Opera'],
            ['genre' => 'Cyberpunk'],
            ['genre' => 'Dystopian'],
            ['genre' => 'Steampunk'],
            ['genre' => 'Superheroes'],
            ['genre' => 'Zombies'],
            ['genre' => 'Vampires'],
            ['genre' => 'Werewolves'],
            ['genre' => 'Ghosts'],
            ['genre' => 'Witches'],
            ['genre' => 'Mermaids'],
            ['genre' => 'Dragons'],

        ]);
    }
}
