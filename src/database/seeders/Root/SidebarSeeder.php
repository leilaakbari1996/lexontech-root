<?php

namespace Lexontech\Root\database\seeders\Root;

use Illuminate\Database\Seeder;
use Lexontech\Root\app\Models\RootSidebar;

class SidebarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $menu = RootSidebar::updateOrCreate([
            'Name'      => 'کاربران',
        ],[
            'parent_id' => null,
            'Url'       => null
        ]);

        RootSidebar::updateOrCreate([
            'Name'      => 'ایجاد کاربر',
        ],[
            'parent_id' => $menu->id,
            'Url'       => '/panel/users/create'
        ]);

        RootSidebar::updateOrCreate([
            'Name'      => 'لیست کاربران',
        ],[
            'parent_id' => $menu->id,
            'Url'       => '/panel/users'
        ]);

        $menu = RootSidebar::updateOrCreate([
            'Name'      => 'سرویس ها',
        ],[
            'parent_id' => null,
            'Url'       => null,
        ]);

        RootSidebar::updateOrCreate([
            'Name'      => 'ایجاد سرویس جدید',
        ],[
            'parent_id' => $menu->id,
            'Url'       => '/panel/services/create'
        ]);

        RootSidebar::updateOrCreate([
            'Name'      => 'لیست سرویس ها',
        ],[
            'parent_id' => $menu->id,
            'Url'       => '/panel/services'
        ]);

        $menu = RootSidebar::updateOrCreate([
            'Name'      => 'منو ها',
        ],[
            'parent_id' => null,
            'Url'       => null
        ]);

        RootSidebar::updateOrCreate([
            'Name'      => 'ایجاد منو جدید',
        ],[
            'parent_id' => $menu->id,
            'Url'       => '/panel/menus/create'
        ]);

        RootSidebar::updateOrCreate([
            'Name'      => 'لیست منو ها',
        ],[
            'parent_id' => $menu->id,
            'Url'       => '/panel/menus'
        ]);

        $sidebar = RootSidebar::updateOrCreate([
            'Name'      => 'تنظیمات',
        ],[
            'parent_id' => null,
            'Url'       => '/panel/settings'
        ]);
        RootSidebar::updateOrCreate([
            'Name'      => 'لیست',
        ],[
            'parent_id' => $sidebar->id,
            'Url'       => '/panel/settings'
        ]);
    }
}
