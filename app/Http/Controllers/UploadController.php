<?php

namespace App\Http\Controllers;

use App\Models\TemporaryFile;
use App\Traits\FileUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class UploadController extends Controller
{
    use FileUploadTrait;

    public function store(Request $request)
    {
        if ($request->hasFile('paperFile')) {
            // dd('yes');
            $files= $request->file('paperFile');
            foreach ($files as $key => $file) {
                $filename = $file->getClientOriginalName();
                $folder = uniqid() . '-' .now()->timestamp;
                $file->storeAs('clients/tmp/' . $folder, $filename);

                $tempFile =TemporaryFile::Create([
                    'folder' =>$folder,
                    'filename' => $filename
                ]);

                if(session('files') == null){
                    $xfiles = [];
                }else{
                    $xfiles = session('files');
                }
                $xfile = ['filename' => $filename,'folder' => $folder];
                array_push($xfiles, $xfile);
                session(['files' => $xfiles]);

                return $folder;
            }

        }

        return '';

    }

    public function storeIdFront(Request $request)
    {
        if ($request->hasFile('paperFile')) {
            // dd('yes');
            $file = $request->file('paperFile');
            $filename =  'ID_front.png';
            $folder = uniqid() . '-' .now()->timestamp;
            $file->storeAs('writers/tmp/' . $folder, $filename);

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
    public function storeIdBack(Request $request)
    {
        if ($request->hasFile('paperFile')) {
            // dd('yes');
            $file = $request->file('paperFile');
            // $filename = $file->getClientOriginalName();
            $filename = "ID_back.png";
            $folder = uniqid() . '-' .now()->timestamp;
            $file->storeAs('writers/tmp/' . $folder, $filename);

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
    public function selfie(Request $request)
    {
        if ($request->hasFile('paperFile')) {
            // dd('yes');
            $file = $request->file('paperFile');
            // $filename = $file->getClientOriginalName();
            $filename = "my_selfie.png";
            $folder = uniqid() . '-' .now()->timestamp;
            $file->storeAs('writers/tmp/' . $folder, $filename);

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
    public function certificate(Request $request)
    {
        if ($request->hasFile('paperFile')) {
            // dd('yes');
            $file = $request->file('paperFile');
            // $filename = $file->getClientOriginalName();
            $filename = "cert.pdf";
            $folder = uniqid() . '-' .now()->timestamp;
            $file->storeAs('writers/tmp/' . $folder, $filename);

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
    public function certSelfie(Request $request)
    {
        if ($request->hasFile('paperFile')) {
            // dd('yes');
            $file = $request->file('paperFile');
            // $filename = $file->getClientOriginalName();
            $filename = "cert_selfie.png";
            $folder = uniqid() . '-' .now()->timestamp;
            $file->storeAs('writers/tmp/' . $folder, $filename);

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
    public function cv(Request $request)
    {
        if ($request->hasFile('paperFile')) {
            // dd('yes');
            $file = $request->file('paperFile');
            // $filename = $file->getClientOriginalName();
            $filename = "cv.pdf";
            $folder = uniqid() . '-' .now()->timestamp;
            $file->storeAs('writers/tmp/' . $folder, $filename);

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