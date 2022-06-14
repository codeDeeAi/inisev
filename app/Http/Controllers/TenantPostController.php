<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use App\Models\TenantPost;
use Illuminate\Http\Request;

class TenantPostController extends Controller
{
    // Create new Tenant Post
    public function create(Request $request, $tenant)
    {
        # Validation
        $this->validate($request, [
            'title' => 'required|string',
            'post' => 'required|string'
        ]);

        if (Tenant::where('id', $tenant)->exists()) {

            ## Create new tenant post
            TenantPost::create([
                'title' => $request->title,
                'post' => $request->post
            ]);

            ## Response
            return response()->json(['message' => 'Post created successfully !'], 201);
        }

        abort(404);
    }
}
