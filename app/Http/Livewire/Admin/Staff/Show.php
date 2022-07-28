<?php

namespace App\Http\Livewire\Admin\Staff;

use App\Models\User;
use Livewire\Component;
use App\Traits\SearchFilterTrait;
use App\Traits\SearchTrait;
use App\Traits\AdminPropertiesTrait;
use App\Traits\LayoutTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class Show extends Component
{
    use LayoutTrait;
    use AdminPropertiesTrait;
    use SearchFilterTrait;
    use SearchTrait;

    public $user_id, $is_admin, $role, $status;

    public function mount($id)
    {
        $this->pageTitle = "User's Summary";
        $this->xScope = "xCurrent";
        $this->user_id = $id;
    }
    public function render()
    {
        $user = User::where("id", $this->user_id)->first();
        $this->role = $user->role;
        $this->is_admin = $user->is_admin;
        $this->status = $user->status;
        return view('livewire.admin.staff.show', [
            'user' => $user,
        ]);
    }
    public function back()
    {
        $this->emit('update_U_list_varView', '');
    }
    public function update()
    {
         //🖊Rule_1: Any DB Modification Must Have a Transaction;
         DB::beginTransaction();
         try {
             User::where('id', $this->user_id)
             ->update([
                 'is_admin' => $this->is_admin,
                 'status' => $this->status,
                 'role' => $this->role,
                ]);
             DB::commit();
             session()->flash('success', 'Saved Successfully');
         } catch (\Throwable $th) {
             DB::rollBack();
             session()->flash('error', $th->getMessage());
             Log::error($th);
             return true;
         }
    }
}