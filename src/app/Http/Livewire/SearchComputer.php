<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Computer;
use Livewire\WithPagination;

class SearchComputer extends Component
{
    use WithPagination;
    public $search = '';

    public function render()
    {
        $user = auth()->user();
        return view('livewire.search-computer', [
            'computers' => Computer::where('serial_number', 'like', '%' . $this->search . '%')
                ->paginate(25),
            'user' => $user,
        ]);
    }
}
