<?php

namespace Republicas\Http\Controllers;

use Illuminate\Http\Request;

use Republicas\Http\Requests;
use Republicas\Http\Controllers\Controller;
use Republicas\Models\Republic;
use Republicas\Models\Notice;

class NoticeController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $repId)
    {
        $notice = Notice::create($request->all());

        return redirect()->route('home', $repId);
    }

    public function edit($repId, $noticeId)
    {
        $notice = Notice::findOrFail($noticeId);
        $republica = $notice->republic;

        return view('notices.edit', compact('notice', 'republica'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $repId, $noticeId)
    {
        $notice = Notice::findOrFail($noticeId);
        $notice->update($request->all());

        return redirect()->route('home', $repId);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
