<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UserContribution;
use Illuminate\Http\Request;

class ContributionController extends Controller
{
    public function index(Request $request)
    {
        $contributions = UserContribution::paginate(10);
        $selectedContribution = null;

        if ($request->has('id')) {
            $selectedContribution = UserContribution::find($request->id);
        }

        return view('admin.contribution', compact('contributions', 'selectedContribution'));
    }
}
