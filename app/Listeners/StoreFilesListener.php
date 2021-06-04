<?php

namespace App\Listeners;

use App\Models\ClientFile;
use App\Models\TemporaryFile;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Storage;

class StoreFilesListener
{
    public function handle($event)
    {
        if (session()->has('files')) {
            foreach (session('files') as $i => $values) {

                if (auth()->user()!=null) {
                    $from = 'company';
                }elseif(session()->get('LoggedClient')){
                    $from = 'client';
                }else{
                    $from = 'client';
                }
                $file = ClientFile::Create([
                    'client_id' => $event->client_id,
                    'order_id' => $event->order->id,
                    'folder' => $values['folder'],
                    'filename' => $values['filename'],
                    'from' => $from,
                ]);
                // dump($values['folder']);
                // dump($values['filename']);
                $temporaryFile = TemporaryFile::where('folder', $values['folder'])->first();
                if ($temporaryFile) {
                    // $file = storage_path('app/public/clients/tmp/' .$values['folder']. '/' . $values['filename'] );
                    Storage::move('clients/tmp/' .$values['folder']. '/' . $values['filename'], 'client_files/' .$values['folder']. '/' . $values['filename']);
                    // $file->storeAs('client_files/' .$values['folder']. '/' . $values['filename']);
                    // $file->addMedia(storage_path('app/public/clients/tmp/' .$values['folder']. '/' . $values['filename'] ))
                    //     ->toMediaCollection('client_files');
                        rmdir(storage_path('app/public/clients/tmp/' .$values['folder'] ));
                        $temporaryFile->delete();
                }
            }

        }
        session()->forget('files');

        if (auth()->user()!=null) {

        }elseif(session()->get('LoggedClient')){
            return redirect('client/dashboard');
        }
        // dd('End');

    }
}