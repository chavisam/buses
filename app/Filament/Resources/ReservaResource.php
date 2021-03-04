<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ReservaResource\Pages;
use App\Filament\Resources\ReservaResource\RelationManagers;
use App\Filament\Roles;
use Filament\Resources\Forms\Components;
use Filament\Resources\Forms\Form;
use Filament\Resources\Resource;
use Filament\Resources\Tables\Columns;
use Filament\Resources\Tables\Filter;
use Filament\Resources\Tables\Table;
use Filament\Resources\Forms\Components\DatePicker;

class ReservaResource extends Resource
{
    public static $icon = 'heroicon-o-collection';

    public static function form(Form $form)
    {
        return $form
            ->schema([
                DatePicker::make('fecha')->displayFormat($format = 'j F Y')->autofocus(),
                Components\TextInput::make('name_hijo'),
                Components\TextInput::make('curso'),
                Components\TextInput::make('parada_name'),
                Components\TextInput::make('car_id'),
            ]);
    }

    public static function table(Table $table)
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ]);
    }

    public static function relations()
    {
        return [
    
        ];
    }

    public static function routes()
    {
        return [
            Pages\ListReservas::routeTo('/', 'index'),
            Pages\CreateReserva::routeTo('/create', 'create'),
            Pages\EditReserva::routeTo('/{record}/edit', 'edit'),
        ];
    }

    public static function authorization()
        {
            return [
                Roles\Padre::allow(),
            ];
        }
}
