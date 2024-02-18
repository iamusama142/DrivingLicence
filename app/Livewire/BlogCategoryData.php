<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\BlogCategory;


class BlogCategoryData extends Component
{
    public $category;
    public function mount()
    {
        $this->category=BlogCategory::all();
 
    }

   
}
