<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index(Request $request)
    {
        if (isset($request->reservoir_id) && $request->reservoir_id !== "")
            $members = Member::where('reservoir_id', $request->reservoir_id)->orderBy('surname')->get();
        else
            $members = Member::orderBy('surname')->get();


        $reservoirs = \App\Models\Reservoir::orderBy('id')->get();

        return view('members.index', ['members' => $members, 'reservoirs' => $reservoirs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $reservoirs = \App\Models\Reservoir::orderBy('id')->get();
        return view('members.create', ['reservoirs' => $reservoirs]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'name' => 'required | max: 100 ',
                'surname' => 'required | max: 150',
                'live' => 'required | max: 50',
                'experience' => 'required ',
                'registered' => 'required ',
                'reservoir_id' => 'required',


            ]
        );
        $members = new Member();
        $members->fill($request->all());
        $members->save();
        return redirect()->route('member.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {
        $reservoirs = \App\Models\Reservoir::orderBy('title')->get();
        return view('members.edit', ['member' => $member, 'reservoirs' => $reservoirs]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Member $member)
    {
        $this->validate(
            $request,
            [
                'name' => 'required | max: 100 ',
                'surname' => 'required | max: 150',
                'live' => 'required | max: 50',
                'experience' => 'required ',
                'registered' => 'required ',
                'reservoir_id' => 'required',
            ]
        );
        $member->fill($request->all());
        $member->save();
        return redirect()->route('member.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        $member->delete();
        return redirect()->route('member.index');
    }
}
