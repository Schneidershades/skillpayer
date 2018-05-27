<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\WalletFund;

class WalletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.wallet.index')->with('transactions', auth()->user()->walletTransactions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected function createAndReturnSkeletonfile()
    {
        return auth()->user()->walletFund()->create([
            'status' => 'pending',
            'finished' => 0,
            'amount' => 0,
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(WalletFund $walletfund)
    {
        if(!$walletfund->exists){
            $walletfund = $this->createAndReturnSkeletonfile();

            return view('users.wallet.create')
            ->with('wallet', $walletfund);
        }
        return view('users.wallet.create')
            ->with('wallet', $walletfund);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
