@extends('shop.layouts.master')

@section('content')
    @include('shop.section.cart')
    @if (session('error'))
        <div class="container mt-5 pt-5">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fa fa-exclamation-circle me-2"></i>{{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif
@endsection
