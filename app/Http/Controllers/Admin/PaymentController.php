<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Clearance;
use App\Models\Notification;
use App\Models\Payment;
use App\Notifications\PaymentNotification;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notification as NotificationsNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Notification as FacadesNotification;

class PaymentController extends Controller
{
    function __construct()
    {
        date_default_timezone_set("Asia/Dhaka");
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    function getCurrentApproverClearance($id){
        $item = Clearance::find($id);
        $item->update([
            'current_approver_id' => Auth::guard('admin')->id()
        ]);
        return response()->json(['status' => true]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'type' => 'required',
            'due' => 'required',
        ]);
        $data['user_id'] = $request->user_id;
        $data['status'] = 0;
        $data['admin_id'] = Auth::guard('admin')->id();
        $payment = Payment::create($data);

        if($request->message){
            $notification = [
                'for' => $request->for,
                'message' => $request->message,
                'from' => $request->from,
                'type' => $request->type . ' (Due: '. $request->due . ' '. $request->currency . ')' ?? 'Taka)'
            ];
        }else{
            $notification = [
                'for' =>  $request->for,
                'message' => 'You Have To Payment',
                'from' => $request->from,
                'type' => $request->type . ' (Due: '. $request->due . ' '. $request->currency . ')' ?? 'Taka)'
            ];
        }
        FacadesNotification::send($payment->user, new PaymentNotification($notification));
        $message = "Successfully Create Payment for ".$payment->user->name;
        return response()->json(['status' => true, 'msg' => $message]);
    }
    function noDue(Request $request){
        if($request->has('no_due')){
            $data['user_id'] = $request->user_id;
            $data['status'] = 1;
            $data['type'] = $request->type;
            $data['due'] = 0;
            $data['admin_id'] = $request->admin_id;
            $payment = Payment::create($data);
            $message = "Now you can Approve ".$request->type. ' ' .$payment->user->name;
            return response()->json(['status' => true, 'msg' => $message]);
        }
        return response()->json(['status' => false, 'msg' => 'Please Approve Due..']);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    function status(Request $request, $id){
        $user = Auth::guard('admin')->id();
        $payment = Payment::find($id);
        if($user && $payment){
            if($payment->admin_id == $user){
                if($payment->status == 0){
                    $payment->update([
                        'status' => 1
                    ]);
                    $notification = [
                        'for' =>  $request->for,
                        'message' => 'You Have Approved Payment',
                        'from' => $request->from,
                        'type' => 'Payment'
                    ];
                    FacadesNotification::send($payment->user, new PaymentNotification($notification));
                    return response()->json(['status' => true, 'msg' => 'Payment Approved Successful']);
                }else{
                    return response()->json(['status' => false, 'msg' => 'Already Approved....']);
                }
            }
        }
        return response()->json(['status' => false, 'msg' => 'Something is wrong !!!']);
    }
}
