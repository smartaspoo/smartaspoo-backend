<?php 
namespace App\Providers;

/**
* ServiceProvider
*
*/
class ModuleViewServiceProvider extends \Illuminate\Support\ServiceProvider
{
    /**
     *
     *
     * 
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../Modules/Employee/Views', 'Employee');
        $this->loadViewsFrom(__DIR__.'/../Modules/Dashboard/Views', 'Dashboard');
        $this->loadViewsFrom(__DIR__.'/../Modules/Menu/Views', 'Menu');
        $this->loadViewsFrom(__DIR__.'/../Modules/User/Views', 'User');
        $this->loadViewsFrom(__DIR__.'/../Modules/Role/Views', 'Role');
        $this->loadViewsFrom(__DIR__.'/../Modules/Permission/Views', 'Permission');
        $this->loadViewsFrom(__DIR__.'/../Modules/Module/Views', 'Module');

        $this->loadViewsFrom(__DIR__.'/../Modules/Penjualan/Views', 'Penjualan');
        $this->loadViewsFrom(__DIR__.'/../Modules/DataBarang/Views', 'DataBarang');
        $this->loadViewsFrom(__DIR__.'/../Modules/Diskon/Views', 'Diskon');
        $this->loadViewsFrom(__DIR__.'/../Modules/Pembelian/Views', 'Pembelian');
        $this->loadViewsFrom(__DIR__.'/../Modules/Satuan/Views', 'Satuan');
        $this->loadViewsFrom(__DIR__.'/../Modules/KategoriBarang/Views', 'KategoriBarang');
        $this->loadViewsFrom(__DIR__.'/../Modules/Portal/Views', 'Portal');
        $this->loadViewsFrom(__DIR__.'/../Modules/InputSCM/Views', 'InputSCM');
        
        // VIEW_MARKER
        // Add view in the line below (DONT REMOVE THIS SECTION !!!!!!, because this line is LINE_MARKER used by Module Generator)
    }
}