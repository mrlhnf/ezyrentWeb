<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $firestore = app('firebase.firestore');
        $database = $firestore->database();
        
        $rumahCollection = $database->collection('rumah');
        $rumah = $rumahCollection->documents();

        $transactionCollection = $database->collection('transaction');
        $transaksi = $transactionCollection->documents();

        return view('dashboard', [
            'documents1' => $rumah,
            'documents2' => $transaksi
        ]);
    }
}
