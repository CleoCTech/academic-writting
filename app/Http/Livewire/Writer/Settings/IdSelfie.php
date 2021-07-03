<?php

namespace App\Http\Livewire\Writer\Settings;

use App\Models\IdVerification;
use App\Models\TemporaryFile;
use App\Models\VerificationDetails;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class IdSelfie extends Component
{
    public $identity, $side, $filename;
    public function store()
    {
        $IdentityType = session()->pull('identityId');
        $writer  = session()->get('AuthWriter');
        $this->identity = IdVerification::create([
            'writer_id' => $writer[0],
            'type' =>$IdentityType
        ]);

        if (session()->has('files')) {
            foreach (session('files') as $i => $values) {

                if ($values['filename'] == 'ID_front.png') {
                    $this->side = 'Front';
                }
                if ($values['filename'] == 'ID_back.png') {
                    $this->side = 'Back';
                }
                if ($values['filename'] == 'my_selfie.png') {
                    $this->side = 'Selfie';
                }
                VerificationDetails::create([
                    'verify_id' => $this->identity->id,
                    'side' => $this->side,
                    'folder' => $values['folder'],
                    'filename' =>$values['filename'],
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
        return view('livewire.writer.settings.id-selfie');
    }
}
