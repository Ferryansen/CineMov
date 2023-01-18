<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('movies')->insert([
            'title' => 'Mortal Kombat',
            'duration' => '110',
            'poster_url' => 'https://statics.indozone.news/local/60519c45d6d2d.jpg',
            'banner_url' => 'https://cdn.flickeringmyth.com/wp-content/uploads/2021/03/Mortal-Kombat-banner.jpg',
            'viewCount' => 100,
            'rating' => 7.5,
            'synopsis' => 'The film follows Cole Young, a washed-up mixed martial arts fighter who is unaware of his hidden lineage or why the assassin Sub-Zero is hunting him down.'
        ]);

        DB::table('movies')->insert([
            'title' => 'Harry Potter',
            'duration' => '108',
            'poster_url' => 'https://i.pinimg.com/564x/92/cd/f0/92cdf02ef4c521b49d56ce91f9d62f36.jpg',
            'banner_url' => 'https://www.filmonpaper.com/wp-content/uploads/2011/07/HarryPotterAndTheSorcerersStone_onesheet_USA_DrewStruzan-13.jpg',
            'viewCount' => 200,
            'rating' => 8.5,
            'synopsis' => 'Harry Potter and the Philosopher\'s Stone is an enthralling start to Harry\'s journey toward coming to terms with his past and facing his future.'
        ]);

        DB::table('movies')->insert([
            'title' => 'Avenger: End Game',
            'duration' => '120',
            'poster_url' => 'https://www.mainmain.id/uploads/post/2019/03/17/Avengers-Endgame-Poster.jpg',
            'banner_url' => 'https://mediad.publicbroadcasting.net/p/ketr/files/styles/x_large/public/201904/avengers_endgame_-_facebook.jpg',
            'viewCount' => 500,
            'rating' => 9.7,
            'synopsis' => 'Adrift in space with no food or water, Tony Stark sends a message to Pepper Potts as his oxygen supply starts to dwindle. Meanwhile, the remaining Avengers must figure out a way to bring back their vanquished allies for an epic showdown with Thanos'
        ]);

        DB::table('movies')->insert([
            'title' => 'My Youth Romantic Comedy Is Wrong, As I Expected: Fin',
            'duration' => '23',
            'poster_url' => 'https://i.pinimg.com/originals/7b/47/4c/7b474c68b1f03d2d9a5abfbd6d6e413a.png',
            'banner_url' => 'http://static.hidive.com/titles/MRC/my-teen-romantic-comedy-SNAFU-climax_MRC_03_KEY_1200x450.jpg',
            'viewCount' => 1000,
            'rating' => 9,
            'synopsis' => 'The series follows Hachiman Hikigaya, a pessimistic, closeminded, and realistic teen, who is forced by his teacher to join the school\'s service club and work with two girls with issues of their own.'
        ]);

        DB::table('movies')->insert([
            'title' => 'Movieless',
            'duration' => '50',
            'poster_url' => 'https://www.uoftbookstore.com/sca-dev-2021-1-0/img/no_image_available.jpeg',
            'banner_url' => 'https://www.uoftbookstore.com/sca-dev-2021-1-0/img/no_image_available.jpeg',
            'viewCount' => 1000,
            'rating' => 9,
            'synopsis' => 'Movie with non-movie concept'
        ]);
    }
}
