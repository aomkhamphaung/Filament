<?php

namespace App\Filament\Widgets;

use App\Models\User;
use Carbon\Carbon;
use Filament\Widgets\BarChartWidget;

class UsersChart extends BarChartWidget
{
    protected static ?string $heading = 'Users';

    protected function getData(): array
    {
        //Dummy Data

        return [
            'datasets' => [
                [
                    'label' => 'Blog posts created',
                    'data' => [0, 10, 5, 2, 21, 32, 45, 74, 65, 45, 77, 89],
                ],
            ],
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        ];

        // Real Data

        // $users = User::select('created_at')->get()->groupBy(function($users){
        //     return Carbon::parse($users->created_at)->format('F');
        // });
        // $quantities = [];
        // foreach($users as $user => $value){
        //     array_push($quantities, $value->count());
        // }
        // return [
        //     'datasets' => [
        //         [
        //             'labels' => 'User Joined',
        //             'data' => $quantities,
        //             'backgroundColor' => [
        //                 'rgba(255, 99, 132, 0.2)',
        //                 'rgba(255, 159, 64, 0.2)',
        //                 'rgba(255, 205, 86, 0.2)',
        //                 'rgba(75, 192, 192, 0.2)',
        //                 'rgba(54, 162, 235, 0.2)',
        //                 'rgba(153, 102, 255, 0,2)',
        //                 'rgba(201, 203, 207, 0.2)'
        //             ],
        //             'borderColor' => [
        //                 'rgb(255, 99, 132)',
        //                 'rgb(255, 159, 64)',
        //                 'rgb(255, 205, 86)',
        //                 'rgb(75, 192, 192)',
        //                 'rbg(54, 162, 235)',
        //                 'rgb(153, 102, 255)',
        //                 'rgb(201, 203, 207)'
        //             ],
        //             'borderWidth' => 1
        //         ],
        //     ],
        //     'labels' => $users->keys(),
        // ];
    }
}
