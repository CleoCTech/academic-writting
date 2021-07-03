<?php

namespace App\Http\Livewire\Writer\Settings;

use App\Models\TemporaryFile;
use App\Models\WorkExperience as ModelsWorkExperience;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class WorkExperience extends Component
{

    public $type, $filename;
    public function store()
    {
        $this->identity  = session()->get('AuthWriter');

        $cvs = ModelsWorkExperience::where('writer_id', session()->get('AuthWriter'))
                        ->get();
        if ($cvs) {
            DB::beginTransaction();
            foreach ($cvs as $key => $cv) {
                ModelsWorkExperience::find($cv)->delete();
                rmdir(storage_path('app/public/writer_files/' .$cv->folder ));
            }
            DB::Commit();
        }

        if (session()->has('files')) {
            foreach (session('files') as $i => $values) {

                if ($values['filename'] == 'cv.pdf') {
                    $this->type = 'PDF';
                }
                ModelsWorkExperience::create([
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
        return view('livewire.writer.settings.work-experience');
    }
    public function settings($component)
    {
        $this->emit('component', $component);
    }
}
