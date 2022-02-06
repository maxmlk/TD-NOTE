@extends("layouts.app")

@section("content")
    <div class="flex flex-col space-y-4">
        <h1 class="text-5xl font-extrabold">
            Les réservations
        </h1>

        <div>
            <a href="/reservation" class="bg-blue-500 px-5 py-2 rounded-full font-medium text-white transition hover:bg-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                Nouvelle Reservation
            </a>
        </div>

        <x-card class="divide-y py-0">
            @forelse($reservation as $res)
                <div class="py-4 flex items-center justify-between">
                    <div>
                        <span class="font-medium">{{ $res->date }}</span> <span class="text-gray-500 text-xs">Batiment : {{ $res->building->name }}</span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <a href="/reservation/{{ $res->id }}/delete" class="bg-red-100 px-5 py-1.5 text-sm rounded-full font-medium text-red-700 transition hover:bg-red-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                            Suppr.
                        </a>
                    </div>


                    
                </div>
            @empty
                <div class="text-center text-xl text-gray-400 py-16">
                    Aucune réservation
                </div>
            @endforelse
        </x-card>
    </div>
@endsection
