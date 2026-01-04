<?php

namespace App\Filament\Resources\Categories\Pages;

use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\Categories\CategoryResource;
use Illuminate\Support\Facades\Auth;

class CreateCategory extends CreateRecord
{
    protected static string $resource = CategoryResource::class;

    protected function afterCreate(): void
    {
        $user = Auth::user();

        Notification::make()
            ->title('Category Created')
            ->body("Category {$this->record->name}")
            ->success()
            ->send();

        Notification::make()
            ->title('Category Created Successfully')
            ->body("The category '{$this->record->name}' has been created.")
            ->icon('heroicon-o-bell')
            ->sendToDatabase($user);

        Notification::make()
            ->title('Test Notification Center')
            ->body('If you see this, everything works')
            ->sendToDatabase(Auth::user());
    }
}
