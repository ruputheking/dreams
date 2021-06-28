<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * This is used by Laravel authentication to redirect users after login.
     *
     * @var string
     */
    public const HOME = '/dashboard';

    /**
     * The controller namespace for the application.
     *
     * When present, controller route declarations will automatically be prefixed with this namespace.
     *
     * @var string|null
     */
    // protected $namespace = 'App\\Http\\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            Route::prefix('api')
                ->middleware('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/web.php'));

            Route::model('news', \App\Models\Post::class);
            Route::model('tag', \App\Models\Tag::class);
            Route::model('category', \App\Models\Category::class);

            // Event
            Route::model('event', \App\Models\Event::class);

            // Notice
            Route::model('notice', \App\Models\Notice::class);

            // Course
            Route::model('course', \App\Models\Course::class);
            Route::model('coursecategory', \App\Models\CourseCategory::class);

            // Job
            Route::model('job', \App\Models\Job::class);

            // Folder
            Route::model('folder', \App\Models\Folder::class);

            // user
            Route::model('user', \App\Models\User::class);

            // Faculty Category
            Route::model('team_category', \App\Models\FacultyCategory::class);
            Route::model('team_member', \App\Models\FacultyMember::class);
            Route::model('application', \App\Models\Application::class);

            // FrontDesk
            Route::model('complaint', \App\Models\Complain::class);
            Route::model('visitor', \App\Models\Visitor::class);
            Route::model('dispatch', \App\Models\PostalReceive::class);
            Route::model('generalcall', \App\Models\PhoneCallLog::class);
            Route::model('student_request', \App\Models\StudentRequest::class);
        });
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by(optional($request->user())->id ?: $request->ip());
        });
    }
}
