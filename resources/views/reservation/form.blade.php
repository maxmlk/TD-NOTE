@extends("layouts.app")

@section("content")
    <div class="flex flex-col space-y-4">
        <h1 class="text-5xl font-extrabold">
                Nouvelle réservation

        </h1>

        <x-card class="max-w-lg w-full mx-auto">
            <form method="POST" action="{{ URL::full() }}" class="flex flex-col space-y-4">
                @csrf
                <x-form-errors />
                <div>
                    <div class="font-semibold pb-1">
                        <label for="date">DATE</label>
                    </div>
                    <x-input name="date" id="date" type="date" value="{{ isset($reservation) ? $reservation->date : '' }}" />
                </div>

                <div>
                    <div class="font-semibold pb-1">
                        <label for="name">Batiment</label>
                    </div>
                    <select name="building_id">
                        @foreach ($buildings as $key)
                        <option value="{{$key->id}}">{{$key->name}} , place max : {{$key->capacity}} </option> 
                    @endforeach
                    </select>
                </div>

                <div class="flex items-center space-x-2">
                    <x-button type="submit">
                            Réserver
                    </x-button>
                    <a href="/" class="bg-gray-100 px-5 py-2 rounded-full font-medium text-gray-800 transition hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                        Annuler
                    </a>
                </div>
            </form>
        </x-card>
    </div>
@endsection
