<aside x-bind:class="{'my-sidebar-show': isSidebarOpen}" class="my-sidebar my-sidebar-show bg-gray-800 text-white flex flex-column justify-between" style="height: calc(100vh - 60px)">
    <div class="flex-1 px-4 space-y-2 overflow-hidden hover:overflow-auto mt-5">
        <a href="{{ route('dashboard') }}" class="flex items-center w-full space-x-2 rounded p-2 @if(request()->routeIs('dashboard')) bg-white text-gray-800 @endif">
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="h-6 w-6 ml-2" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                <g transform="translate(1 1)"><g><g><path d="M244.76,343.747c3.413,0.853,6.827,0.853,10.24,0.853c16.213,0,30.72-9.387,38.4-23.893     c1.707-4.267,4.267-9.387,6.827-14.507c7.68-14.507,14.507-29.867,23.04-44.373l24.747-40.96     c1.707-3.413,0.853-6.827-1.707-10.24c-2.56-3.413-6.827-3.413-10.24-1.707l-40.96,24.747     c-14.507,8.533-29.867,16.213-44.373,23.04c-4.267,1.707-9.387,4.267-14.507,6.827c-17.92,9.387-27.307,29.013-23.04,48.64     C216.6,327.533,229.4,340.333,244.76,343.747z M243.907,278.893c4.267-2.56,9.387-4.267,14.507-6.827     c15.36-7.68,31.573-15.36,46.08-23.893l11.093-6.827l-6.827,11.093c-9.387,15.36-17.067,30.72-23.893,46.08     c-1.707,5.12-4.267,9.387-6.827,14.507c-5.12,11.093-17.067,16.213-29.013,13.653c-9.387-1.707-17.067-9.387-18.773-18.773     C227.693,295.96,232.813,284.013,243.907,278.893z"/><path d="M492.719,207.208c-0.108-0.575-0.27-1.146-0.492-1.702c-0.223-0.558-0.507-1.069-0.837-1.537     c-12.787-30.616-31.365-58.265-54.348-81.565c-0.324-0.482-0.701-0.944-1.135-1.378s-0.896-0.811-1.378-1.135     C388.233,74.226,324.764,45.933,255,45.933c-33.418,0-65.389,6.5-94.725,18.281c-0.575,0.108-1.146,0.27-1.701,0.492     c-0.557,0.223-1.069,0.507-1.537,0.837c-30.616,12.787-58.265,31.365-81.565,54.348c-0.482,0.324-0.944,0.701-1.378,1.135     s-0.812,0.896-1.135,1.378C27.293,168.7-1,232.169-1,301.933c0,58.027,18.773,113.493,55.467,158.72     c1.707,2.56,4.267,3.413,6.827,3.413h387.413c2.56,0,5.12-0.853,6.827-3.413C492.227,415.427,511,359.96,511,301.933     C511,268.515,504.5,236.544,492.719,207.208z M445.293,447H65.56c-11.539-14.88-21.122-30.844-28.695-47.616l23.575-9.557     c4.267-1.707,5.973-6.827,4.267-11.093c-1.707-4.267-6.827-5.973-11.093-4.267l-23.11,9.369     c-8.574-23.342-13.394-48.021-14.278-73.369H75.8c5.12,0,8.533-3.413,8.533-8.533S80.92,293.4,75.8,293.4H16.237     c0.957-26.907,6.416-52.715,15.648-76.694L55.32,226.84c0.853,0.853,2.56,0.853,3.413,0.853c3.413,0,5.973-1.707,7.68-5.12     c1.707-4.267,0-9.387-4.267-11.093l-23.672-10.237c10.699-22.831,24.906-43.721,41.922-61.967l17.59,17.59     c1.707,1.707,3.413,2.56,5.973,2.56s4.267-0.853,5.973-2.56c3.413-3.413,3.413-8.533,0-11.947l-17.59-17.59     c19.117-17.828,41.131-32.581,65.244-43.438l9.52,23.482c0.853,3.413,4.267,5.12,7.68,5.12c0.853,0,1.707,0,3.413-0.853     c4.267-1.707,5.973-6.827,4.267-11.093l-9.329-23.012c23.021-8.463,47.679-13.452,73.329-14.364v59.563     c0,5.12,3.413,8.533,8.533,8.533s8.533-3.413,8.533-8.533V63.17c26.907,0.957,52.715,6.416,76.694,15.648l-10.134,23.436     c-1.707,4.267,0,9.387,4.267,11.093c0.853,0.853,2.56,0.853,3.413,0.853c3.413,0,6.827-2.56,7.68-5.12l10.237-23.672     c22.831,10.699,43.721,24.906,61.967,41.922l-17.59,17.59c-3.413,3.413-3.413,8.533,0,11.947c1.707,1.707,3.413,2.56,5.973,2.56     c1.707,0,4.267-0.853,5.973-2.56l17.59-17.59c17.828,19.117,32.581,41.131,43.438,65.244l-23.482,9.52     c-4.267,1.707-5.973,6.827-4.267,11.093c0.853,3.413,4.267,5.12,7.68,5.12c0.853,0,1.707-0.853,3.413-0.853l23.013-9.329     c8.463,23.021,13.452,47.679,14.364,73.329H434.2c-5.12,0-8.533,3.413-8.533,8.533s3.413,8.533,8.533,8.533h59.575     c-0.927,26.593-6.172,52.45-15.418,76.799l-23.677-10.239c-4.267-1.707-9.387,0-11.093,4.267c-1.707,4.267,0,9.387,4.267,11.093     l23.981,10.37C464.644,418.298,455.773,433.121,445.293,447z"/><path d="M246.467,353.133c-51.2,0-91.307,25.6-102.4,65.707c0,2.56,0,5.973,1.707,7.68c1.707,2.56,4.267,3.413,6.827,3.413     h187.733c2.56,0,5.12-0.853,6.827-3.413c1.707-2.56,2.56-5.12,1.707-7.68C336.92,378.733,297.667,353.133,246.467,353.133z      M251.302,412.867l-14.222-21.333c-2.56-4.267-7.68-5.12-11.947-2.56c-4.267,2.56-5.12,7.68-2.56,11.947l7.964,11.947H165.4     c12.8-26.453,43.52-42.667,81.92-42.667c37.547,0,68.267,16.213,81.067,42.667H251.302z"/></g></g></g>
            </svg>
            <span>داشبورد</span>
        </a>

        @can('settings:edit')
            <a href="{{ route('settings') }}" class="flex items-center w-full space-x-2 rounded p-2 @if(request()->routeIs('settings')) bg-white text-gray-800 @endif">
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-6 h-6 ml-2" viewBox="0 0 1024 1024" class="icon">
                    <path d="M924.8 625.7l-65.5-56c3.1-19 4.7-38.4 4.7-57.8s-1.6-38.8-4.7-57.8l65.5-56a32.03 32.03 0 0 0 9.3-35.2l-.9-2.6a443.74 443.74 0 0 0-79.7-137.9l-1.8-2.1a32.12 32.12 0 0 0-35.1-9.5l-81.3 28.9c-30-24.6-63.5-44-99.7-57.6l-15.7-85a32.05 32.05 0 0 0-25.8-25.7l-2.7-.5c-52.1-9.4-106.9-9.4-159 0l-2.7.5a32.05 32.05 0 0 0-25.8 25.7l-15.8 85.4a351.86 351.86 0 0 0-99 57.4l-81.9-29.1a32 32 0 0 0-35.1 9.5l-1.8 2.1a446.02 446.02 0 0 0-79.7 137.9l-.9 2.6c-4.5 12.5-.8 26.5 9.3 35.2l66.3 56.6c-3.1 18.8-4.6 38-4.6 57.1 0 19.2 1.5 38.4 4.6 57.1L99 625.5a32.03 32.03 0 0 0-9.3 35.2l.9 2.6c18.1 50.4 44.9 96.9 79.7 137.9l1.8 2.1a32.12 32.12 0 0 0 35.1 9.5l81.9-29.1c29.8 24.5 63.1 43.9 99 57.4l15.8 85.4a32.05 32.05 0 0 0 25.8 25.7l2.7.5a449.4 449.4 0 0 0 159 0l2.7-.5a32.05 32.05 0 0 0 25.8-25.7l15.7-85a350 350 0 0 0 99.7-57.6l81.3 28.9a32 32 0 0 0 35.1-9.5l1.8-2.1c34.8-41.1 61.6-87.5 79.7-137.9l.9-2.6c4.5-12.3.8-26.3-9.3-35zM788.3 465.9c2.5 15.1 3.8 30.6 3.8 46.1s-1.3 31-3.8 46.1l-6.6 40.1 74.7 63.9a370.03 370.03 0 0 1-42.6 73.6L721 702.8l-31.4 25.8c-23.9 19.6-50.5 35-79.3 45.8l-38.1 14.3-17.9 97a377.5 377.5 0 0 1-85 0l-17.9-97.2-37.8-14.5c-28.5-10.8-55-26.2-78.7-45.7l-31.4-25.9-93.4 33.2c-17-22.9-31.2-47.6-42.6-73.6l75.5-64.5-6.5-40c-2.4-14.9-3.7-30.3-3.7-45.5 0-15.3 1.2-30.6 3.7-45.5l6.5-40-75.5-64.5c11.3-26.1 25.6-50.7 42.6-73.6l93.4 33.2 31.4-25.9c23.7-19.5 50.2-34.9 78.7-45.7l37.9-14.3 17.9-97.2c28.1-3.2 56.8-3.2 85 0l17.9 97 38.1 14.3c28.7 10.8 55.4 26.2 79.3 45.8l31.4 25.8 92.8-32.9c17 22.9 31.2 47.6 42.6 73.6L781.8 426l6.5 39.9zM512 326c-97.2 0-176 78.8-176 176s78.8 176 176 176 176-78.8 176-176-78.8-176-176-176zm79.2 255.2A111.6 111.6 0 0 1 512 614c-29.9 0-58-11.7-79.2-32.8A111.6 111.6 0 0 1 400 502c0-29.9 11.7-58 32.8-79.2C454 401.6 482.1 390 512 390c29.9 0 58 11.6 79.2 32.8A111.6 111.6 0 0 1 624 502c0 29.9-11.7 58-32.8 79.2z"/>
                </svg>
                <span>تنظیمات</span>
            </a>
        @endcan

        @if(auth()->user()->isSuperAdmin())
            <a href="{{ route('roles') }}" class="flex items-center w-full space-x-2 rounded p-2 @if(request()->routeIs('roles')) bg-white text-gray-800 @endif">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 511.999 511.999" fill="currentColor" class="w-6 h-6 ml-2" xml:space="preserve">
                    <g><g><path d="M190.604,389.283c-25.178,6.781-48.262,5.515-70.543-10.666c-18.293-13.285-29.607-33.667-31.43-56.141l-64.672,96.539    c-7.421,11.074,0.51,26.05,13.902,26.05h56.597l28.839,57.687c5.868,11.713,22.249,12.44,29.166,1.378l59.167-94.744    C201.595,402.771,197.285,397.529,190.604,389.283z"/></g></g><g><g><path d="M488.04,419.01l-68.357-101.952c-1.403,27.875-13.196,48.028-31.841,61.564c-22.532,16.366-45.667,17.34-70.533,10.655    c-5.938,7.324-9.392,11.733-18.221,18.139l60.45,96.718c6.922,11.059,23.3,10.324,29.166-1.383l28.839-57.687h56.597    C487.535,445.064,495.461,430.071,488.04,419.01z"/></g></g><g><g><path d="M423.511,187.444c10.197-15.682,22.774-30.037,15.264-53.171c-7.477-23.029-25.859-27.241-45.114-34.612    c-3.737-1.432-6.298-4.947-6.504-8.945c-1.029-20.03,0.813-39.236-18.979-53.613c-19.592-14.225-36.927-6.83-56.837-1.476    c-3.835,1.035-7.986-0.294-10.525-3.42C288.198,16.6,278.405,0,253.957,0c-24.161,0-33.798,16.053-46.869,32.216    c-2.517,3.116-6.625,4.45-10.502,3.41c-19.387-5.213-37.059-12.893-56.849,1.482c-19.595,14.223-17.921,33.021-18.979,53.613    c-0.208,3.998-2.757,7.507-6.493,8.939c-18.729,7.169-37.555,11.347-45.126,34.612c-7.48,23.039,4.883,37.197,16.168,54.528    c2.179,3.356,2.179,7.692,0,11.047c-10.855,16.662-23.748,31.185-16.168,54.534c7.495,23.023,25.821,27.218,45.126,34.608    c3.737,1.432,6.286,4.941,6.493,8.945c1.027,20-0.817,39.24,18.979,53.608c19.588,14.232,36.927,6.839,56.837,1.482    c3.889-1.041,7.997,0.305,10.525,3.42c12.606,15.6,22.383,32.205,46.858,32.205c24.212,0,33.868-16.139,46.869-32.21    c2.517-3.127,6.712-4.461,10.502-3.416c19.5,5.236,37.09,12.88,56.849-1.476c19.59-14.229,17.92-33.005,18.979-53.596    c0.208-4.015,2.767-7.528,6.504-8.961c18.694-7.156,37.565-11.353,45.114-34.608c7.378-22.724-4.63-36.824-15.274-53.188    C420.777,197.02,420.777,191.627,423.511,187.444z M253.957,294.729c-55.367,0-100.405-45.044-100.405-100.406    c0-55.361,45.039-100.405,100.405-100.405s100.406,45.044,100.406,100.405C354.362,249.685,309.323,294.729,253.957,294.729z"/></g></g><g><g><path d="M253.957,127.387c-36.911,0-66.937,30.026-66.937,66.937c0,36.911,30.026,66.937,66.937,66.937    c36.911,0,66.937-30.026,66.937-66.937C320.894,157.412,290.868,127.387,253.957,127.387z"/></g></g>
                </svg>
                <span>مقام ها</span>
            </a>
        @endif

        @if(auth()->user()->isSuperAdmin())
            <a href="{{ route('managers') }}" class="flex items-center w-full space-x-2 rounded p-2 @if(request()->routeIs('managers')) bg-white text-gray-800 @endif">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" fill="currentColor" class="w-6 h-6 ml-2" viewBox="0 0 479.293 479.293" xml:space="preserve">
                    <g><g><path d="M179.379,248.994l16.238-8.453c2.654-1.383,5.585-2.212,8.565-2.455c-1.731-1.782-3.425-3.628-5.069-5.551    c-19.569-22.905-30.346-53.182-30.346-85.254c0-42.062,10.536-73.904,31.315-94.637c3.263-3.255,6.76-6.217,10.48-8.897    c-4.008-0.368-8.099-0.548-12.26-0.548c-49.112,0-88.925,24.368-88.925,104.082C109.379,197.163,139.359,238.839,179.379,248.994z    "/><path d="M62.872,397.28l44.863-101.063c3.695-8.324,10.18-15.227,18.26-19.434l20.074-10.449    c-5.081-2.75-10.002-5.904-14.721-9.474c-1.383-1.045-3.242-1.2-4.777-0.401l-69.624,36.244    c-4.489,2.336-8.091,6.17-10.144,10.795L1.939,404.561c-3.092,6.966-2.458,14.938,1.696,21.329    c4.154,6.389,11.184,10.204,18.806,10.204h43.775c-0.094-0.144-0.198-0.277-0.292-0.421    C58.446,424.17,57.306,409.818,62.872,397.28z"/><path d="M280.988,251.364c49.11,0,88.924-46.6,88.924-104.082c0-79.714-39.812-104.082-88.924-104.082    c-49.113,0-88.926,24.368-88.926,104.082C192.063,204.765,231.876,251.364,280.988,251.364z"/><path d="M477.354,404.561L432.49,303.498c-2.053-4.625-5.656-8.459-10.146-10.797l-69.624-36.242    c-1.535-0.799-3.396-0.644-4.777,0.4c-19.689,14.895-42.844,22.768-66.955,22.768c-24.112,0-47.265-7.873-66.958-22.768    c-1.383-1.045-3.242-1.201-4.777-0.4l-69.623,36.242c-4.489,2.338-8.091,6.172-10.144,10.797L84.624,404.561    c-3.092,6.966-2.458,14.938,1.696,21.329c4.154,6.389,11.184,10.204,18.806,10.204h351.726c7.622,0,14.652-3.814,18.806-10.204    C479.811,419.499,480.445,411.525,477.354,404.561z"/></g></g>
                </svg>
                <span>مدیران</span>
            </a>
        @endif

        @if(auth()->user()->isSuperAdmin())
            <a href="{{ route('categories') }}" class="flex items-center w-full space-x-2 text-sm rounded p-2 @if(request()->routeIs('categories')) bg-white text-gray-800 @endif">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 ml-2">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 14v6m-3-3h6M6 10h2a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2zm10 0h2a2 2 0 002-2V6a2 2 0 00-2-2h-2a2 2 0 00-2 2v2a2 2 0 002 2zM6 20h2a2 2 0 002-2v-2a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2z"></path>
                </svg>
                <span>گروه ها</span>
            </a>
        @endif

        @cans(['product:create', 'product:read', 'product:edit', 'product:delete'])
            <a href="{{ route('admin.products') }}" class="flex items-center w-full space-x-2 rounded p-2 @if(request()->routeIs('admin.products')) bg-white text-gray-800 @endif">
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-6 h-5 ml-2" viewBox="0 0 52 52" data-name="Layer 1"><g><path d="M31.9,39.5h6A1.42,1.42,0,0,0,39.4,38V14a1.42,1.42,0,0,0-1.5-1.5h-6A1.42,1.42,0,0,0,30.4,14V38A1.42,1.42,0,0,0,31.9,39.5Z"/><path d="M45.4,39.5h3A1.42,1.42,0,0,0,49.9,38V14a1.42,1.42,0,0,0-1.5-1.5h-3A1.42,1.42,0,0,0,43.9,14V38A1.42,1.42,0,0,0,45.4,39.5Z"/><path d="M25,39.5h0A1.37,1.37,0,0,0,26.5,38V14A1.42,1.42,0,0,0,25,12.5h0A1.42,1.42,0,0,0,23.5,14V38A1.37,1.37,0,0,0,25,39.5Z"/><path d="M16.6,39.5H18A1.42,1.42,0,0,0,19.5,38V14A1.42,1.42,0,0,0,18,12.5H16.5A1.42,1.42,0,0,0,15,14V38A1.45,1.45,0,0,0,16.6,39.5Z"/><path d="M3.6,39.5h6A1.42,1.42,0,0,0,11.1,38V14a1.42,1.42,0,0,0-1.5-1.5h-6A1.42,1.42,0,0,0,2.1,14V38A1.47,1.47,0,0,0,3.6,39.5Z"/></g></svg>
                <span>محصولات</span>
            </a>
        @endcans

        @cans(['license:create', 'license:read', 'license:edit', 'license:delete'])
            <a href="{{ route('licenses') }}" class="flex items-center w-full space-x-2 rounded p-2 @if(request()->routeIs('licenses')) bg-white text-gray-800 @endif">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="currentColor" class="w-6 h-6 ml-2" viewBox="0 0 36 36" version="1.1" preserveAspectRatio="xMidYMid meet">
                    <rect x="7" y="12" width="17" height="1.6" class="clr-i-outline--badged clr-i-outline-path-1--badged"/><rect x="7" y="16" width="11" height="1.6" class="clr-i-outline--badged clr-i-outline-path-2--badged"/><rect x="7" y="23" width="10" height="1.6" class="clr-i-outline--badged clr-i-outline-path-3--badged"/><path d="M27.46,17.23a6.36,6.36,0,0,0-4.4,11l-1.94,2.37.9,3.61,3.66-4.46a6.26,6.26,0,0,0,3.55,0l3.66,4.46.9-3.61-1.94-2.37a6.36,6.36,0,0,0-4.4-11Zm0,10.68a4.31,4.31,0,1,1,4.37-4.31A4.35,4.35,0,0,1,27.46,27.91Z" class="clr-i-outline--badged clr-i-outline-path-4--badged"/><path d="M32,13.22v3.34a8.41,8.41,0,0,1,2,1.81v-6A7.45,7.45,0,0,1,32,13.22Z" class="clr-i-outline--badged clr-i-outline-path-5--badged"/><path d="M4,28V8H22.78a7.49,7.49,0,0,1-.28-2H4A2,2,0,0,0,2,8V28a2,2,0,0,0,2,2H19l.57-.7.93-1.14L20.41,28Z" class="clr-i-outline--badged clr-i-outline-path-6--badged"/><circle cx="30" cy="6" r="5" class="clr-i-outline--badged clr-i-outline-path-7--badged clr-i-badge"/>
                    <rect x="0" y="0" width="36" height="36" fill-opacity="0"/>
                </svg>
                <span>لایسنس</span>
            </a>
        @endcans

        @cans(['slideshow:create', 'slideshow:read', 'slideshow:edit', 'slideshow:delete'])
            <a href="{{ route('slideshow') }}" class="flex items-center w-full space-x-2 rounded p-2 @if(request()->routeIs('slideshow')) bg-white text-gray-800 @endif">
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-6 h-6 ml-2" viewBox="0 0 24 24">
                    <g>
                        <path fill="none" d="M0 0h24v24H0z"/>
                        <path d="M13 21v2h-2v-2H3a1 1 0 0 1-1-1V6h20v14a1 1 0 0 1-1 1h-8zm-9-2h16V8H4v11zm9-9h5v2h-5v-2zm0 4h5v2h-5v-2zm-4-4v3h3a3 3 0 1 1-3-3zM2 3h20v2H2V3z"/>
                    </g>
                </svg>
                <span>اسلاید شو</span>
            </a>
        @endcans

        @cans(['employment:create', 'employment:read', 'employment:edit', 'employment:delete'])
            <a wire:ignore.self href="{{ route('employments') }}" class="flex items-center w-full space-x-2 rounded p-2 @active('employments') bg-white text-gray-800 @endactive flex justify-between items-center">
                <div class="flex">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" width="950px" height="950px" viewBox="0 0 950 950" fill="currentColor" class="w-6 h-6 ml-2" xml:space="preserve">
                        <g><g><g><path d="M0,517.352c0,13.211,8.243,25.019,20.644,29.57l56.499,20.742c4.25-10.152,10.483-19.666,18.735-27.918     c16.486-16.486,38.406-25.566,61.722-25.566c23.315,0,45.235,9.08,61.722,25.566l172.915,172.914     c24.33,24.33,31.256,59.563,20.8,90.115c25.141,18.411,58.865,21.584,87.34,7.268L738.185,690.48     c38.854-19.532,54.917-64.051,41.763-102.336c-0.108,0-0.219,0.004-0.325,0.004c-31.656,0-61.48-13.911-81.826-38.168     L534.089,354.8l-23.117,23.117c-16.206,16.204-37.751,25.131-60.67,25.131c-22.918,0-44.465-8.925-60.67-25.131l-7.884-7.885     c-16.206-16.206-25.13-37.752-25.13-60.671c0-22.918,8.925-44.464,25.13-60.67l65.64-65.64l-13.702-16.334     c-25.049-30.156-67.626-38.977-102.594-21.253l-178.495,90.47L43.26,191.946c-20.7-8.328-43.258,6.911-43.258,29.224v296.182H0z"/><path d="M950,504.524v-242.43c0-17.397-14.104-31.5-31.5-31.5H779L635.51,127.021c-14.771-10.662-31.996-15.891-49.138-15.891     c-21.646,0-43.158,8.339-59.424,24.604l-64.854,64.853l-64.227,64.227c-24.604,24.603-24.604,64.493,0,89.096l7.884,7.885     c12.301,12.302,28.425,18.452,44.548,18.452c16.124,0,32.247-6.15,44.548-18.452l40.716-40.715l179.699,214.248     c13.398,15.975,31.974,26.096,51.916,29.086c4.103,0.615,8.26,0.936,12.441,0.936c6.003,0,12.06-0.646,18.064-1.969     l127.589-28.094C939.714,532.108,950,519.313,950,504.524z"/><path d="M284.914,819.983c12.592,12.593,29.096,18.888,45.6,18.888c16.504,0,33.009-6.295,45.601-18.888     c9.826-9.825,15.799-22.036,17.958-34.768c3.374-19.898-2.601-41.074-17.958-56.434L203.2,555.868     c-12.592-12.592-29.096-18.888-45.6-18.888s-33.008,6.296-45.6,18.888l0,0c-5.84,5.842-10.308,12.528-13.439,19.66     c-10.372,23.627-5.904,52.196,13.439,71.539L284.914,819.983z"/></g></g></g>
                    </svg>
                    <span>استخدام</span>
                </div>

                @if($employmentsCount)
                    <div class="text-sm bg-blue-600 text-white rounded px-2 flex justify-center items-center">{{ enToFa($employmentsCount) }}</div>
                @endif
            </a>
        @endcans

        @cans(['representation:create', 'representation:read', 'representation:edit', 'representation:delete'])
            <a wire:ignore.self href="{{ route('representations') }}" class="flex items-center w-full space-x-2 rounded p-2 @active('representations') bg-white text-gray-800 @endactive flex justify-between items-center">
                <div class="flex">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" width="24" height="24" class="w-6 ml-2">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                    </svg>
                    <span>نمایندگی</span>
                </div>

                @if($representationCount)
                    <div class="text-sm bg-green-600 text-white rounded px-2 flex justify-center items-center">{{ enToFa($representationCount) }}</div>
                @endif
            </a>
        @endcans

        @cans(['contact:create', 'contact:read', 'contact:edit', 'contact:delete'])
            <a wire:ignore.self href="{{ route('contacts') }}" class="flex items-center w-full space-x-2 rounded p-2 @active('contacts') bg-white text-gray-800 @endactive flex justify-between items-center">
                <div class="flex">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 ml-2">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                    <span>تماس با ما</span>
                </div>

                @if($contactsCount)
                    <div class="text-sm bg-yellow-500 text-white rounded px-2 flex justify-center items-center">{{ enToFa($contactsCount) }}</div>
                @endif
            </a>
        @endcans

        @cans(['comment:create', 'comment:read', 'comment:edit', 'comment:delete'])
            <a wire:ignore.self href="{{ route('comments') }}" class="flex items-center w-full space-x-2 rounded p-2 @active('comments') bg-white text-gray-800 @endactive flex justify-between items-center">
                <div class="flex    ">
                    <svg fill="none" viewBox="0 0 22 22" stroke="currentColor" class="w-6 h-6 ml-2">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                    </svg>
                    <span>کامنت</span>
                </div>

                @if($commentsCount)
                    <div class="text-sm bg-red-600 text-white rounded px-2 flex justify-center items-center">{{ enToFa($commentsCount) }}</div>
                @endif
            </a>
        @endcans
    </div>
</aside>