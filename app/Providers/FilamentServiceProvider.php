<?php

namespace App\Providers;

use App\Filament\Resources\PermissionResource;
use App\Filament\Resources\RoleResource;
use App\Filament\Resources\UserResource;
use Filament\Facades\Filament;
use Filament\Navigation\UserMenuItem;
use Illuminate\Support\ServiceProvider;

class FilamentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Filament::serving(function(){
            if(auth()->user()){
                if(auth()->user()->is_admin === 1 && auth()->user()->hasAnyRole(['super-admin', 'moderator'])){
                    Filament::registerUserMenuItems([
                        UserMenuItem::make()
                                    ->label('Manage Users')
                                    ->url(UserResource::getUrl())
                                    ->icon('heroicon-s-users'),
                        UserMenuItem::make()
                                    ->label('Manage Role')
                                    ->url(RoleResource::getUrl())
                                    ->icon('heroicon-s-cog'),
                        UserMenuItem::make()
                                    ->label('Manage Permission')
                                    ->url(PermissionResource::getUrl())
                                    ->icon('heroicon-o-key')
                    ]);
                }
            }
        });
    }
}
