<div class="sidebar">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a class="simple-text logo-mini">{{ __('Uitm') }}</a>
            <a class="simple-text logo-normal">{{ __('Database') }}</a>
        </div>
        <ul class="nav">
            <li>
                <a href="{{ route('home') }}">
                    <i class="tim-icons icon-chart-pie-36"></i>
                    <p>{{ __('Dashboard') }}</p>
                </a>
            </li>
            <li>
                <a href="{{ route('house.index') }}">
                    <i class="tim-icons icon-istanbul"></i>
                    <p>{{ __('House') }}</p>
                </a>
            </li>
            <li>
                <a href="{{ route('landlord.index') }}">
                    <i class="tim-icons icon-key-25"></i>
                    <p>{{ __('Landlord') }}</p>
                </a>
            </li>
            <li>
                <a href="{{ route('student.index') }}">
                    <i class="tim-icons icon-single-02"></i>
                    <p>{{ __('Student') }}</p>
                </a>
            </li>
        </ul>
    </div>
</div>
