<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Str;

class BlogCategory extends Component
{

    public $name;
    public function render()
    {
        return view('livewire.blog-category');
    }
    public function submit()
    {
 
        $this->validate([
            'name' => 'required|unique:blog_categories,name,except,id'
        ]);
        BlogCategory::create([
            'name' => $this->name,
        ]);
        session()->flash('success', 'Blog Category Listed');
    }
}
