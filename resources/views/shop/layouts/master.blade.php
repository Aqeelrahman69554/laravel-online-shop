<!DOCTYPE html>
<html lang="en">

@include('shop.components._head')

<body>
    {{-- NAVBAR INCLUDE --}}
    @include('shop.layouts._navbar')
    
    {{-- HOME INCLUDE --}}
    @include('shop.pages.home')

    {{-- SERVICE INCLUDE --}}
    @include('shop.pages.service')

    {{-- BOOK INCLUDE --}}
    @include('shop.pages.book')

    {{-- BANNER INCLUDE --}}
    @include('shop.pages.banner')

    {{-- BESTSELLER INCLUDE --}}
    @include('shop.pages.bestseller')

    {{-- SERVICE2 INCLUDE --}}
    @include('shop.pages.service2')

    {{-- TESTIMONI INCLUDE --}}
    @include('shop.pages.testimoni')

    {{-- FOOTER INCLUDE --}}
    @include('shop.layouts._footer')



    <!-- Back to Top -->
    <a href="#" class="btn btn-primary border-3 border-primary rounded-circle back-to-top"><i
            class="fa fa-arrow-up"></i></a>


    @include('shop.components._script')
</body>

</html>
