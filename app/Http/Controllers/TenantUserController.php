<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use App\Models\User;
use Illuminate\Http\Request;

class TenantUserController extends Controller
{
    // Create new user
    public function create(Request $request, $tenant)
    {
        # Validation
        $this->validate($request, [
            'email' => 'required|email|unique:users,email,except,id'
        ]);

        if (Tenant::where('id', $tenant)->exists()) {

            ## Create new tenant
            User::create([
                'email' => $request->email,
                'tenant_id' => $tenant
            ]);

            ## Response
            return response()->json(['message' => 'User subscription successful !'], 201);
        }

        abort(404);
    }
}
