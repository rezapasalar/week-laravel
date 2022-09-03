@section('title', 'داشبورد')

<div>

    <div class="grid grid-cols-4 gap-4">

        @if(auth()->user()->isSuperAdmin())
            @livewire('admin.dashboard.categories-gauge')
        @endif

        @cans(['product:create', 'product:read', 'product:edit', 'product:delete'])
            @livewire('admin.dashboard.products-gauge')
        @endcans

        @if(auth()->user()->isSuperAdmin())
            @livewire('admin.dashboard.managers-gauge')
        @endcans

        @cans(['license:create', 'license:read', 'license:edit', 'license:delete'])
            @livewire('admin.dashboard.licenses-gauge')
        @endcans

        @cans(['representation:create', 'representation:read', 'representation:edit', 'representation:delete'])
            @livewire('admin.dashboard.representations-gauge')
        @endcans

        @cans(['employment:create', 'employment:read', 'employment:edit', 'employment:delete'])
            @livewire('admin.dashboard.employments-gauge')
        @endcans

        @cans(['contact:create', 'contact:read', 'contact:edit', 'contact:delete'])
            @livewire('admin.dashboard.contacts-gauge')
        @endcans

        @cans(['comment:create', 'comment:read', 'comment:edit', 'comment:delete'])
            @livewire('admin.dashboard.comments-gauge')
        @endcans

    </div>

    <div class="grid grid-cols-4 gap-4">

        @cans(['employment:create', 'employment:read', 'employment:edit', 'employment:delete'])
            @livewire('admin.dashboard.employment-chart')
        @endcans

        @cans(['contact:create', 'contact:read', 'contact:edit', 'contact:delete'])
            @livewire('admin.dashboard.contact-chart')
        @endcans
        
        @cans(['comment:create', 'comment:read', 'comment:edit', 'comment:delete'])
            @livewire('admin.dashboard.comment-chart')
        @endcans

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.6.2/chart.min.js"></script>
</div>