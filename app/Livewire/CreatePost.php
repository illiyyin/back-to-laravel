<?php

namespace App\Livewire;

use App\Http\Controllers\api\ProductTypeController;
use App\Models\ProductType;
use Filament\Actions\Action;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Livewire\Component;


class CreatePost extends Component implements HasForms
{
    use InteractsWithForms;
    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill();
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required(),
                // MarkdownEditor::make('content'),
                // ...
            ])
            ->statePath('data');
    }

    public function submitForm(): void
    {
        $data = $this->form->getState();
        // dd($data);
        try {
            // Call the API or handle the form submission logic here
            // Example API call
            $request = new Request($data);

            // Call the API controller method directly
            $response = (new ProductTypeController)->create($request);

            if ($response->status() === 200) {
                Notification::make()
                    ->title('Form submitted successfully!')
                    ->success()
                    ->send();
            } else {
                Notification::make()
                    ->title('Failed to submit form')
                    ->danger()
                    ->send();
            }
        } catch (\Exception $e) {
            Notification::make()
                ->title('An error occurred while submitting the form')
                ->danger()
                ->send();
            dd($e);
        }
    }

    public function render(): View
    {
        return view('livewire.create-post');
    }
}
