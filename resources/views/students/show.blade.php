@extends('layouts.app', ['page' => __('Landlord'), 'pageSlug' => 'tuanrumah'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Student Details</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h6 class="card-subtitle" style="display: inline;">Name:</h6>
                                    <p class="card-text" style="display: inline;">{{ $documents['name']['FirstName'] }} {{ $documents['name']['LastName'] }}</p>
                                </div>
                                <div class="col-md-6">
                                    <h6 class="card-subtitle" style="display: inline;">Email:</h6>
                                    <p class="card-text" style="display: inline;">{{ $documents['email'] }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <h6 class="card-subtitle" style="display: inline;">Phone Number:</h6>
                                    <p class="card-text" style="display: inline;">{{ $documents['phoneNumber'] }}</p>
                                </div>
                                <div class="col-md-6">
                                    <h6 class="card-subtitle" style="display: inline;">Gender:</h6>
                                    <p class="card-text" style="display: inline;">{{ $documents['gender'] }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <h6 class="card-subtitle" style="display: inline;">Student ID:</h6>
                                    <p class="card-text" style="display: inline;">{{ $documents['Student ID'] }}</p>
                                </div>
                                <div class="col-md-6">
                                    <h6 class="card-subtitle" style="display: inline;">House Rented:</h6>
                                    <a href="{{ route('myhouse.show', ['id' => $documents->id()]) }}" style="display: inline;">
                                        <i class="fas fa-home"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
