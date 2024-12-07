<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;

class VideoUploaderService
{
    /**
     * Returns the path to the uploaded file
     * @param UploadedFile $formFile
     * @return string
     */
    public static function uploadVideo(UploadedFile $formFile):string
    {
        $formFileName = uniqid()."_".$formFile->getClientOriginalName();
        $fileName = $formFile->storeAs("uploads", $formFileName);
        if(is_string($fileName)){
            return storage_path("app/".$fileName);
        }else{
            throw new \Exception(__("Error while saving file"));
        }
    }
}
