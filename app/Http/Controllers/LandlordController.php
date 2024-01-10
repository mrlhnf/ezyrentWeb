<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Firestore;
use Kreait\Laravel\Firebase\Facades\Firebase;

class LandlordController extends Controller
{
    public function index()
    {
        $firestore = app('firebase.firestore');
        $database = $firestore->database();
        $collection = $database->collection('users');
        $documents = $collection->documents();

        return view('landlords.index', ['documents' => $documents]);
    }

    public function show($id)
    {
        $firestore = app('firebase.firestore');
        $database = $firestore->database();
        $collection = $database->collection('users');
        $documents = $collection->document($id)->snapshot();

        return view('landlords.show', ['documents' => $documents]);
    }
}
