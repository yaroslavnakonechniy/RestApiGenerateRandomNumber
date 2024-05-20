<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RandomNumber;
use Illuminate\Support\Str;

class RandomNumberController extends Controller
{
    public function generate()
    {
        $randomNumber = rand(1, 50);
        $id = (string) Str::uuid();

        $number = RandomNumber::create([
            'id' => $id,
            'number' => $randomNumber
        ]);

        return response()->json(['id' => $number->id], 201);
    }

    public function retrieve($id)
    {
        $number = RandomNumber::find($id);

        if (!$number) {
            return response()->json(['error' => 'ID not found'], 404);
        }

        return response()->json(['id' => $number->id, 'number' => $number->number]);
    }
}
