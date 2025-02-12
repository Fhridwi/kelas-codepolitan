<?php

namespace App\Views\Composers;

use Illuminate\View\View;

class MenuComposer
{
    public function compose(View $view)
    {
        $menu = [
            'Home' => '/',
            'About' => '/about',
            'Contact' => '/contact',
        ];

        $auth = true;

        if ($auth) {
            $menu = array_merge($menu, [
                'Logout' => '/logout',
                'Profile' => '/profile',
                'Dashboard' => '/dashboard'
            ]);
        }

        // Mengirimkan data menu ke view
        $view->with('menu', $menu);
    }
}
