<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\BadgeColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                FileUpload::make('image')
                    ->image()->enableOpen()
                    ->directory('products'),
                Forms\Components\TextInput::make('name')->required(),
                Forms\Components\Textarea::make('description')->required(),
                Forms\Components\TextInput::make('color')->required(),
                Forms\Components\TextInput::make('ram')->required(),
                Forms\Components\TextInput::make('memory')->required(),
                Forms\Components\TextInput::make('type')->required(),
                Forms\Components\TextInput::make('company')->required(),
                Forms\Components\TextInput::make('company')->required(),
                Forms\Components\TextInput::make('price')->type('number')->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')->width(50)->height(50),
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('price'),
                Tables\Columns\TextColumn::make('company'),
                Tables\Columns\TextColumn::make('type'),
                Tables\Columns\TextColumn::make('ram'),
                Tables\Columns\TextColumn::make('memory'),
                BadgeColumn::make('color')
                    ->colors([
                        'primary',
                        'secondary' => static fn ($state): bool => $state === 'blue',
                        'warning' => static fn ($state): bool => $state === 'yellow',
                        'success' => static fn ($state): bool => $state === 'green',
                        'danger' => static fn ($state): bool => $state === 'red',
                    ]),
                Tables\Columns\TextColumn::make('description')->words(10)


            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
