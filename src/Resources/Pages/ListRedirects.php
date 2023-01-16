<?php

namespace Ekremogul\FilamentRedirects\Resources\Pages;

use Filament\Resources\Pages\ListRecords;
use Ekremogul\FilamentRedirects\Resources\RedirectResource\RedirectResource;

class ListRedirects extends ListRecords
{
    protected static string $resource = RedirectResource::class;
}
