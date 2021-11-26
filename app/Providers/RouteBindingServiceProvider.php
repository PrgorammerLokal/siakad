<?php

namespace App\Providers;

use App\Models\Prodi;
use mmghv\LumenRouteBinding\RouteBindingServiceProvider as BaseServiceProvider;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class RouteBindingServiceProvider extends BaseServiceProvider
{
    /**
     * Boot the service provider
     */
    public function boot()
    {
        // The binder instance
        $binder = $this->binder;

        // Using a closure
        $binder->bind('prodi', 'App\Models\Prodi', function ($e) {
            try {
                return new \App\Models\Prodi();
            } catch (NotFoundHttpException $e) {
                return $e;
            }
        });

        // $binder->compositeBind('prodi', function ($prodi) {
        //     $post = \App\Models\Prodi::findOrFail($prodi);
        //     return [$post];
        // });
        // $binder->implicitBind('App\Models');
        // $binder->bind('prodi', function ($prodi) {
        //     return Prodi::find($prodi);
        // });
    }
}
