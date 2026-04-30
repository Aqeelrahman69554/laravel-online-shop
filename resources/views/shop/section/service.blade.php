<!-- Featurs Section Start -->
<div class="container-fluid featurs py-5">
    <div class="container py-5">
        <div class="row g-4">
            @foreach ($services as $service)
                <div class="col-md-6 col-lg-3">
                    <div class="featurs-item text-center rounded bg-light p-4">
                        <div class="featurs-icon btn-square rounded-circle bg-secondary mb-5 mx-auto">
                            <i class="fa {{ $service->icon }} fa-3x text-white"></i>
                        </div>
                        <div class="featurs-content text-center">
                            <h5>{{ $service->service_name }}</h5>
                            <p>{{ $service->service_desc }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Featurs Section End -->
