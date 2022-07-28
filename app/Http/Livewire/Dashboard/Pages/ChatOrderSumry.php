<?php

namespace App\Http\Livewire\Dashboard\Pages;

use App\Events\ActivityRefreshedEvent;
use App\Events\InvoiceAcceptedEvent;
use App\Events\InvoiceRejectedEvent;
use App\Models\Order;
use Livewire\Component;
use App\Events\InvoiceSentEvent;
use App\Events\OrderAnswerUploadEvent;
use App\Models\AcceptedOrder;
use App\Models\ClientFile;
use App\Models\Notification;
use App\Models\OrderBilling;
use App\Models\OrderStatus;
use App\Models\RejectedOrder;
use App\Models\WriterFile;
use App\Models\WriterOrder;
use App\Services\Accounting\AccountService;
use App\Services\ClientService;
use App\Services\CompanyService;
use App\Services\WriterService;
use Illuminate\Support\Facades\DB;
use App\Traits\LayoutTrait;
use App\Traits\AdminPropertiesTrait;
use App\Traits\SearchFilterTrait;
use App\Traits\SearchTrait;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ChatOrderSumry extends Component
{

    use LayoutTrait;
    use AdminPropertiesTrait;
    use SearchFilterTrait;
    use SearchTrait;

    public $orderPK, $orderId, $client, $admin, $messageText, $from_id, $to_id, $type, $fee, $activity, $activity_id, $file_id, $companyFile, $comment;
    public $confirm_invoice, $reject_section, $accept_section, $saved=false;
    public $rejectBtn = true;
    public $acceptBtn = true;
    public $total_fee='Pending';
    public $orderStatus=false;
    public $showOperationSection = false;
    public $orderNextLevel = false;
    public $InvoiceAccepted = false;
    public $InvoiceRejected = false;
    public $orderDetails, $messages_sent, $messages_received, $messages, $activitie, $clientFiles, $companyFiles, $revisions, $writerFiles=[];

    public $user_type;

    protected $listeners = [
        'back'=>'back',
        'sendMessage'=>'sendMessage',
        'getDownload'=>'getDownload',
        'edit'=>'edit',
        'confrimInvoice'=>'confrimInvoice',
        'rejectInvoice'=>'rejectInvoice',
        'invoice-sent' => '$refresh',
        'fire-activity-refreshed' => 'fireActivityRefreshedEvent',
    ];

    public function back()
    {
        $this->emit('update_varView', '');
    }
    public function rejectInvoice()
    {
        Notification::
            where('id', $this->activity_id)
            ->update(['status' => 'rejected']);
            $this->alert('success', 'Invoice declined successfully', [
                'position' => 'top-end',
                'timer' =>  3000,
                'toast' =>  true,
                'text' =>  '',
                'confirmButtonText' =>  'Ok',
                'cancelButtonText' =>  'Cancel',
                'showCancelButton' =>  false,
                'showConfirmButton' =>  false,
            ]);
            session()->flash('success', 'Invoice declined successfully.');
            event(new InvoiceRejectedEvent());
    }
    public function confrimInvoice()
    {
        if (session()->get('LoggedClient')!=null) {
            $id = session()->get('LoggedClient');
            $this->from_id= $id;
            $this->to_id=1 ;
            $this->type= 'Client';
        }

        $this->orderId = session()->get('orderId');
        $order = Order::with('order')
                                    ->where('order_no', $this->orderId)
                                    ->first();
        OrderBilling::create([
            'order_id' => $order->id,
            'client_id' => $this->orderDetails->client_id,
            'amount' => $this->fee,
            'total_amount' => ($order->pages * $this->fee),
            'prepared_by' => $this->to_id,
        ]);

        Notification::where('id', $this->activity_id)
                ->update(['status' => 'responded']);

        Order::where('id',  $order->id)
                ->update(['status' => 'In progress']);
                $this->alert('success', 'Invoice Confirmed successfully', [
                    'position' => 'top-end',
                    'timer' =>  3000,
                    'toast' =>  true,
                    'text' =>  '',
                    'confirmButtonText' =>  'Ok',
                    'cancelButtonText' =>  'Cancel',
                    'showCancelButton' =>  false,
                    'showConfirmButton' =>  false,
                ]);
        session()->flash('success', 'Invoice Confirmed successfully.');

        event(new InvoiceAcceptedEvent());
        // session()->flash('Invoice-Confirmed', 'Invoice Confirmed Succesfully, Your Order Is In Progress.');
        return redirect()->route('dashboard');

    }
    public function render()
    {
        if (session()->get('LoggedClient')) {

            $this->user_type = 'App\Models\Client';
            $this->orderId = session()->get('orderId');
            $this->orderDetails = Order::with('order')
                                        ->where('order_no', $this->orderId)
                                        ->first();
            if ($this->orderDetails->status == 'Pending') {
                $this->orderStatus =true;
            }
            $order_bill = OrderBilling::where('order_id',  $this->orderDetails->id)->first();
            if ($order_bill) {
                $this->total_fee = $order_bill->total_amount;
            }
            $user_id = 'Client';
            $my_id = session()->get('LoggedClient');
            $this->client = session()->get('LoggedClient');
            // Message::where(['from_id' => $user_id, 'to_id' => $my_id])->update(['is_read' => 1]);
            // Get all message from selected user

            // $this->activity = Notification::where('order_no', $this->orderId)
            // ->where('status', 'waiting')
            // ->first();
            $this->activity = Notification::
                where('toable_type', 'App\Models\Client')
                ->where('toable_id', session()->get('LoggedClient'))
                ->where('status', 'waiting')
                ->latest()
                ->first();

            if ($this->activity) {
                if ($this->activity->title == "Sent Invoice") {
                    $this->confirm_invoice =true;
                    $this->activity_id = $this->activity->id;
                    $this->fee = $this->activity->value;

                }elseif($this->activity->title == "Sent Invoice" && $this->activity->status == "responded" || $this->activity->status == "rejected"){
                    $this->confirm_invoice =false;
                }
            }
            $this->clientFiles = ClientFile::where('client_id', $my_id)
                                            ->where('order_id',  $this->orderDetails->id)
                                            ->where('from',  'client')
                                            ->get();
            $this->companyFiles = ClientFile::where('client_id', $my_id)
                                            ->where('order_id',  $this->orderDetails->id)
                                            ->where('from',  'company')
                                            ->get();
            $this->writerFiles = WriterFile::where('order_id',  $this->orderDetails->id)
                                            ->where('status', 'Accepted')
                                            ->get();
            $this->revisions = RejectedOrder::where('order_id', $this->orderDetails->id)->get();
        }

        if (auth()->user()!=null) {
            $this->user_type = 'App\Models\User';
            $this->orderId = session()->get('orderId');
            $this->orderDetails = Order::with('order')
                                        ->where('order_no', $this->orderId)
                                        ->first();
            if ($this->orderDetails->status == 'Pending') {
                $this->orderStatus =true;
            }
            $order_bill = OrderBilling::where('order_id',  $this->orderDetails->id)->first();
            if ($order_bill) {
               $this->total_fee = $order_bill->total_amount;
            }
            $user_id =$this->orderDetails->client_id;
            $my_id = auth()->user()->id;
            // Message::where(['from_id' => $user_id, 'to_id' => $my_id])->update(['is_read' => 1]);
            // Get all message from selected user
            $this->activity = Notification::where('order_no', $this->orderId)
            ->where('status', 'rejected')
            ->first();

            if ($this->activity != null) {
                if ($this->activity->title == "Sent Invoice") {
                    $this->confirm_invoice =true;
                    $this->activity_id = $this->activity->id;
                    $this->fee = $this->activity->value;

                }elseif($this->activity->title == "Sent Invoice" && $this->activity->status == "responded" ){
                    $this->confirm_invoice =false;
                }
            }

            if ($this->activity != null) {
                if ($this->activity->name == "Sent Invoice" && $this->activity->status == "responded") {
                    $this->InvoiceAccepted = true;
                }elseif($this->activity->name == "Sent Invoice" &&  $this->activity->status == "rejected"){
                    $this->InvoiceRejected = true;
                }
            }

            $this->clientFiles = ClientFile::where('client_id', $user_id)
                                            ->where('order_id',  $this->orderDetails->id)
                                            ->where('from',  'client')
                                            ->get();
            $this->companyFiles = ClientFile::where('client_id', $user_id)
                                            ->where('order_id',  $this->orderDetails->id)
                                            ->where('from',  'company')
                                            ->get();
            $this->writerFiles = WriterFile::where('order_id',  $this->orderDetails->id)
                                            ->get();
            $this->grantOrderOperation($this->orderDetails->id, auth()->user()->role);
            $this->revisions = RejectedOrder::where('order_id', $this->orderDetails->id)->get();
        }
        // event (new ActivityRefreshedEvent());
        // $this->fireActivityRefreshedEvent();
        return view('livewire.dashboard.pages.chat-order-sumry');
    }
    public function fireActivityRefreshedEvent()
    {
        // dd('here');
        event (new ActivityRefreshedEvent());
    }
    public function getDownload($value)
    {
        if (session()->has('LoggedClient')) {
            // $file= 'storage/writer_files/' .$value;
            $file= 'storage/client_files/' .$value;
            if (file_exists($file)) {
                return response()->download($file);
            } else {
                $this->alert('error', 'File Does Not Exist', [
                    'position' => 'top-end',
                    'timer' =>  3000,
                    'toast' =>  true,
                    'text' =>  '',
                    'confirmButtonText' =>  'Ok',
                    'cancelButtonText' =>  'Cancel',
                    'showCancelButton' =>  false,
                    'showConfirmButton' =>  false,
                ]);
            }
        } else {
            $file= 'storage/client_files/' .$value;

            if (file_exists($file)) {
                return response()->download($file);
            } else {
                $this->alert('error', 'File Does Not Exist.', [
                    'position' => 'top-end',
                    'timer' =>  3000,
                    'toast' =>  true,
                    'text' =>  '',
                    'confirmButtonText' =>  'Ok',
                    'cancelButtonText' =>  'Cancel',
                    'showCancelButton' =>  false,
                    'showConfirmButton' =>  false,
                ]);
            }
        }
    }
    public function getAnswer($value)
    {
        if (session()->has('LoggedClient')) {
            $file= 'storage/writer_files/' .$value;
            // $file= 'storage/client_files/' .$value;
            if (file_exists($file)) {
                return response()->download($file);
            } else {
                $file= 'storage/client_files/' .$value;
                if (file_exists($file)) {
                    return response()->download($file);
                } else {
                    $this->alert('error', config('app.errors.client.FileNotFound'), [
                        'position' => 'top-end',
                        'timer' =>  3000,
                        'toast' =>  true,
                        'text' =>  '',
                        'confirmButtonText' =>  'Ok',
                        'cancelButtonText' =>  'Cancel',
                        'showCancelButton' =>  false,
                        'showConfirmButton' =>  false,
                    ]);
                }

            }
        } else {
            $file= 'storage/client_files/' .$value;

            if (file_exists($file)) {
                return response()->download($file);
            } else {
                $this->alert('error', 'File Does Not Exist.', [
                    'position' => 'top-end',
                    'timer' =>  3000,
                    'toast' =>  true,
                    'text' =>  '',
                    'confirmButtonText' =>  'Ok',
                    'cancelButtonText' =>  'Cancel',
                    'showCancelButton' =>  false,
                    'showConfirmButton' =>  false,
                ]);
            }
        }
    }
    public function orderCurrentStatus($orderId)
    {
        $orderstaus = OrderStatus::where('order_id', $orderId)->first();
        if ($orderstaus) {
            return $orderstaus->current_position;
        } else {
            return 0;
        }
    }
    public function grantOrderOperation($orderId, $role)
    {
        $orderstaus = OrderStatus::where('order_id', $orderId)->first();
        if ($orderstaus) {
            if ($orderstaus->current_position === $role ) {
                $this->showOperationSection = true;
            }else{
                $this->showOperationSection = false;
            }
        }

    }
    public function checkIfOrderPassedStage($orderId, $stage)
    {
        //stages = ['Admin', 'Client', 'Editor'];
        $orderRoute = AcceptedOrder::where('order_id', $orderId)
                                    ->where('from', $stage)
                                    ->first();
        if ($orderRoute) {
            $this->orderNextLevel =true;
            if (session()->has('LoggedClient')) {
                return "You Already took the order";
            } else {
                return "Order Already Submitted to the next Level";
            }


        } else {
            $this->orderNextLevel =false;
            return "No files uploaded";
        }

    }
    public function edit()
    {

        $this->emit('update_varView', 'edit');

    }
    public function dropFile($id, $folder, $filename)
    {

        Storage::delete('client_files/'.$folder . '/' .$filename);
        rmdir('storage/client_files/' .$folder );
        DB::beginTransaction();
        try {
            ClientFile::where('id', $id)->delete();
            DB::Commit();
            session()->flash('success', 'File Deleted Successfully.');
        } catch (\Exception $e) {
            DB::rollback();
            session()->flash('error',$e);
        }
    }
    public function store()
    {
        $this->emit('saved');
        Order::where('id', $this->orderDetails->id)
                ->update(['status' => 'Complete']);
        event( new OrderAnswerUploadEvent($this->orderDetails, $this->orderDetails->client_id));
        $this->reset('companyFile');
        session()->flash('success', 'Order Submited Successfully.');

    }

    public function activateRejectSection()
    {
        if ($this->reject_section) {
            $this->reject_section=false;
            $this->rejectBtn=true;
        }else{
            $this->reject_section=true;
            $this->rejectBtn=false;
            $this->accept_section =false;
            $this->acceptBtn = true;
        }
        // $this->reject_section=true;
    }
    public function activateAcceptSection()
    {
        if ( $this->accept_section) {
            $this->accept_section=false;
            $this->acceptBtn=true;
        }else{
            $this->accept_section=true;
            $this->acceptBtn=false;
            $this->reject_section = false;
            $this->rejectBtn = true;
        }

    }
    public function reject($value)
    {
        $order = Order::where('order_no', $value)->first();
        $this->orderPK = $order->id;
        if ($this->comment == '') {
            $this->comment = 'Rejected';
        }
        if (session()->get('LoggedClient')) {
            RejectedOrder::create([
                'order_id'=>$this->orderPK,
                'comment'=>$this->comment,
                'from'=>'Client',
                'from_id'=>$this->orderDetails->client_id,
            ]);
           // event( new OrderAnswerUploadEvent($this->orderDetails, $this->orderDetails->client_id));
        }
        if (auth()->user()!=null && auth()->user()->role == 'Editor') {
            DB::transaction(function () {
                try {
                    RejectedOrder::create([
                        'order_id'=>$this->orderPK,
                        'comment'=>$this->comment,
                        'from'=>auth()->user()->role,
                        'from_id'=>auth()->user()->id,
                    ]);
                    $orderStatus = OrderStatus::updateOrCreate(
                        ['order_id' =>  $this->orderPK],
                        ['current_position' => 'Writer']
                    );
                    WriterOrder::where('order_id', $this->orderPK)
                                ->update(['status'=>'Revision']);
                    $this->accept_section=false;
                    session()->flash('success', 'Order Rejected.');
                    //notify writer
                } catch (\Throwable $th) {
                    session()->flash('success', $th->getMessage());
                }
            });

        }elseif (auth()->user()!=null && auth()->user()->is_admin == 1 && auth()->user()->role == 'Admin') {
            DB::transaction(function () {
                try {
                    RejectedOrder::create([
                        'order_id'=>$this->orderPK,
                        'comment'=>$this->comment,
                        'from'=>auth()->user()->role,
                        'from_id'=>auth()->user()->id,
                    ]);
                    $orderStatus = OrderStatus::updateOrCreate(
                        ['order_id' =>  $this->orderPK],
                        ['current_position' => 'Writer']
                    );
                    WriterOrder::where('order_id', $this->orderPK)
                                ->update(['status'=>'Revision']);
                    $this->accept_section=false;
                    session()->flash('success', 'Order Rejected.');
                    //notify writer
                } catch (\Throwable $th) {
                    session()->flash('success', $th->getMessage());
                }
            });
        }
    }
    public function accept($value, CompanyService $companyService, ClientService $clientService, WriterService $writerService, AccountService $accountService)
    {
        $order = Order::where('order_no', $value)->first();
        if ($order->status == 'Complete') {
            $this->alert('error', 'Oops! You already accept your order', [
                'position' => 'top-end',
                'timer' =>  3000,
                'toast' =>  true,
                'text' =>  '',
                'confirmButtonText' =>  'Ok',
                'cancelButtonText' =>  'Cancel',
                'showCancelButton' =>  false,
                'showConfirmButton' =>  false,
            ]);
            return;
        }
        $this->orderPK = $order->id;
        if ($this->comment == '') {
            $this->comment = 'Accepted';
        }
        if (session()->has('LoggedClient')) {
            DB::beginTransaction();
            try {
                AcceptedOrder::create([
                    'order_id'=>$this->orderPK,
                    'comment'=>$this->comment,
                    'from'=>'Client',
                    'from_id'=>$this->orderDetails->client_id,
                ]);

                $writerOrder = WriterOrder::where('order_id', $this->orderPK)
                            ->update([
                                'status' => 'Completed'
                            ]);
                Order::where('id', $this->orderPK)
                     ->update([
                         'status'=>'Complete'
                     ]);
                /**customer accepts order;
                *🖊customer pays me for the service and that is an Expense(falls in Debit Account) to customer;
                *🖊Increase in expense i will debit customer account;
                *🖊I will credit my account because now debt --money that people owe me(asset=> falls in Debit Account)
                * has reduced or in other words mi Income(falls in Credit account) as increased and increase in income we credit;
                */

                /**In the same event
                 *🖊Writer's account will be credited. Since it's an income, or the debt outside has reduced per say
                 *🖊I will debit my account(Company Account) since I paying/purchasing writer's services. And it's an Expense
                */


                //ledger double entry ['Debit customer_account, Credit company_account]
                if (!$clientService->ledgerDebitEntry($this->orderDetails->client_id, $this->orderPK, $accountService)) {
                    Log::info('Client Service Error');
                    $this->alert('error', 'Oops! Something went wrong', [
                        'position' => 'top-end',
                        'timer' =>  3000,
                        'toast' =>  true,
                        'text' =>  '',
                        'confirmButtonText' =>  'Ok',
                        'cancelButtonText' =>  'Cancel',
                        'showCancelButton' =>  false,
                        'showConfirmButton' =>  false,
                    ]);
                    return;
                }
                if (!$companyService->ledgerCreditEntry($this->orderPK, $accountService)) {
                    Log::info('Company Service Error');
                    $this->alert('error', 'Oops! Something went wrong!', [
                        'position' => 'top-end',
                        'timer' =>  3000,
                        'toast' =>  true,
                        'text' =>  '',
                        'confirmButtonText' =>  'Ok',
                        'cancelButtonText' =>  'Cancel',
                        'showCancelButton' =>  false,
                        'showConfirmButton' =>  false,
                    ]);
                    return;
                }

                /**
                 * check if order was done by writer or management
                */
                if ($writerOrder) {
                    //ledger double entry ['Credit writer_account, Debit company_account]
                    if (!$companyService->ledgerDebitEntry($this->orderPK, $accountService)) {
                        Log::info('Company with writer Service Error');
                        $this->alert('error', 'Oops! Something went wrong!', [
                            'position' => 'top-end',
                            'timer' =>  3000,
                            'toast' =>  true,
                            'text' =>  '',
                            'confirmButtonText' =>  'Ok',
                            'cancelButtonText' =>  'Cancel',
                            'showCancelButton' =>  false,
                            'showConfirmButton' =>  false,
                        ]);
                        return;
                    }
                    if (!$writerService->ledgerCreditEntry($writerOrder, $accountService)) {
                        Log::info('Writer Service Error');
                        $this->alert('error', 'Oops! Something went wrong!', [
                            'position' => 'top-end',
                            'timer' =>  3000,
                            'toast' =>  true,
                            'text' =>  '',
                            'confirmButtonText' =>  'Ok',
                            'cancelButtonText' =>  'Cancel',
                            'showCancelButton' =>  false,
                            'showConfirmButton' =>  false,
                        ]);
                        return;

                    }
                    // $companyService->ledgerDebitEntry($this->orderPK, $accountService);
                    // $writerService->ledgerCreditEntry($writerOrder, $accountService);
                }

                $this->accept_section=false;
                DB::commit();
                session()->flash('success', 'Order Accepted Successfully.');
                $this->alert('success', 'Order Accepted Successfully', [
                    'position' => 'top-end',
                    'timer' =>  3000,
                    'toast' =>  true,
                    'text' =>  '',
                    'confirmButtonText' =>  'Ok',
                    'cancelButtonText' =>  'Cancel',
                    'showCancelButton' =>  false,
                    'showConfirmButton' =>  false,
                ]);
                // event( new OrderAnswerUploadEvent($this->orderDetails, $this->orderDetails->client_id));
            } catch (\Throwable $th) {
                Log::error($th);
                DB::rollBack();
                session()->flash('success', $th->getMessage());
                $this->alert('error', $th->getMessage(), [
                    'position' => 'top-end',
                    'timer' =>  3000,
                    'toast' =>  true,
                    'text' =>  '',
                    'confirmButtonText' =>  'Ok',
                    'cancelButtonText' =>  'Cancel',
                    'showCancelButton' =>  false,
                    'showConfirmButton' =>  false,
                ]);
            }


        }

   }
}