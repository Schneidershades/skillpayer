<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\WalletTransaction;

class TransactionController extends Controller
{
    public function index()
    {
    	$transactions = auth()->user()->walletTransactions()->latest()->get();

        return view('users.history.index', [
            'history' => $transactions
        ]);
    }
}
