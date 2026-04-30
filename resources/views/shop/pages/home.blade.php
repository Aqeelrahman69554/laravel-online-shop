@extends('shop.layouts.master')

@section('content')
    {{-- HOME INCLUDE --}}
    @include('shop.section.home')

    {{-- SERVICE INCLUDE --}}
    @include('shop.section.service')

    {{-- BOOK INCLUDE --}}
    @include('shop.section.book')

    {{-- BANNER INCLUDE --}}
    @include('shop.section.banner')

    {{-- BESTSELLER INCLUDE --}}
    @include('shop.section.bestseller')

    {{-- SERVICE2 INCLUDE --}}
    @include('shop.section.service2')

    {{-- TESTIMONI INCLUDE --}}
    @include('shop.section.testimoni')
@endsection
