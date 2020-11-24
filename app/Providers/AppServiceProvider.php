<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Resources\Json\Resource;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Schema;
use \Maatwebsite\Excel\Sheet;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        // Sheet::macro('styleCells', function (Sheet $sheet, string $cellRange, array $style) {
        //     $sheet->getDelegate()->getStyle($cellRange)->applyFromArray($style);
        // });

        Resource::withoutWrapping();

        Schema::defaultStringLength(191);
    }
}
