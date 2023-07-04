<x-app-layout>

    <div>
        @forelse($comics as $comic)
            <a class="relative flex flex-col" href="{{ route('comic-reader', ['comic' => $comic]) }}">
                <img src="{{ $comic->cover }}" alt="{{ $comic->title }}" class="w-16 h-16">

                <div>
                    <h1>{{ $comic->title }}</h1>
                </div>
            </a>
        @empty
            <div>
                <h1>No comics found.</h1>
            </div>
        @endforelse
    </div>

</x-app-layout>
