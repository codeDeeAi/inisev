<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TenantController extends Controller
{
    // Create new tenant
    public function create(Request $request)
    {
        # Validation
        $this->validate($request, [
            'name' => 'required|string|unique:tenants,name,except,id'
        ]);

        ## Generate Token
        $token = Str::random(10);

        ## Create new tenant
        $tenant = Tenant::create([
            'name' => $request->name,
            'token' => $token
        ]);

        ## Response
        return response()->json(['message' => 'Tenant created !', 'tenant_id' => $tenant->id], 200);
    }
}
