<?php

namespace App\Http\Livewire\Admin\Account;

use App\Services\Accounting\AccountService;
use App\Services\CompanyService;
use App\Traits\SearchFilterTrait;
use App\Traits\SearchTrait;
use App\Traits\LayoutTrait;
use Livewire\Component;

class Create extends Component
{
    use LayoutTrait;
    use SearchFilterTrait;
    use SearchTrait;

    public $account, $pageTitle;
    public $account_no, $account_name;
    public $opening_balance = 0;
    public $status = "Inactive";

    protected $rules = [
        'account_name' => 'required',
        'account_no' => 'required',
        'status' => 'required',
    ];
    protected $validationAttributes = [
        'account_name' => 'Account Name',
        'account_no' => 'Account No',
        'status' => 'Account Status',
    ];
    protected $messages = [
        'account_name.required' => 'The Account Name cannot be empty.',
        'account_no.required' => 'The Account No cannot be empty.',
        'status.required' => 'Status cannot be empty.',
    ];

    public function render()
    {
        return view('livewire.admin.account.create');
    }
    public function createAccount(AccountService $accountService, CompanyService $companyService)
    {
        $this->validate();
        $companyInfo = $companyService->getCompany();
        $model = $companyService->getCompanyInformationModelPath();
        if ($accountService->createAccount($this->account_no, $this->account_name, $companyInfo->id, $model, $this->opening_balance, $this->status)) {
            session()->flash('success', 'Saved Successfully');
        } else {
            session()->flash('error', 'Something went wrong');
        }
    }
    public function generateAccount(AccountService $accountService)
    {
        $this->account_no = $accountService->generateUniqueCode();
    }
    public function back()
    {
        $this->emit('update_A_list_varView', '');
    }
}