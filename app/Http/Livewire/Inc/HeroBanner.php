<?php

namespace App\Http\Livewire\Inc;

use App\Events\CheckClientEmailEvent;
use App\Models\PaperCategory;
use App\Traits\SendAlerts;
use Livewire\Component;

class HeroBanner extends Component
{
    use SendAlerts;

    public $categories=[];
    public $email, $categoryId, $pages, $dDate, $dTime;

    protected $rules = [
        'email' => ['required', 'email'],
        'pages' => ['required'],
        'dDate' => ['required'],
        'dTime' => ['required'],
        'categoryId' => ['required'],
    ];
    protected $messages = [
        'email.required' => 'Email address cannot be empty.',
        'dDate.required' => 'Provide Deadline Date.',
        'categoryId.required' => 'Select Paper Category.',
        'dTime.required' => 'Provide Deadline Time.',
        'email.email' => 'The Email Address format is not valid.',
    ];
    public function mount()
    {
        $this->categories = PaperCategory::all();
    }
    public function store(){
        $this->validate();
        try {
            session()->forget('Order');
            session()->forget('Initial-Mail');
            session()->forget('Email-Check');
            $this->storeData('Initial-Mail', 'email', $this->email);
            $this->storeData('Order', 'subject_id', $this->categoryId);
            $this->storeData('Order', 'pages', $this->pages);
            $this->storeData('Order', 'deadline_date', $this->dDate);
            $this->storeData('Order', 'deadline_time', $this->dTime);
            event(new CheckClientEmailEvent($this->email));
        } catch (\Exception $th) {
            throw $th;
        }
        redirect()->route('create-order');
    }
    public function render()
    {
        return view('livewire.inc.hero-banner');
    }
}
