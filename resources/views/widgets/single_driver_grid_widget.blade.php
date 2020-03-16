<div class="col-md-3">
    <div class="agent">
        <div class="img">
            <img src="{{ $config['image'] ?? 'https://placehold.it/400x600' }}" class="img-fluid" alt="{{ $config['name'] ?? 'Driver name' }}">
        </div>
        <div class="desc">
            <h3><a href="#">{{ $config['name'] ?? 'Driver name' }}</a></h3>
            <p class="h-info"><span class="location">Pengalaman</span> <span class="details">&mdash; {{ $config['experience'] ?? 'pengalaman driver' }}</span></p>
        </div>
    </div>
</div>
