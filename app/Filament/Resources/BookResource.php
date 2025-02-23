<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Book;
use Faker\Core\File;
use Filament\Tables;
use App\Models\Genre;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\BookResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\BookResource\RelationManagers;

class BookResource extends Resource
{
    protected static ?string $model = Book::class;
    

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                FileUpload::make('cover')
                    ->image()
                    ->directory('book/covers')
                    ->imageEditorAspectRatios([
                        '3:4'
                    ]),
                RichEditor::make('description')
                ->maxLength(255),
                TextInput::make('tittle'),
                FileUpload::make('content')
                    ->directory('book/content')
                    ->maxSize(102400)
                    ->rules(['max:102400']) 
                    ->acceptedFileTypes(['application/pdf']),
                TextInput::make('author'),
                Select::make('genres')
                    ->searchable()
                    ->multiple()
                    ->relationship('genres', 'genre')
                    ->preload(),
                
                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('cover')
                    ->label('Cover'),
                TextColumn::make('tittle')
                    ->label('Tittle'),
 
                TextColumn::make('genres.genre')
                    ->separator(', ')
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
            'index' => Pages\ListBooks::route('/'),
            'create' => Pages\CreateBook::route('/create'),
            'edit' => Pages\EditBook::route('/{record}/edit'),
        ];
    }
}
