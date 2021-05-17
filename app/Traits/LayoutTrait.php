<?php

namespace App\Traits;

trait LayoutTrait
{
	public function updateVariable($xScope,$varName){
        if($xScope == 'xCurrent'){//updates a variable within the current component scope
            $this->$varName = false;
        }
        if($varName == 'validationErrors'){
            $this->resetValidation();
        }
        if($varName == 'validationErrors'){
            $this->resetValidation();
        }
        if (strpos($varName, 'session_') !== false) {
            $sessionVariable = substr($varName, strpos($varName, "session_") + 1);
            session()->forget($sessionVariable);
        }
    }
    public function select($id){
        if($id != '##All'){
            if(in_array($id,$this->selected)){
                if (($key = array_search($id, $this->selected)) !== false) {
                    unset($this->selected[$key]);
                }
            }else{
                array_push($this->selected,$id);
            }
        }
        else{
            if($this->isSelectAll == false){
                $this->selected = [];
                foreach($this->data as $record){
                    array_push($this->selected,$record[$this->keyCol]);
                }
                $this->isSelectAll = true;
            }else{
                $this->selected = [];
                $this->isSelectAll = false;
            }
        }
        //
        if(count($this->selected) > 1 || count($this->selected) == 0){
            if(count($this->selected) == 0){
                $this->isSelectAll = false;
            }
        }else{
            if(count($this->selected) == 1){
                sort($this->selected);
                $this->pKey = $this->selected[0];
            }
        }
    }
    private function getKeyCol(){
        foreach ($this->cols as $key => $col) {
            if (isset($col['isKey']) && $col['isKey'] == true) {
                return $this->cols[$key]['colName'];
            }
        }
        return null;
    }
}
