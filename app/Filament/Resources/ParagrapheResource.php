<?php

namespace App\Filament\Resources;

use Closure;
use Filament\Forms;
use Filament\Tables;
use App\Models\Paragraphe;
use Illuminate\Support\Str;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ParagrapheResource\Pages;
use App\Filament\Resources\ParagrapheResource\RelationManagers;

class ParagrapheResource extends Resource
{
    protected static ?string $model = Paragraphe::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?string $navigationGroup = 'Paragraphe';
    protected static ?int $navigationSort = 4;


    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            //
            Card::make()
            ->schema([
                TextInput::make('title')
                ->reactive()
                ->afterStateUpdated(function (Closure $set, $state) {
                    $set('slug', Str::slug($state));
                })->required(),
            TextInput::make('slug')->required(),

            Select::make('education_id')
            ->relationship('education', 'slug'),

             ])
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('id')->sortable(),
                TextColumn::make('title')->sortable()->searchable(),
                TextColumn::make('slug')->limit(50)->sortable()->searchable(),
                TextColumn::make('education.titre')->sortable()->label('Education'),
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
            'index' => Pages\ListParagraphes::route('/'),
            'create' => Pages\CreateParagraphe::route('/create'),
            'edit' => Pages\EditParagraphe::route('/{record}/edit'),
        ];
    }
}
