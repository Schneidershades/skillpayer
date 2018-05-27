<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Withdrawal;
use Session;

class WithdrawalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $withdrawals = Withdrawal::where('status', 'Pending')->where('finished', true)->get();
        return view('admin.users.withdrawal')->with('withdrawals', $withdrawals);
    }

    public function clear()
    {
        $withdrawals = Withdrawal::where('finished', true)->where('status', 'pending')->get();

        foreach ($withdrawals as $withdrawal) {
            $withdrawalSave = Withdrawal::where('id', $withdrawal['id'])->where('finished', true)->where('status', 'pending')->first();
            $withdrawalSave->status = 'Successful';
            $withdrawalSave->save();
        }
       
        Session::flash('success', 'All Withdrawal Transaction cleared');
        return redirect()->back();
    }

}
