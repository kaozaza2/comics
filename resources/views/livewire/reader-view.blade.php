<div>
    <div class="relative flex">
        @if($comic->type === \App\Models\Enums\ComicType::Comic)
            <livewire:webtoon-reader-view :comic="$comic"/>
        @elseif($comic->type === \App\Models\Enums\ComicType::Manga)
            <livewire:default-reader-view :comic="$comic"/>
        @endif
    </div>
</div>
