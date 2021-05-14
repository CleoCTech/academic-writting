<?php

namespace App\Listeners;

use App\Models\ClientFile;
use App\Models\TemporaryFile;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class StoreFilesListener
{
    public function handle($event)
    {
        if (session()->has('files')) {
            foreach (session('files') as $i => $values) {

                $file = ClientFile::Create([
                    'client_id' => $event->client_id,
                    'order_id' => $event->order->id,
                    'folder' => $values['folder'],
                    'filename' => $values['filename'],

                ]);
                // dump($values['folder']);
                // dump($values['filename']);
                $temporaryFile = TemporaryFile::where('folder', $values['folder'])->first();
                if ($temporaryFile) {
                    $file->addMedia(storage_path('app/public/clients/tmp/' .$values['folder']. '/' . $values['filename'] ))
                        ->toMediaCollection('client_files');
                        rmdir(storage_path('app/public/clients/tmp/' .$values['folder'] ));
                        $temporaryFile->delete();
                }
            }

        }
        session()->forget('files');
        // dd('End');

    }
}
