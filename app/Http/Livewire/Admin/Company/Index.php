<?php

namespace App\Http\Livewire\Admin\Company;

use App\Services\CompanyService;
use Livewire\Component;

class Index extends Component
{
    public $pageTitle, $company_name, $short_name, $establishment_date, $history, $vision, $mission, $location, $emails, $phone_numbers, $address, $logo, $account_no, $status;

    public function mount()
    {
        $this->pageTitle = "Company Details";
    }
    public function render(CompanyService $companyService)
    {
        $companyInfo = $companyService->getCompany();

        $this->company_name =$companyInfo->company_name;
        $this->short_name =$companyInfo->short_name;
        $this->establishment_date =$companyInfo->establishment_date;
        $this->history =$companyInfo->history;
        $this->vision =$companyInfo->vision;
        $this->mission =$companyInfo->mission;
        $this->location =$companyInfo->location;
        $this->emails =$companyInfo->emails;
        $this->phone_numbers =$companyInfo->phone_numbers;
        $this->address =$companyInfo->address;
        $this->logo =$companyInfo->logo;
        $this->account_no = $companyInfo->account_no;
        $this->status = $companyInfo->status;

        return view('livewire.admin.company.index')->layout('layouts.client');
    }
    public function back()
    {
        return redirect()->route('admin-dashboard');
    }
}