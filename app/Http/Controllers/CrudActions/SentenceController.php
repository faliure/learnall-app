<?php

namespace App\Http\Controllers\CrudActions;

use App\Http\Resources\SentenceResource;
use App\Models\Sentence;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SentenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return SentenceResource::collection(
            Sentence::with('language')->get()
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sentence = Sentence::create($request->all());

        return $this->show($sentence);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sentence  $sentence
     * @return \Illuminate\Http\Response
     */
    public function show(Sentence $sentence)
    {
        return new SentenceResource($sentence);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sentence  $sentence
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sentence $sentence)
    {
        $sentence->update($request->all());

        return $this->show($sentence);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sentence  $sentence
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sentence $sentence)
    {
        $sentence->delete();

        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
