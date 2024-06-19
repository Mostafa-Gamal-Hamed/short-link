<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Spatie\Navigation\Navigation;
use Spatie\Navigation\Section;

class NavigationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->resolving(Navigation::class, function (Navigation $navigation): Navigation {
            return $navigation
                ->add('عن الشركة', url('عن الشركة'))
                ->add('تواصل معنا', url('تواصل معنا'))
                ->add('Home', url('home'))
                ->addIf(
                    Auth::user()->role,
                    'admin',
                    route('addPage'),
                    fn (Section $section) => $section->add('addPage', route('addPage'))
            );
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
