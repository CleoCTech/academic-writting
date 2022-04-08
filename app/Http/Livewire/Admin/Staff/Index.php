<?php

namespace App\Http\Livewire\Admin\Staff;

use App\Models\User;
use App\Services\UserService;
use Livewire\Component;
use App\Traits\SearchFilterTrait;
use App\Traits\SearchTrait;
use App\Traits\AdminPropertiesTrait;
use App\Traits\LayoutTrait;

class Index extends Component
{
    use LayoutTrait;
    use AdminPropertiesTrait;
    use SearchFilterTrait;
    use SearchTrait;

    public $pageSettings = [
        'isList' => true,
        'isNew' => false,
        'isView' => true,
        'isEdit' => true,
        'isDelete' => true,
        'isActions' => true,
        'isAttachments' => false,
        'isReports' => false,
        'isSearch' => true,
        'isSelect' => true,
    ];

    protected $listeners = [
        'update_U_list_varView' =>'updateVarView'
    ];
    public $varView, $user_id, $email, $email_verified_at, $username, $role, $status, $is_admin, $created_at, $updated_at;
    public $online = false;
    public function mount(){

        $this->varView;
        $this->pageTitle = "Users";
        $this->xScope = "xCurrent";
        $this->loadingTargets = "list,create,view,edit,store,destroyPrompt,destroy,select";
        $this->isList=true;
    }
    public function render()
    {
        $data = User::search($this->searchKeyword)
        // ->whereNotNull('email_verified_at')
        ->get();
        $this->cols = [
            ['colName' => "created_at",'colCaption' => 'Date', 'type' => 'date', 'element' => 'input', 'isEdit' => false,'isCreate' => false, 'isList' => true, 'isView' => true,'isSearch' => true],
            ['colName' => "id", 'colCaption' => 'ID','type' => 'integer','element' => 'input', 'isKey' => true, 'isEdit' => false,'isCreate' => false, 'isList' => false, 'isView' => false,'isSearch' => false],
            ['colName' => "email",'colCaption' => 'Email Address', 'type' => 'text', 'element' => 'input', 'isEdit' => false,'isCreate' => false, 'isList' => true, 'isView' => false,  'isSearch' => true],
            ['colName' => "name",'colCaption' => 'Username', 'type' => 'text', 'element' => 'input', 'isEdit' => false,'isCreate' => false, 'isList' => true, 'isView' => false,  'isSearch' => true],
            ['colName' => "online",'colCaption' => 'Online', 'type' => 'text', 'element' => 'input', 'isEdit' => false,'isCreate' => false, 'isList' => true, 'isView' => true,'isSearch' => true],
            ['colName' => "status",'colCaption' => 'Status', 'type' => 'text', 'element' => 'input', 'isEdit' => false,'isCreate' => false, 'isList' => true, 'isView' => true,'isSearch' => true],
            ['colName' => "role",'colCaption' => 'Role', 'type' => 'text', 'element' => 'input', 'isEdit' => false,'isCreate' => false, 'isList' => true, 'isView' => true,'isSearch' => true],
            ['colName' => "is_admin",'colCaption' => 'Admin', 'type' => 'text', 'element' => 'input', 'isEdit' => false,'isCreate' => false, 'isList' => true, 'isView' => true,'isSearch' => true],
            ['colName' => "updated_at",'colCaption' => 'Date Updated', 'type' => 'date', 'element' => 'input', 'isEdit' => false,'isCreate' => false, 'isList' => false, 'isView' => true,'isSearch' => true],

        ];
        $this->keyCol = $this->getKeyCol();
        return view('livewire.admin.staff.index')->with('data',$data)->layout('layouts.client');
    }
    public function getStaffStatus($id)
    {
        return User::where('id', $id)->first()->status;
    }
    public function chatbox($id)
    {
        $model = "App\Models\Client";

        session()->put('userIdN', $id);
        session()->put('userTypeFro', $model);

        if (auth()->user()!=null) {
            return redirect()->route('admin-chat');
        }

    }
    public function view($id)
    {
        $this->user_id = $id;
        $this->varView = 'user-details';
    }
    public function updateVarView($value)
    {
        $this->varView = $value;
    }
    public function deactivateAccount(UserService $userService, $id)
    {
        $userService->deactivateAccount($id);
        session()->flash('success', 'Deactivated Successfully');
    }
    public function activateAccount(UserService $userService, $id)
    {
        $userService->activateAccount($id);
        session()->flash('success', 'Activated Successfully');
    }
}
