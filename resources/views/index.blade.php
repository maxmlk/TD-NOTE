@extends("layouts.app")

@section("content")
    <div class="flex flex-col space-y-4">
        <h1 class="text-5xl font-extrabold">
            Tableau de bord
        </h1>
        <div>

            <a href="/reservation" class="bg-blue-500 px-5 py-2 rounded-full font-medium text-white transition hover:bg-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                RESERVER UNE PLACE
            </a>
        </div>
    </div>
@endsection
