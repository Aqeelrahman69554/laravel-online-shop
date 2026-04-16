<!DOCTYPE html>
<html lang="en">

{{-- include head --}}
@include('admin.layouts._head')

<body>
    <div class="wrapper">
        {{-- include sidebar --}}
        @include('admin.layouts._sidebar')

        <div class="main-panel">
            @include('admin.layouts._header')

            <div class="container">
                @yield('content')
            </div>

            {{-- include footer --}}
            @include('admin.layouts._footer')
        </div>
    </div>


    {{-- include script --}}
    @include('admin.layouts._script')
</body>

</html>
