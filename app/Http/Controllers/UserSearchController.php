<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UserSearchController extends Controller
{


    public function search(Request $request)
    {

        $query = $request->input('q');


        $authUser = Auth()->user()->id;
        $authUserType = Auth()->user()->user_type;

        if ($authUserType === 'estudiante') {
            $users = User::where(function ($queryBuilder) use ($query) {
                $queryBuilder->where('name', 'like', "%$query%")
                    ->orWhere('last_name_1', 'like', "%$query%")
                    ->orWhere('last_name_2', 'like', "%$query%");
            })
                ->where('id', '!=', $authUser)
                ->where('name', '!=', 'admin')
                ->where('user_type', '=', 'docente')
                ->get();
        } else {
            $users = User::where(function ($queryBuilder) use ($query) {
                $queryBuilder->where('name', 'like', "%$query%")
                    ->orWhere('last_name_1', 'like', "%$query%")
                    ->orWhere('last_name_2', 'like', "%$query%");
            })
                ->where('id', '!=', $authUser)
                ->where('name', '!=', 'admin')
                ->get();
        }


        return response()->json(['users' => $users]);

    }
}
