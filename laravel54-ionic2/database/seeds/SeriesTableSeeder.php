<?php

use FGNunesFlix\Repositories\SerieRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Seeder;

class SeriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rootPath = config('filesystems.disks.videos_local.root');
        \File::deleteDirectory($rootPath, true);
        /** @var Collection $series */
        $series = factory(\FGNunesFlix\Models\Serie::class,5)->create();
        $repository = app(SerieRepository::class);
        $collectionThumbs = $this->getThumbs();
        $series->each(function($serie) use($repository, $collectionThumbs){
            $repository->uploadThumb($serie->id,$collectionThumbs->random());
        });
    }

    protected function getThumbs(){
        return new \Illuminate\Support\Collection([
            new \Illuminate\Http\UploadedFile(
                storage_path('app/files/faker/thumbs/thumb_synphony.jpg'),
                'thumb_synphony.jpg'
            ),
        ]);
    }
}
