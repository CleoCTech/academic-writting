<?php

namespace App\Http\Livewire\Admin;

use App\Models\Test;
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
        $this->testDetails = Test::where('writer_id', $id)
                                    ->first();
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
    public function rejectTest()
    {
        $update = Test::where('writer_id', $this->writerId)
                       ->update([
                            'status' => 'Pending',
                            'remarks' => $this->remarks,
                            'reviewed_by' => auth()->user()->id,
                       ]);
        if ($update) {
            session()->flash('success', 'Verified Successfully');
            $this->emit('alert_remove');
            return redirect()->route('applications');
            // $this->emit('Refresh');
        }               
    }
}