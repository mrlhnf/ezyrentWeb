<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Firestore;
use Kreait\Laravel\Firebase\Facades\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

class HouseController extends Controller
{
    public function index()
    {
        $firestore = app('firebase.firestore');
        $database = $firestore->database();
        $collection = $database->collection('rumah');
        $documents = $collection->documents();

        return view('houses.index', ['documents' => $documents]);
    }

    public function show($id)
    {
        $firestore = app('firebase.firestore');
        $database = $firestore->database();
        $collection = $database->collection('rumah');
        $documents = $collection->document($id)->snapshot();
        $pic = $documents['images'];

        $factory = (new Factory)->withServiceAccount('C:\laragon\www\erumah\firebase_credentials.json');
        $storage = $factory->createStorage();

        $bucket = $storage->getBucket();

        $imageUrls = [];
        foreach ($pic as $path) {
            $imageUrls[] = $bucket->object($path)->signedUrl(now()->addMinutes(5));
        }

        return view('houses.show', ['documents' => $documents, 'imageUrls' => $imageUrls]);
    }

    public function approve($id)
    {
        $firestore = app('firebase.firestore');
        $database = $firestore->database();
        $collection = $database->collection('rumah');
        $document = $collection->document($id);
        $data = $document->snapshot()->data();
        $data['status'] = true;
        $document->set($data);

        return redirect()->route('home')->with('success','House request is approved!');
    }

    public function reject($id)
    {
        $firestore = app('firebase.firestore');
        $database = $firestore->database();
        $collection = $database->collection('rumah');
        $document = $collection->document($id);
        $document->delete();

        return redirect()->route('home')->with('success','House request is rejected!');
    }

    public function showMap($id)
    {
        $firestore = app('firebase.firestore');
        $database = $firestore->database();
        $collection = $database->collection('rumah');
        $document = $collection->document($id)->snapshot();
        $location = $document['location'];

        return view('houses.map', ['location' => $location]);
    }
}
