<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Firestore;
use Kreait\Laravel\Firebase\Facades\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

class TransactionController extends Controller
{
    public function approve($id)
    {
        $firestore = app('firebase.firestore');
        $database = $firestore->database();

        $collection = $database->collection('transaction');
        $document = $collection->document($id);
        $data = $document->snapshot()->data();
        $data['status'] = true;
        $document->set($data);

        $collection2 = $database->collection('users');
        $document2 = $collection2->document($data['receiver']);
        $data2 = $document2->snapshot()->data();
        $data2['accBal']+= $data['amount'];
        $document2->set($data2);

        return redirect()->route('home')->with('success','Transaction is approved.');
    }

    public function reject($id)
    {
        $firestore = app('firebase.firestore');
        $database = $firestore->database();
        $collection = $database->collection('transaction');
        $document = $collection->document($id);
        $document->delete();

       return redirect()->route('home')->with('success','Transaction is rejected.');
    }

    public function receipt($id)
    {
        $firestore = app('firebase.firestore');
        $database = $firestore->database();
        $collection = $database->collection('transaction');
        $documents = $collection->document($id)->snapshot();
        $pic = $documents['proof'];

        $factory = (new Factory)->withServiceAccount('C:\laragon\www\erumah\firebase_credentials.json');
        $storage = $factory->createStorage();

        $bucket = $storage->getBucket();

        $imageUrls = [];
        foreach ($pic as $path) {
            $imageUrls[] = $bucket->object($path)->signedUrl(now()->addMinutes(5));
        }

        return view('receipt', ['imageUrls' => $imageUrls]);
    }
}
