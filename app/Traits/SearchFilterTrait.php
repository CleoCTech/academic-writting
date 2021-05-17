<?php

namespace App\Traits;

use Illuminate\Support\Facades\Schema;

trait SearchFilterTrait
{
    public function searchFilter($state){
        $this->isFilter = $state;
        if($this->isFilter){
            $this->varView = null;
            $this->modalId = "varView";
            $this->varView = "livewire.general.search-filter";
        }else{
            $this->isFilter = false;
        }
    }
    public function onSelectColumn(){
        $key = array_search($this->filterColumn, array_column($this->cols, 'colName'));
        $this->filterColData = $this->cols[$key];
        //$this->isSearchFilterColumn = true;
    }
    public function addFilter(){
        $this->filters[] = ['column' => $this->filterColumn, 'value' => $this->filterValue];
        $this->filterColumn = '';
        $this->filterValue = '';
        $this->filterColData = '';
    }
    public function removeFilter($key){
        unset($this->filters[$key]);
    }
    public function clearFilters(){
        $this->filters = [];
    }
}
