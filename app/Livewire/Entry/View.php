<?php

namespace App\Livewire\Entry;

use App\Models\Entry;
use Livewire\Component;

class View extends Component
{
    public Entry $entry;

    public bool $entryNotFound = false;

    public function mount(string $id)
    {
        try {
            $this->entry = Entry::findOrFail($id);
        } catch (\Exception $e) {
            return $this->redirect("/error");
        }
    }
}
