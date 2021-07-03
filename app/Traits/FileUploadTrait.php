<?php

namespace App\Traits;

use App\Models\TemporaryFile;
use Illuminate\Support\Facades\Schema;
use Illuminate\Http\Request;
trait FileUploadTrait
{
    public function Uploader(Request $request, string $input, string $path ){

        if ($request->hasFile($input)) {
            // dd('yes');
            $file = $request->file($input);
            $filename = $file->getClientOriginalName();
            $folder = uniqid() . '-' .now()->timestamp;
            $file->storeAs($path . $folder, $filename);

            $tempFile =TemporaryFile::Create([
                'folder' =>$folder,
                'filename' => $filename
            ]);

            if(session('files') == null){
                $files = [];
            }else{
                $files = session('files');
            }
            $file = ['filename' => $filename,'folder' => $folder];
            array_push($files, $file);
            session(['files' => $files]);

            return $folder;
        }

        return '';
    }
}
