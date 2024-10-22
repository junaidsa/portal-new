<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Blade;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot()
    {
        Blade::directive('module', function ($expression) {
            return "<?php if (\\App\\Http\\Services\\ModuleService::can_access_module($expression)): ?>";
        });

        Blade::directive('endmodule', function () {
            return '<?php endif; ?>';
        });
    }
}
