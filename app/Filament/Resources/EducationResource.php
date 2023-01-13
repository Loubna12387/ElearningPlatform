<?php

namespace App\Filament\Resources;

use Closure;
use Filament\Forms;
use Filament\Tables;
use App\Models\Education;
use Illuminate\Support\Str;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Livewire\TemporaryUploadedFile;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Tables\Actions\DeleteBulkAction;
use App\Filament\Resources\EducationResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\EducationResource\RelationManagers;
use App\Filament\Resources\EducationResource\Pages\EditEducation;
use App\Filament\Resources\EducationResource\Pages\ListEducation;
use App\Filament\Resources\EducationResource\Pages\CreateEducation;




class EducationResource extends Resource
{
    protected static ?string $model = Education::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?string $navigationGroup = 'Courses';
    protected static ?int $navigationSort = 2;


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Card::make()
                ->schema([
                    TextInput::make('titre')
                    ->reactive()
                    ->afterStateUpdated(function (Closure $set, $state) {
                        $set('slug', Str::slug($state));
                    })->required(),
                TextInput::make('slug')->required(),
                TextInput::make('description'),
                FileUpload::make('image') ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file): string {
                    return (string) str($file->getClientOriginalName())->prepend('imagesCourses');
                }),
                TextInput::make('prix'),

                Select::make('modules_id')
                ->relationship('modules', 'title'),
                Select::make('type_education_id')
                ->relationship('typeeducation', 'title'),
                Toggle::make('is_published'),

                 ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('id')->sortable(),
                TextColumn::make('titre')->sortable()->searchable(),
                TextColumn::make('slug')->limit(50)->sortable()->searchable(),
                TextColumn::make('description')->sortable()->searchable(),
                 ImageColumn::make('image'),
                TextColumn::make('prix')->sortable()->searchable(),
                TextColumn::make('modules.title')->sortable()->label('Modules'),
                TextColumn::make('typeeducation.title')->sortable()->label('Type'),
                BooleanColumn::make('is_published')->searchable(),
                TextColumn::make('created_at')->sortable()->searchable()->label('Created At')->date(),

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
            'index' => Pages\ListEducation::route('/'),
            'create' => Pages\CreateEducation::route('/create'),
            'edit' => Pages\EditEducation::route('/{record}/edit'),
        ];
    }
}
