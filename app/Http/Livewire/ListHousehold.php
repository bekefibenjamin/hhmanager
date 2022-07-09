<?php
 
namespace App\Http\Livewire;

use App\Models\Household;
use Closure;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\BulkAction;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;
 
class ListHousehold extends Component implements Tables\Contracts\HasTable 
{
    use Tables\Concerns\InteractsWithTable; 
 
    protected function getTableQuery(): Builder
    {
        return Household::query();
    } 

    protected function getTableRecordUrlUsing(): Closure
    {
        return fn (Household $record): string => route('household.show', $record);
    }

    protected function getTableColumns(): array 
    {
        return [
            Tables\Columns\TextColumn::make('name'),
        ];
    }

    protected function getTableActions(): array
    {
        return [
            Action::make('view')
                ->icon('heroicon-s-eye')
                ->url(fn (Household $record): string => route('household.show', $record)),
            Action::make('edit')
                ->icon('heroicon-s-pencil')
                ->url(fn (Household $record): string => route('household.edit', $record)),
            Action::make('delete')
                ->color('danger')
                ->icon('heroicon-o-trash')
                ->requiresConfirmation()
                ->action(fn (Household $record) => $record->delete()),  
        ];
    }

    protected function getTableBulkActions(): array
    {
        return [
            BulkAction::make('delete')
                ->action(fn (Collection $records) => $records->each->delete())
                ->deselectRecordsAfterCompletion()
                ->requiresConfirmation()
        ];
    }

    public function render(): View
    {
        return view('livewire.list-household');
    }
}