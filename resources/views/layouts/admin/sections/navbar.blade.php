<nav class="z-20 shadow-sm fixed fixed-top top-0 right-0 left-0 p-2 bg-gray-100 flex justify-between items-center" style="min-height: 60px">
    <div class="flex items-center">
        <svg x-on:click="isSidebarOpen = !isSidebarOpen" class="w-9 h-9 text-gray-800 ml-3 cursor-pointer" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M4 6h16M4 12h16M4 18h7" />
        </svg>

        <span class="text-gray-800 text-xl">پنل مدیریت</span>
    </div>

    <div>
        <!-- Dropdown -->
        @include('layouts.admin.sections.dropdown')
    </div>
</nav>