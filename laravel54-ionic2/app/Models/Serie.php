<?php

namespace FGNunesFlix\Models;

use Bootstrapper\Interfaces\TableInterface;
use FGNunesFlix\Media\SeriePaths;
use Illuminate\Database\Eloquent\Model;


class Serie extends Model implements TableInterface
{
    use SeriePaths;

    protected $fillable = ['title', 'description'];

    public function getTableHeaders()
    {
        return ['#', 'Titulo', 'Descrição'];
    }

    /**
     * Get the value for a given header. Note that this will be the value
     * passed to any callback functions that are being used.
     *
     * @param string $header
     * @return mixed
     */
    public function getValueForHeader($header)
    {
        switch ($header){
            case '#':
                return $this->id;
            case 'Titulo':
                return $this->title;
            case 'Descrição':
                return $this->description;
        }
    }

}
