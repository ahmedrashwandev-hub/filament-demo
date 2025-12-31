<?php

namespace App\Filament\Resources\Orders\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\DateFilter;

class OrdersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('order_number')->sortable()->searchable(),
                TextColumn::make('user.name')   ->label('User'),
                TextColumn::make('status')      ->sortable(),
                TextColumn::make('total_amount')->money('EG'),
                TextColumn::make('created_at')  ->dateTime(),
            ])
            ->filters([
                SelectFilter::make('status')->options([
                    'pending'    => 'Pending',
                    'processing' => 'Processing',
                    'completed'  => 'Completed',
                    'cancelled'  => 'Cancelled',
                ]),
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
