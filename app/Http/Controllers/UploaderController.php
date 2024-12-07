<?php

namespace App\Http\Controllers;

use App\Http\Requests\VideoUploderRequest;
use App\Services\VideoTrimmingService;
use App\Services\VideoUploaderService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class UploaderController extends Controller
{
    public function form()
    {
        return view('upload_video');
    }

    public function upload(VideoUploderRequest $request)
    {
        try{
            $pathToTheUploadedFile = VideoUploaderService::uploadVideo($request->file("fileToUpload"));
            $pathToTrimmedVideo = VideoTrimmingService::trim($pathToTheUploadedFile, (int)$request->post("startTime"), (int)$request->post("endTime"));
            File::delete($pathToTheUploadedFile);
            $video = str_replace(public_path(), "", $pathToTrimmedVideo);
            return response()->view("video",compact('video'));
        }catch (\Throwable $exception){
            return $exception->getMessage();
        }

    }
}
