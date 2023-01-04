@extends('template')

@section('title', 'Home')

@section('styles')
    <style>
        .home-hero, .home-about{
            background: palegoldenrod;
        }
        .home-hero{
            padding: 15rem 5rem;
            background-repeat: no-repeat;
            background-size: cover;
            background-image: url({{url('assets/images/RecyconBackground.jpg')}});
        }
        .home-hero h1{
            font-size: 5rem;
            font-weight: bolder;
            text-shadow: 0.3rem 0.5rem #000000;
        }
        .home-about{
            padding: 5rem;
        }
        .home-about h1{
            font-weight: bolder;
            margin-bottom: 2rem;
        }
        .home-about p{
            border: 0.3rem dashed #000000;
            font-size: 1.5rem;
        }
    </style>
@endsection

@section('content')
    <div class="home-hero">
        <div class="container-fluid">
            <h1 class="text-center text-warning">RECYCON SHOP</h1>
        </div>
    </div>

    <div class="home-about">
        <div class="container-fluid">
            <h1 class="text-center text-success">ABOUT US</h1>
            <p class="text-center p-5">Recycon is a shop for buying recycled things and second-hand things.</p>
        </div>
    </div>
@endsection
