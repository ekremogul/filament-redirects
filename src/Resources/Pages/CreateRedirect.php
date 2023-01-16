<?php

namespace Ekremogul\FilamentRedirects\Resources\Pages;

use Filament\Resources\Pages\CreateRecord;
use Ekremogul\FilamentRedirects\Resources\RedirectResource\RedirectResource;

class CreateRedirect extends CreateRecord
{
    protected static string $resource = RedirectResource::class;
}
