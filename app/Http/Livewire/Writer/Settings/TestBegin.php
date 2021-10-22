<?php

namespace App\Http\Livewire\Writer\Settings;

use App\Models\Test;
use App\Models\TestQuestion;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class TestBegin extends Component
{
    public $instructions, $question;
    public $content = '';

    protected $rules = [
        'content' => 'required',
    ];
    public function mount()
    {
        $randomTest = TestQuestion::inRandomOrder()->first();
        $this->question = $randomTest->question;
        $this->instructions = $randomTest->instructions;
    }
    public function render()
    {
        return view('livewire.writer.settings.test-begin');
    }

    public function store()
    {
        $this->validate();

        $identity  = session()->get('AuthWriter');

        Test::create([
            'writer_id' => $identity,
            'paper' => $this->content,
        ]);

        $this->emit('component', '');
    }
}