<?php

namespace App\Services;

use App\Models\AssignmentHandle;
use App\Models\EducationCert;
use App\Models\IdVerification;
use App\Models\Service;
use App\Models\SubjectHandle;
use App\Models\Test;
use App\Models\VerificationDetails;
use App\Models\WorkExperience;
use App\Models\Writer;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class WriterApplicationCompletionService
{
    public function checkPersonalDetails($id)
    {
        $details = Writer::where('id',$id)->first();

        if ($details->about_long != null
        && $details->about_short != null
        && $details->degree != null
        && $details->avatar != null
        && $details->firstname != null
        && $details->lastname != null
        && $details->dob != null
        && $details->degree != null) { return true; } else { return false; }
    }
    public function checkTasksWriterHandles($id)
    {
        $tasks = AssignmentHandle::where('writer_id', $id)->get();
        if ($tasks) {
            return $tasks;
        } else { return false; }

    }
    public function checkSubjectsWriterHandles($id)
    {
        $subjects = SubjectHandle::where('writer_id', $id)->get();
        if ($subjects) {
            return $subjects;
        } else { return false; }
    }
    public function checkServicesWriterHandles($id)
    {
        $services = Service::where('writer_id', $id)->get();
        if ($services) {
            return $services;
        } else { return false; }
    }
    public function checkIdentity($id)
    {
        $selfie = false;
        $front = false;
        $back = false;

        $identity = IdVerification::where('writer_id', $id)->first();
        if ($identity) {
            $identityDetails = VerificationDetails::where('verify_id', $identity->id)->get();
            foreach ($identityDetails as $key => $value) {
                if ($value->side == 'Selfie') {
                    $selfie = true;
                } elseif ($value->side == 'Back') {
                    $back = true;
                } elseif ($value->side == 'Front') {
                    $front = true;
                }
            }
            if (!$back || !$front || !$selfie) {
                return false;
            }
            return $identity;
        } else { return false; }
    }
    public function checkEducationDetails($id)
    {
        $cert = false;
        $cert_selfie = false;
        $educationDetails = EducationCert::where('writer_id', $id)->get();
        if ($educationDetails) {
            foreach ($educationDetails as $key => $value) {
                if ($value->filename == 'cert_selfie.png') {
                    $cert_selfie = true;
                } elseif ($value->filename == 'cert.pdf') {
                    $cert = true;
                }
            }
            if (!$cert || !$cert_selfie ) { return false;} else { return $educationDetails;}
        } else { return false; }
    }
    public function checkWorkExperience($id)
    {
        $workExprience = WorkExperience::where('writer_id', $id)->first();
        if ($workExprience) {
            return $workExprience;
        } else { return false; }
    }

    // ✔✅verifications--------------------------------------------

    public function IsIdentityVerified($id)
    {
        $identity = IdVerification::where('writer_id', $id)
        ->where('status', 'verified')
        ->first();
        return ($identity) ? true : false;
    }
    public function IsSampleTestVerified($id)
    {
        $test = Test::where('writer_id', $id)
        ->where('status', 'verified')
        ->first();
        return ($test) ? true : false;
    }
    public function IsWorkExperienceVerified($id)
    {
        $workExprience = WorkExperience::where('writer_id', $id)
        ->where('status', 'verified')
        ->first();
        return ($workExprience) ? true : false;
    }
    public function IsEducationVerified($id)
    {
        $cert = false;
        $cert_selfie = false;
        $educationDetails = EducationCert::where('writer_id', $id)->get();
        if ($educationDetails) {
            foreach ($educationDetails as $key => $value) {
                if ($value->filename == 'cert_selfie.png' && $value->status == 'verified') {
                    $cert_selfie = true;
                } elseif ($value->filename == 'cert.pdf' && $value->status == 'verified') {
                    $cert = true;
                }
            }
            if (!$cert || !$cert_selfie ) { return false;} else { return false; }
        } else { return false; }

    }
    public function activateWriter($id)
    {
        //🖊Rule_1: Any DB Modification Must Have a Transaction;
        DB::beginTransaction();
        try {
            Writer::where('id', $id)->update([ 'status' => 'Active',]);
            DB::commit();
            return true;
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error($th);
            return true;
        }

    }
    public function deactivateWriter($id)
    {
        //🖊Rule_1: Any DB Modification Must Have a Transaction;
        DB::beginTransaction();
        try {
            Writer::where('id', $id)->update([ 'status' => 'Inactive',]);
            DB::commit();
            return true;
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error($th);
            return true;
        }
    }
}
