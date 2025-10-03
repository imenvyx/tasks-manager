<?php

namespace App\Http\Controllers;

use App\Http\Requests\KeywordRequest;
use App\Http\Resources\KeywordResource;
use App\Models\Keyword;

class KeywordController extends Controller
{
    public function index()
    {
        return KeywordResource::collection(Keyword::orderBy('name')->get());
    }

    public function store(KeywordRequest $request)
    {
        $keyword = Keyword::create(['name' => $request->name]);
        return new KeywordResource($keyword);
    }
}
