@extends('layouts.app')

@section('content')
    <section class="container">
        <div class="addons-section">
            <div class="row">
                <div class="col-md-8">
                    <h2 class="mb-4">{{ $addon->heading }}</h2>
                    <p>{{ $addon->subheading }}</p>

                    @foreach(json_decode($addon->benefits, true) as $benefit)
                        <div class="addon-item">
                            <div class="addon-icon">
                                <i class="{{ $benefit['icon'] }}"></i>
                            </div>
                            <div>
                                <h5 class="mb-0">{{ $benefit['title'] }}</h5>
                                <p class="mb-0">{{ $benefit['description'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="col-md-4 d-flex align-items-center">
                    <div class="text-center mt-4 mt-md-0">
                        <i class="{{ $addon->sidebar_icon }} fa-4x mb-3"></i>
                        <h3>{{ $addon->sidebar_title }}</h3>
                        <p>{{ $addon->sidebar_description }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
