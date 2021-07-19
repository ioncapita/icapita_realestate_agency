<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Property') }}
        </h2>
    </x-slot>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Property') }}</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6 col-md-5" style="text-align: center">
                                <img src="{{ $property->photo ? asset("images/".$property->photo) : asset("images/default.jpg") }}" />
                            </div>
                            <div class="col-sm-6 col-md-7">
                                <h4><strong>{{ $property->name ?? '' }}</strong></h4>
                                <hr>
                                <p>
                                    {{ $property->name ?? '' }}<br>
                                    <small><cite title="">{{ $property->location ?? '' }}</cite></small>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</x-app-layout>
