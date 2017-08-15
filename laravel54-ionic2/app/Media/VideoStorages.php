<?php

namespace FGNunesFlix\Media;


use Illuminate\Filesystem\FilesystemAdapter;

trait VideoStorages
{
    /**
     * @return \Illuminate\Filesystem\FilesystemAdapter
     */
    public function getStorage(){
        \Storage::disk($this->getDiskDriver());
    }
    protected function getDiskDriver(){ // driver
        return config('filesystems.default');
    }

    protected function getAbsolutePath(FilesystemAdapter $storage, $fileRelativePath){
        return $storage->getDriver()->getAdapter()->applyPathPrefix($fileRelativePath);
    }
}