<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Book;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\BookResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\BookResource\RelationManagers;

class BookResource extends Resource
{
    protected static ?string $model = Book::class;

    protected static ?string $navigationIcon = 'heroicon-o-folder'; // Use any custom SVG if you prefer

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                    Select::make('author_id')
                    ->label('Author')
                    ->required()
                    ->relationship('author', 'name'),
                    Select::make('category_id')
                    ->label('Category') // Optional: A user-friendly label
                    ->required()
                    ->relationship('category', 'name'), // Refers to the 'state' relationship
                    Select::make('published_year')
                    ->label('Published Year')
                    ->required()
                    ->placeholder('Select a year') // Adding the placeholder here
                    ->options(
                        collect(range(1900, now()->year))
                            ->mapWithKeys(fn($year) => [$year => $year])
                            ->toArray()
                    ),
                    Forms\Components\TextInput::make('isbn')
                    ->maxLength(13) // Max length for ISBN-13
                    ->nullable() // ISBN is optional
                    ->regex('/^(978|979)\d{10}$|^\d{9}[\dX]$/') // Updated regex for ISBN-13 and ISBN-10
                    ->label('ISBN')
                    ->helperText('Enter a valid ISBN-10 or ISBN-13. ISBN-13 must start with 978 or 979, and ISBN-10 may include a check digit (X).'),

                Forms\Components\TextInput::make('available_copies')
                    ->required()
                    ->numeric()
                    ->default(1),
                Forms\Components\FileUpload::make('book_image')
                    ->image()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('author.name')
                    ->label('Author')
                    ->searchable(),
                Tables\Columns\TextColumn::make('category.name')
                ->label('Category')
                ->searchable(),
                Tables\Columns\TextColumn::make('published_year'),
                Tables\Columns\TextColumn::make('isbn')
                    ->searchable(),
                Tables\Columns\TextColumn::make('available_copies')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\ImageColumn::make('book_image'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'view' => Pages\ViewBook::route('/{record}'),
            'edit' => Pages\EditBook::route('/{record}/edit'),
        ];
    }
}
