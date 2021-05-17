<?php

namespace App\Traits;
//
trait AdminPropertiesTrait
{
    public $keyCol,$pKey,$created_at,$created_by,$updated_at,$updated_by,$recordId;
    public $isList=false,$isCreate=false, $isView=false, $isEdit=false,$isConfirmModal=false,$isAttachments=false,$isSelect=false;
    public $pageTitle, $cols=[], $actions=[],$selected=[],$isSelectAll = false,$xScope, $confirmModal=[],$modalId, $attachments=[],$reports=[],$loadingTargets,$varView;
    public $rules=[],$messages,$searchKeyword,$isFilter = false,$filterColumn,$filterValue,$filterColData,$filters=[];
}