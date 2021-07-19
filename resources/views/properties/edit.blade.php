<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <form method="POST" action="{{ route('properties.update', $property->id) }}" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
            <div class="col-md-6">
                <input type="text" value="{{ $property->name }}" id="name" class="form-control" name="name" required
                    autofocus>
            </div>
        </div>
        <div class="form-group row">
            <label for="agent_id" class="col-md-4 col-form-label text-md-right">{{ __('agent_id') }}</label>
            <div class="col-md-6">
                <input type="text" id="agent_id" value="{{ $property->agent_id }}" class="form-control"
                    name="agent_id" required autofocus>
            </div>
        </div>
        <div class="form-group row">
            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>
            <div class="col-md-6">
                <input type="text" id="description" value="{{ $property->description }}" class="form-control"
                    name="description" required autofocus>
            </div>
        </div>
        <div class="form-group row">
            <label for="location" class="col-md-4 col-form-label text-md-right">{{ __('Location') }}</label>
            <div class="col-md-6">
                <input type="text" id="location" value="{{ $property->location }}" class="form-control" name="location"
                    required autofocus>
            </div>
        </div>
        <div class="form-group row">
            <label for="n_rooms"
                class="col-md-4 col-form-label text-md-right">{{ __('Nº Rooms') }}</label>
            <div class="col-md-6">
                <input type="text" id="n_rooms" value="{{ $property->n_rooms }}" class="form-control"
                    name="n_rooms" required autofocus>
            </div>
        </div>
        <div class="form-group row">
            <label for="photo" class="col-md-4 col-form-label text-md-right">{{ __('Photo') }}</label>
            <div class="col-md-6">
                <input type="file" id="photo" class="form-control" name="photo" autofocus>
            </div>
        </div>        <div class="form-group row">
            <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Price') }}</label>
            <div class="col-md-6">
                <input type="text" id="price" value="{{ $property->price }}" class="form-control"
                    name="price" required autofocus>
            </div>        </div>
        <button type="submit" class="btn btn-primary">
            {{ __('Edit') }}
        </button>
    </form>

</x-app-layout>
