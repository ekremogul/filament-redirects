<?php

namespace Ekremogul\FilamentRedirects\Resources\RedirectResource;

use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\LinkAction;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Ekremogul\FilamentRedirects\Models\Redirect;
use Ekremogul\FilamentRedirects\Resources\Pages\CreateRedirect;
use Ekremogul\FilamentRedirects\Resources\Pages\EditRedirect;
use Ekremogul\FilamentRedirects\Resources\Pages\ListRedirects;

class RedirectResource extends Resource
{
    protected static ?string $model = Redirect::class;

    protected static ?string $navigationIcon = 'heroicon-o-switch-horizontal';

    public static function getLabel(): ?string
    {
        return __('Redirect');
    }

    /**
     * @return string|null
     */
    public static function getPluralLabel(): string
    {
        return __('Redirects');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([
                        TextInput::make('source')
                            ->translateLabel()
                            ->placeholder(__('/my-old-path'))
                            ->unique(ignorable: fn (?Redirect $record): ?Redirect => $record)
                            ->required(),
                        TextInput::make('destination')
                            ->translateLabel()
                            ->placeholder(__('/my-new-path'))
                            ->required(),
                        Select::make('status_code')
                            ->translateLabel()
                            ->options([
                                '301' => __('301 - Permanent'),
                                '302' => __('302 - Temporary'),
                                '303' => __('303 - Temporary'),
                                '307' => __('307 - Temporary'),
                                '308' => __('308 - Permanent'),
                            ])
                            ->required(),
                        Toggle::make('enabled')
                            ->translateLabel()
                            ->default(true)
                            ->inline(false)
                            ->offIcon('heroicon-s-x')
                            ->onIcon('heroicon-s-check'),
                    ])->inlineLabel()
            ]);
    }

    /**
     * @throws \Exception
     */
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('source')
                    ->translateLabel()
                    ->searchable(),
                TextColumn::make('destination')
                    ->translateLabel()
                    ->searchable(),
                TextColumn::make('status_code')
                    ->translateLabel(),
                IconColumn::make('enabled')
                    ->boolean()
                    ->translateLabel(),
            ])
            ->appendActions([
                Action::make('delete')
                    ->translateLabel()
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
