<?php

namespace App\Filament\Resources\OrderResource\Widgets;

use App\Models\Order;
use Illuminate\Support\Number;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class OrderStats extends BaseWidget{
    protected function getStats(): array{
        return [
            Stat::make('Nuevos Pedidos', Order::query()->where('status', 'new')->count()),
            Stat::make('En Proceso', Order::query()->where('status', 'processing')->count()),
            Stat::make('Pedidos Enviados', Order::query()->where('status', 'shipped')->count()),
            Stat::make('Precio Promedio', Number::currency(Order::query()->avg('grand_total'), 'S/.')),
        ];
    }
}
