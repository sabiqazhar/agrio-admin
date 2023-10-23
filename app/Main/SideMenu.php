<?php

namespace App\Main;

class SideMenu
{
    /**
     * List of side menu items.
     */
    public static function menu(): array
    {
        return [
            'home' => [
                'icon' => 'Home',
                'route_name' => 'dashboard',
                'params' => [
                    'layout' => 'side-menu'
                ],
                'title' => 'Dashboard'
            ],
            'store' => [
                'icon' => 'shopping-cart',
                'route_name' => 'store.list',
                'params' => [
                    'layout' => 'side-menu'
                ],
                'title' => 'Toko'
            ],
            'owner' => [
                'icon' => 'user',
                'route_name' => 'owner.index',
                'params' => [
                    'layout' => 'side-menu'
                ],
                'title' => 'Pemilik'
            ],
            'users' => [
                'icon' => 'users',
                'route_name' => 'admin.index',
                'params' => [
                    'layout' => 'side-menu'
                ],
                'title' => 'Admin',
                'roles' => ['super_admin']
            ],
        ];
    }
}
