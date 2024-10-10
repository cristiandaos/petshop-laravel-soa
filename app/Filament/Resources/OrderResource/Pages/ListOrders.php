<?php

namespace App\Filament\Resources\OrderResource\Pages;

use App\Filament\Resources\OrderResource;
use Filament\Actions;
use App\Filament\Resources\OrderResource\Widgets\OrderStats;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;

class ListOrders extends ListRecords
{
    protected static string $resource = OrderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            OrderStats::class
        ];
    }

    public function getTabs(): array
    {
        return [
            null => Tab::make('Todos'),
            'new' => Tab::make('Nuevos Pedidos')->query(fn ($query) => $query->where('status', 'new')),
            'processing' => Tab::make('En Proceso')->query(fn ($query) => $query->where('status', 'processing')),
            'shipped' => Tab::make('Pedidos Enviados')->query(fn ($query) => $query->where('status', 'shipped')),
            'delivered' => Tab::make('Pedidos Entregados')->query(fn ($query) => $query->where('status', 'delivered')),
            'cancelled' => Tab::make('Pedidos Cancelados')->query(fn ($query) => $query->where('status', 'canceled')),
        ];
    }

}
