<aside x-bind:class="{'my-sidebar-show': isSidebarOpen}" class="my-sidebar my-sidebar-show bg-gray-800 text-white flex flex-column justify-between" style="height: calc(100vh - 60px)">
    <div class="flex-1 px-4 space-y-2 overflow-hidden hover:overflow-auto mt-5">
        <a href="{{ route('dashboard') }}" class="flex items-center w-full space-x-2 rounded p-2 @if(request()->routeIs('dashboard')) bg-white text-gray-800 @endif">
            <i class="fas fa-user ml-2"></i>
            <span>داشبورد</span>
        </a>

        @if(auth()->user()->isSuperAdmin())
            <a href="{{ route('categories') }}" class="flex items-center w-full space-x-2 text-sm rounded p-2 @if(request()->routeIs('categories')) bg-white text-gray-800 @endif">
                <i class="fa fa-user ml-2"></i>    
                <span>گروه ها</span>
            </a>
        @endif

        <a href="{{ route('products') }}" class="flex items-center w-full space-x-2 rounded p-2 @if(request()->routeIs('products')) bg-white text-gray-800 @endif">
            <i class="fas fa-user ml-2"></i>
            <span>محصولات</span>
        </a>

        <a href="{{ route('config') }}" class="flex items-center w-full space-x-2 rounded p-2 @if(request()->routeIs('config')) bg-white text-gray-800 @endif">
            <i class="fas fa-user ml-2"></i>
            <span>تنظیمات</span>
        </a>

        <a href="{{ route('licenses') }}" class="flex items-center w-full space-x-2 rounded p-2 @if(request()->routeIs('licenses')) bg-white text-gray-800 @endif">
            <i class="fas fa-user ml-2"></i>
            <span>لایسنس</span>
        </a>

        @if(auth()->user()->isSuperAdmin())
            <a href="{{ route('staff') }}" class="flex items-center w-full space-x-2 rounded p-2 @if(request()->routeIs('staff')) bg-white text-gray-800 @endif">
                <i class="fas fa-user ml-2"></i>
                <span>کارمندان</span>
            </a>
        @endif

        <a href="{{ route('representations') }}" class="flex items-center w-full space-x-2 rounded p-2 @if(request()->routeIs('representations')) bg-white text-gray-800 @endif justify-between">
            <div>
                <i class="fas fa-user ml-2"></i>
                <span>نمایندگی</span>
            </div>

            <div class="text-sm bg-green-600 text-white rounded px-1 flex justify-center items-center">{{ \App\Models\Representation::whereNull('read_at')->count() }}</div>
        </a>
    </div>
</aside>