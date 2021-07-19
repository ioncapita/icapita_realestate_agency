<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Properties') }}
        </h2>
    </x-slot>

    {{-- @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ( $errors->all() as $error )
                    <li>{{ $error }} </li>
                @endforeach
            </ul>
        </div>
    @endif --}}

    <div class="col-lg-6 pull-right mb-2">
    <a class="btn btn-info" href="{{ route('properties.create') }}" title="{{ __('New Property') }}"> {{ __('New Property') }} </a>
    </div>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <td>{{ __('Name') }}</td>
                <td>{{ __('Description') }}</td>
                <td>{{ __('Location') }}</td>
                <td>{{ __('Rooms') }}</td>
                <td>{{ __('Price') }}</td>
                <td>{{ __('Photo') }}</td>
            </tr>
        </thead>
        <tbody>
            @foreach($properties as $property)
            <tr>
                <td>{{ $property->name ?? '' }}</td>
                <td>{{ $property->description ?? '' }}</td>
                <td>{{ $property->location ?? '' }}</td>
                <td>{{ $property->n_rooms ?? '' }}</td>
                <td>{{ $property->price ?? '' }}</td>
                <td>{{ $property->photo ?? '' }}
                    <img src="{{ $property->photo ? asset("images/".$property->photo) : asset("images/default.jpg") }}" />
                </td>
                <td style="display: inline-flex">
                    <a style="margin: 0 1px" class="btn btn-small btn-success" href="{{ route('properties.show', $property->id) }}"><i class="fa fa-eye"></i></a>
                    <a style="margin: 0 1px" class="btn btn-small btn-info" href="{{ route('properties.edit', $property->id) }}"><i class="fa fa-edit"></i></a>
                    <form style="margin: 0 1px" method="POST" action="{{ route('properties.destroy', $property->id) }}">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-small btn-danger"><i class="fa fa-times"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    <table>

</x-app-layout>
