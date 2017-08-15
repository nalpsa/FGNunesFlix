<?php

namespace FGNunesFlix\Media;


trait SeriePaths
{
    use VideoStorages;

    public function getThumbFolderStorageAttribute()
    {
        return "series/{$this->id}";
    }

    public function getThumbRelativeAttribute()
    {
        return "{$this->thumb_folder_storage}/{$this->thumb}";
    }

    public function getThumbPathAttribute(){
        return $this->getAbsolutePath($this->getStorage(),$this->thumb_relative);
    }

}