@extends('layouts.app')

@section('content')
<section class="container mb-5">
    <h1 class="mb-4">Why Choose Us - Health & Insurance</h1>

    @if($services->count())
        <div class="row g-4">
            @foreach($services as $service)
                <div class="col-lg-6">
                    <div class="service-card card h-100">
                        <div class="card-body p-4">
                            {{-- Icon --}}
                            <div class="service-icon mb-3 text-center">
                                @if($service->icon)
                                    <img src="{{ asset('storage/icons/' . $service->icon) }}" alt="Icon" width="50">
                                @else
                                    <i class="fas fa-shield-alt"></i> {{-- fallback icon --}}
                                @endif
                            </div>

                            {{-- Title --}}
                            <h3>{{ $service->title }}</h3>

                            {{-- Subtitle --}}
                            <p class="text-muted">{{ $service->subtitle }}</p>

                            {{-- Description --}}
                            <p>{{ Str::limit($service->description, 150) }}</p>

                            {{-- Key Services --}}
                            @php
                                $keyServices = json_decode($service->key_services, true);
                            @endphp
                            @if(is_array($keyServices) && count($keyServices))
                                <h5 class="mt-4">Key Services:</h5>
                                <ul class="service-list">
                                    @foreach($keyServices as $key_service)
                                        <li>{{ $key_service }}</li>
                                    @endforeach
                                </ul>
                            @endif

                            {{-- Why It Matters --}}
                            <div class="why-matters mt-3">
                                <h6><i class="fas fa-star me-2"></i>Why It Matters</h6>
                                <p class="mb-0">{{ $service->why_it_matters }}</p>
                            </div>

                            {{-- Lead By --}}
                            <p class="service-lead mt-3"><i class="fas fa-user-tie me-2"></i>Led by {{ $service->lead_by }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Pagination --}}
        <div class="mt-4">
            {{ $services->links() }}
        </div>
    @else
        <p>No services available.</p>
    @endif
</section>
{{-- 
<section class="container">
    <div class="addons-section">
        <div class="row">
            <div class="col-md-8">
                <h2 class="mb-4">Add-On Benefits for All Clients</h2>
                <p>We provide these additional services to all our valued clients:</p>

                @foreach($addons as $addon)
                <div class="addon-item">
                    <div class="addon-icon">
                        <i class="{{ $addon->icon_class }}"></i>
                    </div>
                    <div>
                        <h5 class="mb-0">{{ $addon->title }}</h5>
                        <p class="mb-0">{{ $addon->subtitle }}</p>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="col-md-4 d-flex align-items-center">
                <div class="text-center mt-4 mt-md-0">
                    <i class="fas fa-gift fa-4x mb-3"></i>
                    <h3>Complimentary for All Clients</h3>
                    <p>These value-added services come standard with every JSR Insurance relationship.</p>
                </div>
            </div>
        </div>
    </div>
</section> --}}

<section class="container">
    <div class="addons-section py-5">
        <div class="row">
            <div class="col-md-8">
                <h2 class="mb-4">Add-On Benefits for All Clients</h2>
                <p>We provide these additional services to all our valued clients:</p>

                @if($addons->count())
                    @foreach($addons as $addon)
                    <div class="addon-item d-flex align-items-start mb-3">
                        <div class="addon-icon me-3">
                            <i class="{{ $addon->icon_class }} fa-2x text-primary"></i>
                        </div>
                        <div>
                            <h5 class="mb-1">{{ $addon->title }}</h5>
                            <p class="mb-0 text-muted">{{ $addon->subtitle }}</p>
                        </div>
                    </div>
                    @endforeach
                @else
                    <p>No add-on benefits found at this time.</p>
                @endif
            </div>

            <div class="col-md-4 d-flex align-items-center">
                <div class="text-center mt-4 mt-md-0 w-100">
                    <i class="fas fa-gift fa-4x mb-3 text-success"></i>
                    <h3>Complimentary for All Clients</h3>
                    <p class="text-muted">These value-added services come standard with every JSR Insurance relationship.</p>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Contact Section -->
<section class="container my-5">
    <div class="row g-4">
        @foreach ($contacts as $contact)
            <div class="col-md-6">
                <div class="contact-card text-center">
                    <div class="contact-icon">
                        <i class="fas fa-user-tie"></i>
                    </div>
                    <h4>{{ $contact->name }}</h4>
                    <p class="text-muted">{{ $contact->designation }}</p>
                    <div class="d-flex justify-content-center gap-2">
                        <button class="btn btn-primary"><i class="fas fa-phone-alt me-2"></i>Call</button>
                        <button class="btn btn-outline-primary"><i class="fas fa-envelope me-2"></i>Email</button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>



@endsection
