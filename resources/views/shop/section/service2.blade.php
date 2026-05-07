<!-- Fact Start -->
<div class="container-fluid py-5">
    <div class="container">

        <div class="bg-light p-5 rounded">

            <div class="row g-4 justify-content-center">

                @foreach ($statistics as $item)
                    <div class="col-md-6 col-lg-6 col-xl-3">

                        <div class="counter bg-white rounded p-5 text-center h-100">

                            <i class="{{ $item->icon }} text-secondary mb-3" style="font-size: 45px;">
                            </i>

                            <h4 class="mb-3">
                                {{ $item->title }}
                            </h4>

                            <h1 class="text-primary fw-bold">
                                {{ $item->value }}
                            </h1>

                        </div>

                    </div>
                @endforeach

            </div>

        </div>

    </div>
</div>
<!-- Fact End -->
