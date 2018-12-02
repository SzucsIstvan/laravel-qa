<span class="text-muted">{{ $label }} {{ $model->created_date }}</span>
<div class="media mt-2">
    <a class="pr-2" href="{{ $model->user->url }}">
        <img class="media-object" src="{{ $model->user->avatar }}" alt="">
    </a>
    <div class="media-body mt-1">
        <a href="{{ $model->user->url }}">{{ $model->user->name }}</a>
    </div>
</div>
