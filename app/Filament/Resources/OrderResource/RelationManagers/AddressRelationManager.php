<?php

namespace App\Filament\Resources\OrderResource\RelationManagers;

use Faker\Provider\ar_EG\Text;
use Filament\Forms;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AddressRelationManager extends RelationManager
{
    protected static string $relationship = 'address';

    public function form(Form $form): Form
    {
        return $form
            ->schema([

                TextInput::make('first_name')
                    ->required()
                    ->maxLength(255)
                    ->label('Nombre'),

                TextInput::make('last_name')
                    ->required()
                    ->maxLength(255)
                    ->label('Apellido'),

                TextInput::make('phone')
                    ->required()
                    ->tel()
                    ->maxLength(255)
                    ->label('Teléfono'),

                TextInput::make('city')
                    ->required()
                    ->maxLength(255)
                    ->label('Ciudad'),

                TextInput::make('state')
                    ->required()
                    ->maxLength(255)
                    ->label('Distrito'),

                TextInput::make('zip_code')
                    ->required()
                    ->numeric()
                    ->maxLength(255)
                    ->label('Código Postal'),

                Textarea::make('street_address')
                    ->required()
                    ->columnSpanFull()
                    ->label('Dirección'),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('street_address')
            ->columns([
                TextColumn::make('fullname')
                    ->label('Nombre Completo'),
                TextColumn::make('phone')
                    ->label('Teléfono'),
                TextColumn::make('city')
                    ->label('Ciudad'),
                TextColumn::make('state')
                    ->label('Distrito'),
                TextColumn::make('zip_code')
                    ->label('Código Postal'),
                TextColumn::make('street_address')
                    ->label('Dirección'),

            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
