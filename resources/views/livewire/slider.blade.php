<div class="slider-center-wrapper">
    <div class="image-slider-container loading" id="imageSlider">

        <div class="progress-container">
            <div class="progress-bar" id="progressBar"></div>
        </div>

        <div class="slider-wrapper">
            <div class="slide-track" id="slideTrack">
                @foreach(array_slice($images, 0, 4) as $index => $image)
                    <div class="image-slide {{ $index === 0 ? 'active' : '' }}">
                        <img src="{{ $image['url'] }}"
                             class="slide-image"
                             loading="{{ $index === 0 ? 'eager' : 'lazy' }}">
                        <div class="slide-overlay"></div>
                    </div>
                @endforeach
            </div>
        </div>

        <button class="nav-arrow prev" id="prevBtn"></button>
        <button class="nav-arrow next" id="nextBtn"></button>

        <div class="slide-indicators">
            @foreach(array_slice($images, 0, 4) as $i => $img)
                <div class="indicator-dot {{ $i === 0 ? 'active' : '' }}" data-slide="{{ $i }}"></div>
            @endforeach
        </div>
    </div>
</div>
