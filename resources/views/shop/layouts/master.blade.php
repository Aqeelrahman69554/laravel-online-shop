<!DOCTYPE html>
<html lang="en">

@include('shop.components._head')

<body>
    {{-- NAVBAR INCLUDE --}}
    @include('shop.layouts._navbar')

    @if (session('success'))
        <div class="container mt-5 pt-5">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif

    @yield('content')



    {{-- FOOTER INCLUDE --}}
    @include('shop.layouts._footer')



    <!-- Back to Top -->
    <a href="#" class="btn btn-primary border-3 border-primary rounded-circle back-to-top"><i
            class="fa fa-arrow-up"></i></a>


    @include('shop.components._script')
</body>

</html>
