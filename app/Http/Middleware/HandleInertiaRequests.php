<?php

namespace App\Http\Middleware;

use App\Models\NavigationItem;
use Illuminate\Http\Request;
use Inertia\Middleware;

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
   *
   * @param  \Illuminate\Http\Request  $request
   * @return string|null
   */
  public function version(Request $request)
  {
    return parent::version($request);
  }

  /**
   * Define the props that are shared by default.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return array
   */
  public function share(Request $request)
  {
    return array_merge(parent::share($request), [
      // Pass the navigation items to the view.
      'nav.items' => fn () => NavigationItem::all() ?? [],
      'auth' => [
        'user' => function (Request $request) {
          // Add role to the user.
          $user =  $request->user();
          // Get roles for logged in users
          if(isset($user)) {
            $user->role = $user->role()->first();
          }
          return $user ?? null;
        },
      ],
    ]);
  }
}
