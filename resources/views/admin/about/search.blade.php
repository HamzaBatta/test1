@if($abouts->isNotEmpty())
    @foreach ($abouts as $about)
        <div class="post-list">
            <p>{{ $about->en_title }}</p>
        </div>
    @endforeach
@else
    <div>
        <h2>No abouts found</h2>
    </div>
@endif
