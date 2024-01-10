@extends('layouts.app', ['page' => __('House'), 'pageSlug' => 'rumah'])

@section('content')
    <div class="container" style="max-width: 1200px; background-color: black; padding-left: 20px; padding-right: 20px;">
        <div class="row">
            <div class="col-md-12">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        @foreach ($imageUrls as $index => $imageUrl)
                            <li data-target="#carouselExampleIndicators" data-slide-to="{{ $index }}" @if ($index === 0) class="active" @endif></li>
                        @endforeach
                    </ol>
                    <div class="carousel-inner">
                        @foreach ($imageUrls as $index => $imageUrl)
                            <div class="carousel-item @if ($index === 0) active @endif">
                                <img src="{{ $imageUrl }}" alt="Image" class="d-block w-100" style="max-height: 400px; object-fit: contain;">
                            </div>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">House Details</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <h6 class="card-subtitle" style="display: inline;">Name:</h6>
                                    <p class="card-text" style="display: inline;">{{ $document['name']}}</p>
                                </div>
                                <div class="col-md-4">
                                    <h6 class="card-subtitle" style="display: inline;">Price:</h6>
                                    <p class="card-text" style="display: inline;">RM{{ $document['price']}}</p>
                                </div>
                                <div class="col-md-4">
                                    <h6 class="card-subtitle" style="display: inline;">District:</h6>
                                    <p class="card-text" style="display: inline;">{{ $document['district'] }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <h6 class="card-subtitle" style="display: inline;">Type:</h6>
                                    <p class="card-text" style="display: inline;">{{ $document['type'] }}</p>
                                </div>
                                <div class="col-md-4">
                                    <h6 class="card-subtitle" style="display: inline;">Maximum Person per House:</h6>
                                    <p class="card-text" style="display: inline;">{{ $document['max'] }}</p>
                                </div>
                                <div class="col-md-4">
                                    <h6 class="card-subtitle" style="display: inline;">Quota:</h6>
                                    <p class="card-text" style="display: inline;">{{ $document['quota'] }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <h6 class="card-subtitle" style="display: inline;">Preferred Gender:</h6>
                                    <p class="card-text" style="display: inline;">{{ $document['preffered gender'] }}</p>
                                </div>
                                <div class="col-md-4">
                                    <h6 class="card-subtitle" style="display: inline;">Owner:</h6>
                                    <a href="{{ route('landlord.show', ['id' => $document['owner']]) }}" style="display: inline;">
                                        <i class="fas fa-user-circle"></i>
                                    </a>
                                </div>
                                <div class="col-md-4">
                                    <h6 class="card-subtitle" style="display: inline;">Location:</h6>
                                    <a href="{{ route('map.show', ['id' => $document->id()]) }}" style="display: inline;">
                                        <i class="fas fa-map-marker"></i>
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
