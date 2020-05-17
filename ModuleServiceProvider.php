<?php namespace DVThemes\Cavoni;

use Illuminate\Support\ServiceProvider;
use VnSource\Traits\ModuleServiceProviderTrait;

class ModuleServiceProvider extends ServiceProvider
{
    use ModuleServiceProviderTrait;

    protected $isTheme = true;
    protected $gadgetGroup = [
        'home.top' => 'Homepage top area',
        'comment' => 'Comment area'
    ];

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->initializationModule();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {

    }
}
