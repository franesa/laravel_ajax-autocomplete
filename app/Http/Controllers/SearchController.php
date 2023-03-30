<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\JsonResponse;

class SearchController extends Controller
{
    public function index(): View
    {
        return view("searchDemo");
    }

    public function autocomplete(Request $request): JsonResponse
    {
        $data = [];

        if ($request->filled('q')) {
            $data = User::select("name", "id")
                ->where("name", "LIKE", "%" . $request->get("q") . "%")
                ->get();
        }
        return response()->json($data);
    }
}
