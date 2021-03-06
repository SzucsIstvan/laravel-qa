@if ($model instanceof App\Question)
    @php
        $name = "question";
        $firstURISegment = "questions";

    @endphp
@elseif ($model instanceof App\Answer)
    @php
    $name = "answer";
    $firstURISegment = "answer";
    @endphp
@endif

@php
    $formId = $name . "-" . $model->id;
    $formAction = "/{$firstURISegment}/{$model->id}/vote";
@endphp
<div class="vote-controls">
    <a title="This {{ $name }} is useful"
        class="vote-up {{Auth::guest() ? "off" : "" }}"
        onclick="event.preventDefault(); document.getElementById('up-vote-{{ $name }}-{{ $model->id }}').submit()"
        >

        <i class="fas fa-caret-up fa-2x"></i>
    </a>
    <form id="up-vote-{{ $formId }}" action="{{ $formAction }}" method="post" style="display: none;">
        @csrf
        <input type="hidden" nFavoriteame="vote" value="1" />
    </form>
    <span class="votes-count">{{ $model->votes_count }}</span>
    <a title="This {{ $name }} is not useful"
        class="vote-down {{Auth::guest() ? "off" : "" }}"
        onclick="event.preventDefault(); document.getElementById('down-vote-{{ $name }}-{{ $model->id }}').submit()"
        >
        <i class="fas fa-caret-down fa-2x"></i>
    </a>
    <form id="down-vote-{{ $formId }}" action="{{ $formAction }}" method="post" style="display: none;">
        @csrf
        <input type="hidden" name="vote" value="-1" />
    </form>

    @if ($model instanceof App\Question)
        <favorite :question="{{ $model }}"></favorite>
    @elseif ($model instanceof App\Answer)
        <accept :answer="{{ $model }}"></accept>
    @endif
</div>
