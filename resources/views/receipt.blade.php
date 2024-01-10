@extends('layouts.app')

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
@endsection