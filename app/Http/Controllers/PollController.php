<?php

namespace App\Http\Controllers;

use App\Enums\PollStatus;
use App\Http\Requests\CreatePollRequest;
use App\Http\Requests\UpdatePollRequest;
use App\Http\Requests\VoteRequest;
use App\Models\Option;
use App\Models\Poll;
use App\Models\Vote;

class PollController extends Controller
{
    public function store(CreatePollRequest $request)
    {
        $poll = auth()->user()->polls()->create($request->safe()->except('options'));

        $poll->options()->createMany($request->options);

        return back();
    }

    public function index()
    {
        $polls = auth()->user()->polls()->select('title', 'start_at', 'end_at', 'status', 'id')->paginate(10);

        return view('Votting.index', compact('polls'));
    }

    public function edit(Poll $poll)
    {
        abort_if(auth()->user()->isNot($poll->user), 403);
        abort_if($poll->status != PollStatus::PENDING->value, 404);

        $poll = $poll->load('options');
        return view('polls.update', compact('poll'));
    }

    public function update(UpdatePollRequest $request, Poll $poll)
    {

        $data = $request->safe()->except('options');

        $poll->update($data);

        $poll->options()->delete();

        $poll->options()->createMany($request->options);

        return to_route('poll.index');
    }

    public function delete(Poll $poll)
    {
        if ($poll->status != PollStatus::PENDING->value) {
            abort(404, 'No Pending poll');
        }

        $poll->options()->delete();

        $poll->delete();

        return back();
    }

    public function show(Poll $poll)
    {
        $poll = $poll->load('options');

        $selectedOption = $poll->votes()->where('user_id', auth()->id())->first()?->option_id;

        if ($poll->user->is(auth()->user())) {
            return view('Votting.show', compact('poll', 'selectedOption'));
        }

        abort_if($poll->status != PollStatus::STARTED->value, 404);


        return view('Votting.show', compact('poll', 'selectedOption'));
    }

    public function vote(VoteRequest $request, Poll $poll)
    {

        abort_if($poll->status != PollStatus::STARTED->value, 404);
        $selectedOption = $poll->votes()->where('user_id', auth()->id())->first()->option;

        $poll->votes()->updateOrCreate(['user_id' => auth()->id()], ['option_id' => $request->option_id]);

        $newOption =  Option::find($request->option_id);
        $newOption->increment('votes_count');

        if ($selectedOption) {
            $selectedOption->decrement('votes_count');
        }

        $selectedOption = $newOption;
        return back();
    }
}
