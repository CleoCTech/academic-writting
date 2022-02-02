<?php

namespace App\Listeners;

use App\Events\AuthenticateExistingClientEvent;
use App\Events\ClientHasLoggedInEvent;
use App\Events\OrderSubmittedEvent;
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
                    $file = ClientFile::Create([
                        'client_id' => $event->client_id,
                        'order_id' => $event->order->id,
                        'folder' => $values['folder'],
                        'filename' => $values['filename'],
                        'from' => $from,
                    ]);
                    $temporaryFile = TemporaryFile::where('folder', $values['folder'])->first();
                    if ($temporaryFile) {
                        Storage::move('clients/tmp/' .$values['folder']. '/' . $values['filename'], 'client_files/' .$values['folder']. '/' . $values['filename']);
                            rmdir(storage_path('app/public/clients/tmp/' .$values['folder'] ));
                            $temporaryFile->delete();
                    }
                    session()->forget('files');
                    //send notification
                    event( new OrderSubmittedEvent($event->order->order_no));
                    return redirect('admin/dashboard');
                }elseif(session()->get('LoggedClient')){
                    $from = 'client';
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
                        Storage::move('clients/tmp/' .$values['folder']. '/' . $values['filename'], 'client_files/' .$values['folder']. '/' . $values['filename']);
                            rmdir(storage_path('app/public/clients/tmp/' .$values['folder'] ));
                            $temporaryFile->delete();
                    }

                    session()->forget('files');
                    //send notification
                    return redirect('client/dashboard');
                }else{
                    $from = 'client';
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
                        Storage::move('clients/tmp/' .$values['folder']. '/' . $values['filename'], 'client_files/' .$values['folder']. '/' . $values['filename']);
                            rmdir(storage_path('app/public/clients/tmp/' .$values['folder'] ));
                            $temporaryFile->delete();
                    }

                    session()->forget('files');
                    //send notification
                }

            }

        }


    }
}