<?php

namespace App\Http\Livewire\Admin\Customer;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $users = User::latest()->paginate(5);
        return view('livewire.admin.customer.index', [
            'title' => 'Data User',
            'users' => $users,
            'i' => (request()->input('page', 1) - 1) * 5
        ]);
    }
}