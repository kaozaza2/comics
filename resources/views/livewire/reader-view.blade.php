<div>
    <div class="relative flex">
        @if($comic->type === \App\Models\Enumerations\ComicType::Comic)
            <livewire:webtoon-reader-view :comic="$comic"/>
        @elseif($comic->type === \App\Models\Enumerations\ComicType::Manga)
            <livewire:default-reader-view :comic="$comic"/>
        @endif
    </div>
</div>
