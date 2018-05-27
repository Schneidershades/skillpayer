<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Package;
use App\User;
use App\PackageTransaction;
use App\ReferralBonus;
use App\Referral;
use App\WalletTransaction;
use App\Wallet;
use Auth;
use Session;

class BuyPackageController extends Controller
{
    public function index()
    {
        $transactions = auth()->user()->packageTransactions()->latest()->finished()->get();

        return view('users.buyPackage.index', [
            'transactions' => $transactions
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected function createAndReturnSkeletonfile()
    {
        return auth()->user()->packageTransactions()->create([
            'title' => 'Package Purchase',
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
    public function create(PackageTransaction $transaction)
    {
        if(!$transaction->exists){
            $transaction = $this->createAndReturnSkeletonfile();

            return redirect()->route('account.buy.package.create', $transaction);
        }
        return view('users.buyPackage.create')
            ->with('transaction', $transaction)
            ->with('packages', Package::where('name', '!=', 'DREAM')->get());
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, PackageTransaction $transaction)
    {

        $userLoggedIn = User::where('id', '=' ,Auth::id())->first();

        $fetchReferralBonus = ReferralBonus::find(1);

        if($userLoggedIn === NULL){
            Session::flash('error', 'Unauthorized for this package');
            return redirect()->back();
        }

        $picked_package = NULL;
        // find the user wallet
        $picked_package = Package::where('id', '=' ,$request->package_id)->first();



        if($picked_package === NULL){
            Session::flash('error', 'Package unavailable at the moment. Please Try again later');
            return redirect()->back();
        }

        // find the user wallet
        $debit_coin = Wallet::where('user_id', '=' ,Auth()->user()->id)->first();

        // check if user has money
        if($debit_coin->skill_coin_balance < $picked_package->amount){
            Session::flash('error', 'Insufficent Funds to migrate package. please top your wallet.');
            return redirect()->back();
        }else{
            $percentage_deduction = $picked_package->percentage;
            // $bonus = str_replace('%', '', $percentage_deduction) / 100;

            $bonus = $percentage_deduction / 100;

            // deduct what you are sending
            $acutalAmountToDeduct = $picked_package->amount * $bonus;

            // subtract deducted amount  amount from the initial amount for the package
            $amount_paid  =  $picked_package->amount - $acutalAmountToDeduct;

            $debit_coin->skill_coin_balance -= $amount_paid;

            // credit the user for buying package
            $debit_coin->pv_balance += $picked_package->pv_bonus;
            // save all
            
            $debit_coin->save();
        }
        // / store in wallet transaction receipt that the person is credited
        $walletTransactionPackagePvCredit = new WalletTransaction;
        $walletTransactionPackagePvCredit->title = 'Package Pv Bonus';
        $walletTransactionPackagePvCredit->identifier = $transaction->identifier;
        $walletTransactionPackagePvCredit->user_id = Auth()->user()->id;
        $walletTransactionPackagePvCredit->details = 'Successful package purchase' ;
        $walletTransactionPackagePvCredit->amount = $picked_package->pv_bonus;
        $walletTransactionPackagePvCredit->amount_paid = $picked_package->pv_bonus;
        $walletTransactionPackagePvCredit->category = 'Credit';
        $walletTransactionPackagePvCredit->remarks = 'success';
        $walletTransactionPackagePvCredit->transaction_type = 'Package Pv Bonus';
        $walletTransactionPackagePvCredit->balance = $debit_coin->pv_balance;

        $walletTransactionPackagePvCredit->save();

        $transaction->details = 'Package for '.$picked_package->name;
        $transaction->user_id = Auth()->user()->id;
        $transaction->package_id = $request->package_id;
        $transaction->amount = $picked_package->amount;
        $transaction->category = $picked_package->name;
        $transaction->status = 'fulfilled';
        $transaction->finished = true;

        $walletTransactionDebit = new WalletTransaction;
        $walletTransactionDebit->title = 'Package Purchase';
        $walletTransactionDebit->identifier = $transaction->identifier;
        $walletTransactionDebit->user_id = Auth()->user()->id;
        $walletTransactionDebit->details = 'Package Purchase '  . $picked_package->name;
        $walletTransactionDebit->amount = $picked_package->amount;
        $walletTransactionDebit->amount_paid = $amount_paid;
        $walletTransactionDebit->category = 'Debit';
        $walletTransactionDebit->remarks = 'success';
        $walletTransactionDebit->transaction_type = 'Package Upgrade';
        $walletTransactionDebit->balance =$debit_coin->skill_coin_balance;

        


        // now that the debiting is in the process now change the package of the user to the one that he selected
        $userLoggedIn->package_id = $picked_package->id;

        $levelOne = NULL;
        $levelTwo = NULL;
        $levelThree = NULL;
        $levelFour = NULL;
        $levelFive = NULL;
        $levelSix = NULL;
        $levelSeven = NULL;
        $levelEight = NULL;
        $levelNine = NULL;
        $levelTen = NULL;

        $levelOne = $this->checkReferralAndGiveCommission($picked_package->amount, Auth()->user()->id, Auth()->user()->id, $fetchReferralBonus->level_one_bonus, $transaction->identifier, $picked_package->pv_bonus, $fetchReferralBonus->level_one_pv_bonus);

        if($levelOne != null){
            $levelTwo = $this->checkReferralAndGiveCommission($picked_package->amount, $levelOne, Auth()->user()->id, $fetchReferralBonus->level_two_bonus, $transaction->identifier, $picked_package->pv_bonus, $fetchReferralBonus->level_two_pv_bonus);
        }


        
        if($levelTwo != null){
            $levelThree = $this->checkReferralAndGiveCommission($picked_package->amount, $levelTwo, Auth()->user()->id, $fetchReferralBonus->level_three_bonus, $transaction->identifier, $picked_package->pv_bonus, $fetchReferralBonus->level_three_pv_bonus);
        }
        
        if($levelThree != null){
             $levelFour = $this->checkReferralAndGiveCommission($picked_package->amount, $levelThree, Auth()->user()->id, $fetchReferralBonus->level_four_bonus, $transaction->identifier, $picked_package->pv_bonus, $fetchReferralBonus->level_four_pv_bonus);
        }

        if($levelFour != null){
            $levelFive = $this->checkReferralAndGiveCommission($picked_package->amount, $levelFour, Auth()->user()->id, $fetchReferralBonus->level_five_bonus, $transaction->identifier, $picked_package->pv_bonus, $fetchReferralBonus->level_five_pv_bonus);
        }

        if($levelFive != null){
            $levelSix = $this->checkReferralAndGiveCommission($picked_package->amount, $levelFive, Auth()->user()->id, $fetchReferralBonus->level_six_bonus, $transaction->identifier, $picked_package->pv_bonus, $fetchReferralBonus->level_six_pv_bonus);
        }

        if($levelSix != null){
            $levelSeven = $this->checkReferralAndGiveCommission($picked_package->amount, $levelSix, Auth()->user()->id, $fetchReferralBonus->level_seven_bonus, $transaction->identifier, $picked_package->pv_bonus, $fetchReferralBonus->level_seven_pv_bonus);
        }

        if($levelSeven != null){
            $levelEight = $this->checkReferralAndGiveCommission($picked_package->amount, $levelSeven, Auth()->user()->id, $fetchReferralBonus->level_eight_bonus, $transaction->identifier, $picked_package->pv_bonus, $fetchReferralBonus->level_eight_pv_bonus);
        }

        if($levelEight != null){
            $levelNine = $this->checkReferralAndGiveCommission($picked_package->amount, $levelEight, Auth()->user()->id, $fetchReferralBonus->level_nine_bonus, $transaction->identifier, $picked_package->pv_bonus, $fetchReferralBonus->level_nine_pv_bonus);
        }

        if($levelNine != null){
            $levelTen = $this->checkReferralAndGiveCommission($picked_package->amount, $levelNine, Auth()->user()->id, $fetchReferralBonus->level_ten_bonus, $transaction->identifier, $picked_package->pv_bonus, $fetchReferralBonus->level_ten_pv_bonus);
        }

        $walletTransactionDebit->save();
        $transaction->save();
        $userLoggedIn->save();
            
        

        Session::flash('success', 'Your package purchase was successful and referrals have recieved their commission');
        return redirect()->back();
    }


    public function checkReferralAndGiveCommission($amount, $fundingUserId, $fundingUserName, $referralBonusFetched, $receiptReferral, $pv_bonus_amount, $pv_bonus_percentage)
    {
        $referralUser = null;
        // find users referral 
        $referralUser = Referral::where('user_id', $fundingUserId)->first();
        
        // if there is a referal
        if($referralUser != null){

            // check the referral wallet
            $levelReferralWallet = Wallet::where('user_id', $referralUser->referral_id)->first();

            // if the referral wallet is available
            if($levelReferralWallet != null){

                // fetch his percentage and divide the percentage bonus by 100
                $levelReferralPercentage = $referralBonusFetched / 100;

                // fetch his pv percentage and divide the percentage bonus by 100
                $levelReferralPercentagePv = $pv_bonus_percentage / 100;

                // multiply to the initial amount
                $levelBonusAmount = $amount * $levelReferralPercentage;

                // multiply by the pv initial amount
                $levelPvBonusAmount = $pv_bonus_amount * $levelReferralPercentagePv;

                // add to wallet
                $balanceSKC = $levelReferralWallet->skill_coin_balance += $levelBonusAmount;

                $balancePV = $levelReferralWallet->pv_balance += $levelPvBonusAmount;


                // save 
                $levelReferralWallet->save();

                // store in wallet transaction receipt that the person is credited
                $walletTransactionReferralCredit = new WalletTransaction;
                $walletTransactionReferralCredit->title = 'Referral SKC Bonus Transfer';
                $walletTransactionReferralCredit->identifier = $receiptReferral;
                $walletTransactionReferralCredit->user_id = $referralUser->referral_id;
                $walletTransactionReferralCredit->details = 'Referral Trait SKC Bonus Transfer From '  . $referralUser->user->email .' with a parent funding bonus from '. Auth()->user()->email ;
                $walletTransactionReferralCredit->amount = $amount;
                $walletTransactionReferralCredit->amount_paid = $levelBonusAmount;
                $walletTransactionReferralCredit->category = 'Credit';
                $walletTransactionReferralCredit->remarks = 'success';
                $walletTransactionReferralCredit->transaction_type = 'Referral SKC Bonus transfer';
                $walletTransactionReferralCredit->balance = $balanceSKC;

                $walletTransactionReferralCredit->save();

                // store in wallet transaction receipt that the person is credited
                $walletTransactionReferralPvCredit = new WalletTransaction;
                $walletTransactionReferralPvCredit->title = 'Referral PV Bonus Transfer';
                $walletTransactionReferralPvCredit->identifier = $receiptReferral;
                $walletTransactionReferralPvCredit->user_id = $referralUser->referral_id;
                $walletTransactionReferralPvCredit->details = 'Referral Trait PV Bonus Transfer From '  . $referralUser->user->email .' with a parent funding bonus from '. Auth()->user()->email ;
                $walletTransactionReferralPvCredit->amount = $pv_bonus_amount;
                $walletTransactionReferralPvCredit->amount_paid = $levelPvBonusAmount;
                $walletTransactionReferralPvCredit->category = 'Credit';
                $walletTransactionReferralPvCredit->remarks = 'success';
                $walletTransactionReferralPvCredit->transaction_type = 'Referral PV Bonus transfer';
                $walletTransactionReferralPvCredit->balance = $balancePV;

                $walletTransactionReferralPvCredit->save();

            }
        }else{

            return null;
        }
            
        return $referralUser->referral_id;
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($transaction)
    {
        $transactions = WalletTransaction::where('identifier', $transaction)->get();

        return view('users.buyPackage.show')
            ->with('transactions', $transactions);
    }

}
