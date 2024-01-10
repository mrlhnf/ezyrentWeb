<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Firestore;
use Kreait\Laravel\Firebase\Facades\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

class StudentController extends Controller
{
    public function index()
    {
        $firestore = app('firebase.firestore');
        $database = $firestore->database();
        $collection = $database->collection('users');
        $documents = $collection->documents();

        return view('students.index', ['documents' => $documents]);
    }

    public function show($id)
    {
        $firestore = app('firebase.firestore');
        $database = $firestore->database();
        $collection = $database->collection('users');
        $documents = $collection->document($id)->snapshot();

        return view('students.show', ['documents' => $documents]);
    }

    public function rumahku($id)
    {
        $firestore = app('firebase.firestore');
        $database = $firestore->database();
        $collection = $database->collection('rumah');
        $query = $collection->where('tenant', 'array-contains', $id);
        $dokumen = $query->documents();

        $foundDocument = null;
        foreach ($dokumen as $document) {
            $foundDocument = $document;
            break;
        }

        if ($foundDocument === null) {
            return response('Not found', 404);
        }

        $documentId = $foundDocument->id();
        $documents = $collection->document($documentId)->snapshot();
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
}
