<?php

namespace FGNunesFlix\Models;

use Bootstrapper\Interfaces\TableInterface;
use Illuminate\Database\Eloquent\Model;

class old extends Model implements TableInterface
{

    protected $fillable = ['name'];

    public function getTableHeaders()
    {
        return ['#', 'Nome'];
    }

    public function getValueForHeader($header)
    {
        switch ($header){
            case '#':
                return $this->id;
            case 'Nome':
                return $this->name;
        }
    }
}
