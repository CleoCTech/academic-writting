<?php

namespace App\Http\Livewire\Writer\Settings;

use App\Models\EducationCert;
use App\Models\TemporaryFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class UploadCertSelfie extends Component
{
    public $identity, $type, $filename;
    public function store()
    {
        $this->identity  = session()->get('AuthWriter');

        $certs = EducationCert::where('writer_id', session()->get('AuthWriter'))
                        ->get();
        if ($certs) {
            DB::beginTransaction();
            foreach ($certs as $key => $cert) {
                EducationCert::find($cert)->delete();
                rmdir(storage_path('app/public/writer_files/' .$cert->folder ));
            }
            DB::Commit();
        }

        if (session()->has('files')) {
            foreach (session('files') as $i => $values) {

                if ($values['filename'] == 'cert_selfie.png') {
                    $this->type = 'Selfie';
                }
                if ($values['filename'] == 'cert.pdf') {
                    $this->type = 'PDF';
                }
                EducationCert::create([
                    'writer_id' => $this->identity[0],
                    'folder' => $values['folder'],
                    'filename' =>$values['filename'],
                    'type' =>$this->type,
                ]);

                $temporaryFile = TemporaryFile::where('folder', $values['folder'])->first();
                if ($temporaryFile) {
                    Storage::move('writers/tmp/' .$values['folder']. '/' . $values['filename'], 'writer_files/' .$values['folder']. '/' . $values['filename']);
                        rmdir(storage_path('app/public/writers/tmp/' .$values['folder'] ));
                        $temporaryFile->delete();
                }
            }

        }
        session()->forget('files');
        $this->emit('component', '');

    }
    public function render()
    {
        return view('livewire.writer.settings.upload-cert-selfie');
    }
}
