<div class="col-md-4">
    <div class="card mini-stats-wid">
        <div class="card-body">
            <div class="media">
                @if(isset($title) || isset($price))
                <div class="media-body">
                    @if(isset($title)) <p class="text-muted font-weight-medium">{{ $title }}</p> @endif
                    @if(isset($price))<h4 class="mb-0">{{ $price }}</h4> @endif
                </div>
                @endif
                @if(isset($icon)) <div class="mini-stat-icon avatar-sm rounded-circle bg-primary align-self-center"
                    style="flex-grow: unset;">
                    <span class="avatar-title">
                        <i class="{{ $icon }}"></i>
                    </span>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>