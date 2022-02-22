<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use GuzzleHttp\Psr7\Response;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = Transaction::all();

        return view('transactions', ['transactions' => $transactions]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transaction = Transaction::find($id);
        
        return response()->json(['transaction' => $transaction]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transaction = Transaction::find($id);
        $transaction->delete();
        $tableName = $transaction->gettable();

        DB::statement("ALTER TABLE $tableName AUTO_INCREMENT = ". (count(Transaction::all())+1) . ";");

        return redirect('/transactions');
    }
}
