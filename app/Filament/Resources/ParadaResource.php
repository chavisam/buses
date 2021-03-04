<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ParadaResource\Pages;
use App\Filament\Resources\ParadaResource\RelationManagers;
use App\Filament\Roles;
use Filament\Resources\Forms\Components;

use Filament\Resources\Forms\Components\DateTimePicker;
use Filament\Resources\Forms\Form;
use Filament\Resources\Resource;
use Filament\Resources\Tables\Columns;
use Filament\Resources\Tables\Filter;
use Filament\Resources\Tables\Table;

class ParadaResource extends Resource
{
    public static $icon = 'heroicon-o-chip';

    public static function form(Form $form)
    {
        return $form
            ->schema([
                Components\TextInput::make('name')->autofocus()->required()->unique('paradas','name', $exceptCurrentRecord = false),
                DateTimePicker::make('hora_ida')->displayFormat($format = 'H:i')->format($format = 'H:i')->withoutSeconds()->placeholder('Hora de ida hacia el colegio'),
                DateTimePicker::make('hora_vuelta')->displayFormat($format = 'H:i')->format($format = 'H:i')->withoutSeconds(),
            ]);
    }

    public static function table(Table $table)
    {
        return $table
            ->columns([
                Columns\Text::make('id')->primary(),
                Columns\Text::make('name')->searchable(),
                Columns\Text::make('hora_ida')->searchable(),
                Columns\Text::make('hora_vuelta')->searchable()
            ])
            ->filters([
                //
            ]);
    }

    public static function relations()
    {
        return [
            //
        ];
    }

    public static function routes()
    {
        return [
            Pages\ListParadas::routeTo('/', 'index'),
            Pages\CreateParada::routeTo('/create', 'create'),
            Pages\EditParada::routeTo('/{record}/edit', 'edit'),
            Pages\ListadoParadas::routeTo('/listado', 'listadoparadas'),
        ];
    }

    public static function authorization()
    {
        return [
            Roles\Padre::deny(),
        ];
    }

 
}
