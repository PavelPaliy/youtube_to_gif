<?php

namespace App\Services;

use Illuminate\Support\Facades\File;

class VideoTrimmingService
{
    public static string $saveFolder = "trimmed";
    /**
     * Trim video from $startTime to $endTime and returns the path to the trimmed video
     * @param string $fileToCut
     * @param int $startTime
     * @param $endTime
     * @return string
     */
    public static function trim(string $fileToCut, int $startTime, int $endTime):string
    {
        $saveFolder = self::$saveFolder;
        $saveFolder = public_path("{$saveFolder}/");
        if(!File::exists($saveFolder)) File::makeDirectory($saveFolder);
        $resultFile = $saveFolder.uniqid()."_result.mp4";
        exec("ffmpeg -i $fileToCut -ss $startTime -to $endTime  -c copy $resultFile");
        return $resultFile;
    }
}
