<?php

namespace App\Http\Livewire;

use App\Models\Household;
use Livewire\Component; 
use Filament\Forms;
use Filament\Forms\Components\Card;
use Illuminate\Contracts\View\View;
 
class CreateHousehold extends Component implements Forms\Contracts\HasForms 
{
    use Forms\Concerns\InteractsWithForms; 

    public $name = '';
 
    protected function getFormSchema(): array 
    {
        return [
            Card::make()->schema([
                Forms\Components\TextInput::make('name')
                    ->required(),
            ])
        ];
    } 

    public function store() 
    {
        Household::create($this->form->getState());
        return redirect(route('household.index'));
    } 

    public function render(): View
    {
        return view('livewire.create-household');
    }
}