<?php

use Illuminate\Database\Seeder;
use \Illuminate\Database\Eloquent\Collection;
class VideosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** @var Collection $series */
        $series = \FGNunesFlix\Models\Serie::all();
        $categories = \FGNunesFlix\Models\Category::all();
        factory(\FGNunesFlix\Models\Video::class, 100)
            ->create()
            ->each(function ($video) use($series,$categories){
                $video->categories()->attach($categories->random(4  )->pluck('id'));
                $num = rand(1,3);
                if($num%2==0){
                    $serie = $series->random();
                    $video->serie_id = $serie->id;
                    $video->serie()->associate($serie);
                    $video->save();
                }
            });
    }
}
