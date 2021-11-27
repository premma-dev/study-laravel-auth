<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;

class FortifyServiceProvider extends ServiceProvider
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
        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

        RateLimiter::for('login', function (Request $request) {
            return Limit::perMinute(5)->by($request->email.$request->ip());
        });

        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });

        // function return login page
        Fortify::loginView(function () {
            return view('auth.login');
        });

        // function return register page
        Fortify::registerView(function () {
            return view('auth.register');
        });

        // reset password by enter email
        Fortify::requestPasswordResetLinkView(function () {
            return view('auth.request-reset-password');
        });

        // email reset link handler
        Fortify::resetPasswordView(function ($request) {
            // redirect to handle reset password page with request value
            return view('auth.handle-reset-password', ['request'=>$request]);
        });

        // email verification
        Fortify::verifyEmailView(function () {
            return view('auth.verify-email');
        });
    }
}
