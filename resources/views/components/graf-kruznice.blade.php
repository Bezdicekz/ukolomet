<div class="flex relative justify-center text-ctprim">
    <svg width="120" height="120" viewBox="0 0 42 42" class="donut">
    <circle class="donut-ring " cx="21" cy="21" r="15.91549431" fill="transparent" stroke="#d2d3d4" stroke-width="3"></circle>

    <circle class="donut-segment" cx="21" cy="21" r="15.91549431" fill="transparent" stroke="currentColor" stroke-width="3"
    stroke-dasharray="{{ $percentage }} {{ 100 - $percentage }}" stroke-dashoffset="25"></circle>

    <div class="absolute top-1/2 left-1/2 text-sm font-semibold transform -translate-x-1/2 -translate-y-1/2 text-center text-ctprim">
    <p >{{ $text1 }}</p>
    <p>{{ round($value, 2) }} {{ $text2 }}</p>
    </div>
</svg>
</div>