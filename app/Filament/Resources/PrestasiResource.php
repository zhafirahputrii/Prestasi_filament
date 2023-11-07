<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PrestasiResource\Pages;
use App\Filament\Resources\PrestasiResource\RelationManagers;
use App\Models\Prestasi;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PrestasiResource extends Resource
{
    protected static ?string $model = Prestasi::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')->required(),
                TextInput::make('nisn')->required(),
                Select::make('kelas')->required()
                ->options([
                    '7A' => '7A',
                    '7B' => '7B',
                    '7C' => '7C',
                    '8A' => '8A',
                    '8B' => '8B',
                    '8C' => '8C',
                    '9A' => '9A',
                    '9B' => '9B',
                    '9C' => '9C',
                ]),
                TextInput::make('juara')->required(),
                TextInput::make('lomba')->required(),
                TextInput::make('penyelenggara')->required(),
                TextInput::make('tingkat')->required(),
                DatePicker::make('tanggal')->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name'),
                TextColumn::make('nisn'),
                TextColumn::make('kelas'),
                TextColumn::make('juara'),
                TextColumn::make('lomba'),
                TextColumn::make('penyelenggara'),
                TextColumn::make('tingkat'),
                TextColumn::make('tanggal')
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ]);
    }
    
    public static function getRelations(): array
    {
        return [
            //
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPrestasis::route('/'),
            //'create' => Pages\CreatePrestasi::route('/create'),
            //'edit' => Pages\EditPrestasi::route('/{record}/edit'),
        ];
    }    
}
