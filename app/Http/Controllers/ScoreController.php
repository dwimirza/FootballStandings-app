<?php

namespace App\Http\Controllers;

use App\Models\Score;
use Illuminate\Http\Request;
use App\Models\Club;
use App\Models\Standings;

class ScoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clubs = Club::all();
        return view('score.index', compact('clubs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
    $validatedData = $request->validate([
        'club1.*' => 'required',
        'club2.*' => 'required',
        'score1.*' => 'required',
        'score2.*' => 'required',
    ]);

    foreach ($validatedData['club1'] as $key => $club1) {
        $club2 = $validatedData['club2'][$key];
        $score1 = $validatedData['score1'][$key];
        $score2 = $validatedData['score2'][$key];

        // Create the score entry
        Score::create([
            'club1' => $club1,
            'club2' => $club2,
            'score1' => $score1,
            'score2' => $score2,
        ]);

        // Update standings for club1
        $this->updateStandings($club1, $score1, $score2);
        
        // Update standings for club2
        $this->updateStandings($club2, $score2, $score1);
    }

    return redirect('/home');
}

private function updateStandings($club, $scoreFor, $scoreAgainst)
{
    $standings = Standings::where('club', $club)->first();
    
    // Update played games
    $standings->played += 1;
    
    // Update goals for and against
    $standings->goals_for += $scoreFor;
    $standings->goals_against += $scoreAgainst;

    // Calculate points based on the result
    if ($scoreFor > $scoreAgainst) {
        // Club won
        $standings->won += 1;
        $standings->points += 3;
    } elseif ($scoreFor == $scoreAgainst) {
        // Club drew
        $standings->drawn += 1;
        $standings->points += 1;
    } else {
        // Club lost
        $standings->lost += 1;
    }

    $standings->save();
}



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Score  $score
     * @return \Illuminate\Http\Response
     */
    public function show(Score $score)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Score  $score
     * @return \Illuminate\Http\Response
     */
    public function edit(Score $score)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Score  $score
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Score $score)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Score  $score
     * @return \Illuminate\Http\Response
     */
    public function destroy(Score $score)
    {
        //
    }
}
