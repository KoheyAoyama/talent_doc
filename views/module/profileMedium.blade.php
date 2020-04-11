<div class="p-profileMedium">
    <div>
        <p><img class="p-profileMedium__image" src="{{ $profile_img }}" alt=""></p>
    </div>
    <div>
        <p class="p-profileMedium__name">{{ $talent_name }}</p>
        @if ( $office )
            <p class="p-profileMedium__office">{{ $office }}</p>
        @endif
        <div class="p-profileMedium__starRating">
            <div class="p-profileMedium__starRating--front" style="{{ $rating_setting }}">★★★★★</div>
            <div class="p-profileMedium__starRating--back">★★★★★</div>
        </div>
    </div>
</div>