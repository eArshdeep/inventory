<nav>
    <div class="nav-wrapper teal">
      {{-- Brand logo --}}
      <a href="{{ url('/') }}" class="brand-logo center">
        {{ config('app.name', 'Inventory') }}
      </a>
      {{-- Back button --}}
      @if( !empty($context['show_back']) && !empty($context['back_url']) )
        <ul class="left">
          <li>
            <a href="{{$context['back_url']}}">
              <i class="material-icons">arrow_back</i>
            </a>
          </li>
        </ul>
      @endif
    </div>
</nav>