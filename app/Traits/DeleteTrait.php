<?php

 namespace App\Traits;

use Illuminate\Support\Facades\Schema;
 use Illuminate\Support\Facades\DB;

 trait DeleteTrait{

    public $deleteId, $model;
    public function sendId(int $id, string $model): void
    {
        $this->deleteId = $id;
        $this->model = $model;
    }
    public function Destroy(): void
    {
        $Model = app("App\\Models\\$this->model");
        try{
            DB::beginTransaction();
            $record = $Model::find($this->deleteId)->delete();
            DB::Commit();
            session()->flash('success', 'Deleted Successfully');
        }catch(\Exception $e){
            DB::rollback();
            session()->flash('error', config('app.errors')['default']);
        }
    }


 }

?>
