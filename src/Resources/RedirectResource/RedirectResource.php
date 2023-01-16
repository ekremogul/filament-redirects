<?php

namespace Ekremogul\FilamentRedirects\Resources\RedirectResource;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables\Actions\LinkAction;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Tables\Columns\TextColumn;
use Ekremogul\FilamentRedirects\Models\Redirect;
use Ekremogul\FilamentRedirects\Resources\Pages\CreateRedirect;
use Ekremogul\FilamentRedirects\Resources\Pages\EditRedirect;
use Ekremogul\FilamentRedirects\Resources\Pages\ListRedirects;

class RedirectResource extends Resource
{
    protected static ?string $model = Redirect::class;

    protected static ?string $navigationIcon = 'heroicon-o-switch-horizontal';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('source')
                    ->placeholder('/my-old-path')
                    ->unique(ignorable: fn (?Redirect $record): ?Redirect => $record)
                    ->required(),
                TextInput::make('destination')
                    ->placeholder('/my-new-path')
                    ->required(),
                Select::make('status_code')
                    ->options([
                        '301' => '301 - Permanent',
                        '302' => '302 - Temporary',
                        '303' => '303 - Temporary',
                        '307' => '307 - Temporary',
                        '308' => '308 - Permanent',
                    ])
                    ->required(),
                Toggle::make('enabled')
                    ->default(true)
                    ->inline(false)
                    ->offIcon('heroicon-s-x')
                    ->onIcon('heroicon-s-check'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('source')
                    ->searchable(),
                TextColumn::make('destination')
                    ->searchable(),
                TextColumn::make('status_code'),
                BooleanColumn::make('enabled'),
            ])
            ->pushActions([
                LinkAction::make('delete')
                    ->action(fn (Redirect $record) => $record->delete())
                    ->requiresConfirmation()
                    ->color('danger'),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListRedirects::route('/'),
            'create' => CreateRedirect::route('/create'),
            'edit' => EditRedirect::route('/{record}/edit'),
        ];
    }
}
