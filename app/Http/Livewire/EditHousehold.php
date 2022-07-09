<?php

namespace App\Http\Livewire;

use App\Models\Household;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Livewire\Component;

class EditHousehold extends Component implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;

    public Household $household;

    public $name = '';

    public function mount(): void 
    {
        $this->form->fill([
            'name' => $this->household->name,
        ]);
    }

    protected function getFormSchema(): array 
    {
        return [
            Card::make()->schema([
                Forms\Components\TextInput::make('name')
                    ->required(),
            ])
        ];
    }

    public function update()
    {
        $this->household->update($this->form->getState());
        return redirect(route('household.index'));
    }

    public function render()
    {
        return view('livewire.edit-household');
    }
}
