<?php

namespace App\Filament\Resources;

use Closure;
use Filament\Forms;
use Filament\Tables;
use App\Models\Quize;
use Illuminate\Support\Str;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\QuizeResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\QuizeResource\RelationManagers;

class QuizeResource extends Resource
{
    protected static ?string $model = Quize::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?string $navigationGroup = 'Quize';

    protected static ?int $navigationSort = 7;

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            //
            Card::make()
            ->schema([
            TextInput::make('description'),
            TextInput::make('totalmarks'),
            Select::make('paragraphes_id')
            ->relationship('paragraphe', 'slug'),

             ])
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('id')->sortable(),
                TextColumn::make('description')->sortable()->searchable(),
                TextColumn::make('totalmarks')->limit(50)->sortable()->searchable(),
                TextColumn::make('paragraphe.title')->sortable()->label('Paragraphe'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),

            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListQuizes::route('/'),
            'create' => Pages\CreateQuize::route('/create'),
            'edit' => Pages\EditQuize::route('/{record}/edit'),
        ];
    }
}
