<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Participant as Member;

class MemberController extends Controller
{
    public function index(Request $request)
    {
        $members = Member::orderBy('name', 'asc')->paginate();
        return view('pages.admin.member.index', compact('members', 'request'));
    }

    public function show(Member $member)
    {
        return view('pages.admin.member.show', compact('member'));
    }

    public function edit(Member $member)
    {
        return view('pages.admin.member.edit', compact('member'));
    }

    public function update(Request $request, Member $member)
    {
        dd($request->all());
    }

    public function destroy(Member $member)
    {
        $member->delete();
        return redirect()->back()->withSuccess('Member has been deleted.');
    }
}
