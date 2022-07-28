<?php

namespace App\Http\Livewire\Admin\Account;

use App\Services\Accounting\AccountService;
use App\Services\CompanyService;
use App\Traits\SearchFilterTrait;
use App\Traits\SearchTrait;
use App\Traits\LayoutTrait;
use Livewire\Component;

class Show extends Component
{
    use LayoutTrait;
    use SearchFilterTrait;
    use SearchTrait;

    public $account, $pageTitle;
    public $account_no, $account_name, $opening_balance;
    public $status;

    protected $rules = [
        'account_name' => 'required',
        'status' => 'required',
    ];
    protected $validationAttributes = [
        'account_name' => 'Account Name',
        'status' => 'Account Status',
    ];
    protected $messages = [
        'account_name.required' => 'The Account Name cannot be empty.',
        'status.required' => 'Status cannot be empty.',
    ];

    public function mount($id)
    {
        $this->pageTitle = "Account Details";
        $this->xScope = "xCurrent";
        $this->account_no = $id;
    }
    public function render(AccountService $accountService, CompanyService $companyService)
    {
        $companyInfo = $companyService->getCompany();
        $model = $companyService->getCompanyInformationModelPath();
        if (!$accountService->getAccount($companyInfo->id, $model)) {
           $this->account = $accountService->createAccount('', config('app.name'), $companyInfo->id, $model, 0, '');
        } else {
            $this->account = $accountService->getAccount($companyInfo->id, $model);
        }
        $this->account_no = $this->account->account_no;
        $this->account_name = $this->account->account_name;
        $this->opening_balance = $this->account->opening_balance;
        $this->status = $this->account->status;
        return view('livewire.admin.account.show');
    }
    public function update(AccountService $accountService)
    {
        $this->validate();
        if ($accountService->updateAccountDetails($this->account_no, $this->account_name, $this->status)) {
            session()->flash('success', 'Saved Successfully');
        } else {
            session()->flash('error', 'Something went wrong');
        }
    }
    public function back()
    {
        $this->emit('update_A_list_varView', '');
    }
}
