@extends('layouts.app')

@section('content')

<style>
    .gallery-section {
        padding: 40px 0;
        text-align: center;
    }

    .gallery-title {
        font-size: 26px;
        font-weight: 600;
        margin-bottom: 30px;
        color: #2c5d8a;
    }

    .gallery-grid {
        display: grid;
        grid-template-columns: repeat(5, 1fr);
        gap: 20px;
    }

    .gallery-card {
        background: #fff;
        padding: 8px;
        border-radius: 6px;
        box-shadow: 0 2px 6px rgba(0,0,0,0.2);
        transition: 0.3s;
    }

    .gallery-card:hover {
        transform: translateY(-5px);
    }

    .gallery-card img {
        width: 100%;
        height: 120px;
        object-fit: cover;
        border-radius: 4px;
    }

    .gallery-caption {
        font-size: 14px;
        margin-top: 8px;
        color: #2c5d8a;
        font-weight: 500;
    }

    /* ICON SECTION */
    .icon-section {
        margin-top: 50px;
        padding: 40px 0;
        background: linear-gradient(to right, #f4f6f9, #e6ebf2);
        text-align: center;
    }

    .icon-container {
        display: flex;
        justify-content: space-around;
        align-items: center;
        flex-wrap: wrap;
    }

    .icon-box {
        text-align: center;
    }

    .circle-icon {
        width: 120px;
        height: 120px;
        background: #2c5d8a;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        margin-bottom: 10px;
    }

    .circle-icon i {
        font-size: 40px;
        color: #fff;
    }

    .icon-text {
        font-weight: 600;
        color: #2c5d8a;
    }

    @media(max-width: 992px){
        .gallery-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }
</style>

<div class="container gallery-section">
    <div class="gallery-title">
        Photo Albums (Government Postgraduate College, Mansehra)
    </div>

    <div class="gallery-grid">

        {{-- Repeat this block --}}
        @for($i = 1; $i <= 10; $i++)
            <div class="gallery-card">
                <img src="{{ asset('images/sample.jpg') }}" alt="gallery">
                <div class="gallery-caption">
                    Sample Album Title {{ $i }}
                </div>
            </div>
        @endfor

    </div>
</div>

{{-- ICON SECTION --}}
<div class="icon-section">
    <div class="container icon-container">

        <div class="icon-box">
            <div class="circle-icon">
                <i class="fas fa-history"></i>
            </div>
            <div class="icon-text">ABOUT UOH</div>
        </div>

        <div class="icon-box">
            <div class="circle-icon">
                <i class="fas fa-eye"></i>
            </div>
            <div class="icon-text">VISION & MISSION</div>
        </div>

        <div class="icon-box">
            <div class="circle-icon">
                <i class="fas fa-certificate"></i>
            </div>
            <div class="icon-text">SOCIAL WORK</div>
        </div>

        <div class="icon-box">
            <div class="circle-icon">
                <i class="fas fa-bus"></i>
            </div>
            <div class="icon-text">UOH TRANSPORT</div>
        </div>

        <div class="icon-box">
            <div class="circle-icon">
                <i class="fas fa-building"></i>
            </div>
            <div class="icon-text">UOH HOSTELS</div>
        </div>

    </div>
</div>

@endsection