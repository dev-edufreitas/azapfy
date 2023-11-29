<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\NotaFiscal;
use App\Policies\NotaFiscalPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        NotaFiscal::class => NotaFiscalPolicy::class,
    ];

    public function boot(): void
    {
        $this->registerPolicies();
    }
}
