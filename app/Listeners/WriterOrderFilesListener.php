<?php

namespace App\Listeners;

use App\Models\OrderStatus;
use App\Models\TemporaryFile;
use App\Models\WriterFile;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class WriterOrderFilesListener
{

    public $event;
    public function handle($event)
    {
        $this->event = $event;
        if (session()->has('files')) {
            DB::transaction(function () {
                try {
                    foreach (session('files') as $i => $values) {

                        $file = WriterFile::Create([
                            'writer_id' => $this->event->writer_id,
                            'order_id' => $this->event->orderId,
                            'folder' => $values['folder'],
                            'filename' => $values['filename'],
                            'status' => 'Pending',
                        ]);
                        // dump($values['folder']);
                        // dump($values['filename']);
                        $temporaryFile = TemporaryFile::where('folder', $values['folder'])->first();
                        if ($temporaryFile) {
                            Storage::move('clients/tmp/' .$values['folder']. '/' . $values['filename'], 'writer_files/' .$values['folder']. '/' . $values['filename']);
                                rmdir(storage_path('app/public/clients/tmp/' .$values['folder'] ));
                                $temporaryFile->delete();
                        }
                    }

                    // OrderStatus::create(['']);
                    $orderStatus = OrderStatus::updateOrCreate(
                                        ['order_id' =>  $this->event->orderId],
                                        ['current_position' => 'Editor']
                                    );
                } catch (\Throwable $th) {
                    $th->getMessage();
                    // abort(403, 'Ooops! Something went wrong');
                }
            });

        }
        session()->forget('files');
        session()->put('retainView', $event->orderId);
        return redirect('writer/my-orders');
    }
}