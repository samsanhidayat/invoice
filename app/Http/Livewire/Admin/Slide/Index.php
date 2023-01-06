<?php

namespace App\Http\Livewire\Admin\Slide;

use App\Models\Slide;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $slide = Slide::latest()->paginate(10);
        return view('livewire.admin.slide.index')->with([
            'title' => 'Slide',
            'slides' => $slide,
            'i' => (request()->input('page', 1) - 1) * 10
        ]);
    }
}