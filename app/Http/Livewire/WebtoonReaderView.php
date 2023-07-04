<?php

namespace App\Http\Livewire;

use Illuminate\Contracts\View\View as ViewContract;
use Livewire\Component;

class WebtoonReaderView extends Component
{
    public $comic;

    public function render(): ViewContract
    {
        return view('livewire.webtoon-reader-view');
    }
}
