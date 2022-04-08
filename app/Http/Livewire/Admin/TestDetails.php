<?php

namespace App\Http\Livewire\Admin;

use App\Models\Test;
use App\Services\WriterApplicationCompletionService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class TestDetails extends Component
{
    public $testDetails =[];
    public $remarks;
    public $writerId;
    public $listeners = [
        'Refresh' => 'mount',
    ];

    public function mount()
    {
        $id =  session()->pull('writerId');
        $this->writerId = $id;
        $this->testDetails = Test::where('writer_id', $id)->first();
    }
    public function render()
    {
        return view('livewire.admin.test-details');
    }
    public function redirecTo()
    {
        return redirect()->route('applications');
    }
    public function verifyTest()
    {
        $update = Test::where('writer_id', $this->writerId)
                       ->update([
                            'status' => 'verified',
                            'remarks' => $this->remarks,
                            'reviewed_by' => auth()->user()->id,
                       ]);
        if ($update) {
            session()->flash('success', 'Verified Successfully');
            $this->emit('alert_remove');
            // $this->emit('Refresh');
            return redirect()->route('applications');
        }
    }
    public function rejectTest(WriterApplicationCompletionService $writerService)
    {
        // Rule_1
        DB::beginTransaction();
        try {
            Test::where('writer_id', $this->writerId)
                       ->update([
                            'status' => 'Pending',
                            'remarks' => $this->remarks,
                            'reviewed_by' => auth()->user()->id,
                       ]);
            $writerService->deactivateWriter($this->writerId);
            DB::commit();
            session()->flash('success', 'Rejected Successfully');
            $this->emit('alert_remove');
        } catch (\Throwable $th) {
            DB::rollback();
            Log::error($th);
        }
    }
}
