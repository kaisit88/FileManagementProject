<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FileResource\Pages;
use App\Filament\Resources\FileResource\RelationManagers;
use App\Models\File;
use App\Models\Category; // Import Category model
use App\Models\Subcategory; // Import Subcategory model

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components;
class FileResource extends Resource
{
    protected static ?string $model = File::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')->label('File Name'),
                Forms\Components\Select::make('category_id')->label('Category') ->options(Category::all()->pluck('name', 'id'))
                    ->searchable(), // Define $categories
                Forms\Components\Select::make('subcategory_id')->label('Subcategory') ->options(Subcategory::all()->pluck('name', 'id'))
                    ->searchable(), // Define $subcategories
                Forms\Components\FileUpload::make('image_path')->label('Image')->acceptedFileTypes(['image/*']),
//                Forms\Components\FileUpload::make('file_path')->label('File')->acceptedFileTypes(['application/exe', 'application/pdf', 'application/rar', 'application/zip', 'application/deb', 'application/iso'])->rule([max(500000000)]),
                Forms\Components\FileUpload::make('file_path')
                    ->label('attachment')
                    ->acceptedFileTypes(['application/exe', 'application/pdf', 'application/rar', 'application/zip', 'application/deb', 'application/iso'])
                    ->maxSize(5120000), // 500 MB

// Adjusted for maximum file size in kilobytes
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->label('File Name'),
                Tables\Columns\TextColumn::make('category.name')->label('Category'),
                Tables\Columns\TextColumn::make('subcategory.name')->label('Subcategory'),
                Tables\Columns\TextColumn::make('image_path')->label('Image'),
                Tables\Columns\TextColumn::make('file_path')->label('File'),
                Tables\Columns\TextColumn::make('created_at')->label('Created At'),

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListFiles::route('/'),
//            'create' => Pages\CreateFile::route('/create'),
//            'edit' => Pages\EditFile::route('/{record}/edit'),
        ];
    }
}
