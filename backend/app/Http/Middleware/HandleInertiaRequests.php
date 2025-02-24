<?php

namespace App\Http\Middleware;

use App\Http\Resources\AuthenticatedUserResource;
use App\Models\Mail;
use App\Models\Permission;
use App\Models\Setting;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Inertia\Middleware;
use Illuminate\Support\Facades\Gate;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that is loaded on the first page visit.
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determine the current asset version.
     */
    public function version(Request $request): string|null
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @return array<string, mixed>
     */
    public function share(Request $request): array
    {
        return [
            ...parent::share($request),
            'flash' => [
                'success' => fn() => $request->session()->get('success'),
                'error' => fn() => $request->session()->get('error'),
                'warning' => fn() => $request->session()->get('warning'),
                'info' => fn() => $request->session()->get('info'),
                'time' => fn() => $request->session()->get('time'),
            ],
            'auth' => [
                'user' => $request->user(),
                'image' => $request->user() ? asset('storage/images/' . $request->user()->image) ?? $request->user()->gravatar($request->user()->email) : "",
                'can' => $request->user() ? $request->user()->getPermissionArray() : [],
            ],
            'notifications' => [
                'mail' => Mail::select(['id', 'full_name', 'message', 'created_at'])
                    ->where('status', 'unread')
                    ->latest()
                    ->take(10)
                    ->get()
                    ->map(function ($mail) {
                        return [
                            'id' => $mail->id,
                            'full_name' => $mail->full_name,
                            'message' => $mail->message,
                            'time_ago' => Carbon::parse($mail->created_at)->diffForHumans(),
                        ];
                    }),
                'count' => Mail::where('status', 'unread')->count()
            ],
            'popular' => [
                // 'insight' => Insight::select(['id', 'slug', 'title'])
                //     ->where('status', 'publish')
                //     // ->popularThisMonth(6)
                //     ->get(),
                // 'insight_latest' => Insight::query()
                //     ->where('status', 'publish')
                //     ->latest()
                //     ->take(6)->get(['id', 'title', 'slug']),
            ],
            'footer' => [
                'email' => Setting::where('key', 'email')->value('value'),
                'phone' => Setting::where('key', 'phone')->value('value'),
                'address' => Setting::where('key', 'address')->value('value'),
                'linkedin_url' => Setting::where('key', 'linkedin_url')->value('value'),
                'about' => Setting::where('key', 'about')->value('value'),
                'footer' => Setting::where('key', 'footer')->value('value'),
            ],
            'locale' => function () {
                if (session()->has('locale')) {
                    app()->setLocale(session('locale'));
                } else {
                    Session::put('locale', 'en');
                }
                return app()->getLocale();
            },
            'language' => function () {
                $lang = __('app');
                return response()->json($lang);
            },
        ];
    }
}
