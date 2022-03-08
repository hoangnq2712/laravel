<?php

namespace App\Http\Controllers;

use App\Models\Phone;
use App\Models\Role;
use App\Models\RoleUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EloquentController extends Controller
{
    public function createData()
    {
        User::whereNotNull('id')->delete();
        Phone::whereNotNull('id')->delete();
        Role::whereNotNull('id')->delete();
        RoleUser::whereNotNull('user_id')->delete();
        User::query()->insert(
            [
                [
                    'id' => 1,
                    'first_name' => 'Nguyen',
                    'last_name' => 'Trung',
                    'password' => Hash::make(123456)
                ],
                [
                    'id' => 2,
                    'first_name' => 'Tran',
                    'last_name' => 'Quan',
                    'password' => Hash::make(123456)
                ],
                [
                    'id' => 3,
                    'first_name' => 'Pham',
                    'last_name' => 'Anh',
                    'password' => Hash::make(123456)
                ]
            ]
        );

        Phone::query()->insert([
            [
                'id' => 1,
                'number' => 123,
                'user_id' => 1
            ], [
                'id' => 2,
                'number' => 123123,
                'user_id' => 2
            ], [
                'id' => 3,
                'number' => 123123123,
                'user_id' => 3
            ]
        ]);

        Role::query()->insert([
            [
                'id' => 1,
                'name' => 'admin',
            ], [
                'id' => 2,
                'name' => 'user',
            ]
        ]);

        RoleUser::query()->insert([
            [
                'id' => 1,
                'user_id' => 1,
                'role_id' => 2
            ], [
                'id' => 2,
                'user_id' => 2,
                'role_id' => 2
            ], [
                'id' => 3,
                'user_id' => 3,
                'role_id' => 1
            ]
        ]);

        return 'Tạo dữ liệu test thành công.';
    }

    /**
     * Eloquent 1
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function eloquent1(Request $request)
    {
        $userQuery = User::query();
        if (isset($request->key)) {
            $userQuery->where('id', $request->key)
                ->orWhere('first_name', $request->key)
                ->orWhere('last_name', $request->key);
        }

        $dataSearch = $userQuery->orderBy('id', 'DESC')->get();

        return view('eloquent.search', compact('dataSearch'));
    }

    /**
     * Eloquent 2
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function eloquent2(Request $request)
    {
        $keySearch = $request->only([
            'user_id',
            'phone',
            'role_name'
        ]);

        $userQuery = User::query();
        if (!empty($keySearch['user_id'])) {
            $userQuery->where('id', $keySearch['user_id']);
        }
        if (!empty($keySearch['phone'])) {
            $phone = Phone::query()
                ->where('number', $keySearch['phone'])
                ->first();
            $userQuery->where('id', $phone->user_id ?? '');
        }
        if (!empty($keySearch['role_name'])) {
            $role = Role::query()
                ->where('name', $keySearch['role_name'])
                ->first();

            $userIdsByRole = RoleUser::query()->where('role_id', $role->id ?? '')
                ->get()
                ->pluck('user_id');

            $userQuery->whereIn('id', $userIdsByRole ?? '');
        }

        $dataSearch = $userQuery->get();
        return view('eloquent.search', compact('dataSearch'));
    }
}
