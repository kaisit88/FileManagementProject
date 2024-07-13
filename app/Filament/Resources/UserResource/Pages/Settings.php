<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Resources\Pages\Page;

class Settings extends Page
{
    protected static string $resource = UserResource::class;

    protected static string $view = 'filament.resources.user-resource.pages.settings';

    public static function canAccess(array $parameters = []): bool
    {
        return auth()->user() && auth()->user()->canManageSettings();
    }

}
