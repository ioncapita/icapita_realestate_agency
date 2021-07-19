<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Property') }}
        </h2>
    </x-slot>
    <form method="POST" action="{{ route('properties.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
            <div class="col-md-6">
                <input type="text" id="name" class="form-control" name="name" required autofocus>
            </div>
        </div>
        <div class="form-group row">
            <label for="agent_id" class="col-md-4 col-form-label text-md-right">{{ __('Agent ID') }}</label>
            <div class="col-md-6">
                <input type="text" id="agent_id" class="form-control"
                    name="agent_id" required autofocus>
            </div>
        </div>
        <div class="form-group row">
            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>
            <div class="col-md-6">
                <input type="text" id="description" class="form-control" name="description" required autofocus>
            </div>
        </div>
        <div class="form-group row">
            <label for="location" class="col-md-4 col-form-label text-md-right">{{ __('Location') }}</label>
            <div class="col-md-6">
                <input type="text" id="location" class="form-control" name="location" required autofocus>
            </div>
        </div>

        <div class="form-group row">
            <label for="n_rooms" class="col-md-4 col-form-label text-md-right">{{ __('Nº Rooms') }}</label>
            <div class="col-md-6">
                <input type="text" id="n_rooms" class="form-control" name="n_rooms" required autofocus>
            </div>
        </div>

        <div class="form-group row">
            <label for="photo" class="col-md-4 col-form-label text-md-right">{{ __('Photo') }}</label>
            <div class="col-md-6">
                <input type="file" id="photo" class="form-control" name="photo" autofocus>
            </div>
        </div>

        <div class="form-group row">
            <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Price') }}</label>
            <div class="col-md-6">
                <input type="text" id="price" class="form-control" name="price" required autofocus>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __("Adicionar") }}
                </button>
            </div>
        </div>
    </form>
</x-app-layout>
