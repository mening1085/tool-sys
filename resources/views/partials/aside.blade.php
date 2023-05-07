<aside class="relative bg-sidebar h-screen w-96 hidden sm:block shadow-xl rounded-r-3xl overflow-hidden">
    <div class="p-6 flex-col flex justify-center items-center bg-indigo-500">
        <div class="w-20 h-20 rounded-full overflow-hidden border-4 border-white flex justify-center items-center">
            @if (Auth::user()->image)
                <img src="https://source.unsplash.com/uJ8LNVCBjFQ/400x400">
            @else
                <span class="uppercase text-5xl text-white font-bold -mt-1">
                    {{ substr(Auth::user()->name, 0, 1) }}
                </span>
            @endif
        </div>
        <div class="w-24 ell-1 text-2xl text-white font-medium mt-1 text-center">
            {{ Auth::user()->name }}
        </div>
    </div>
    <nav class=" text-base font-normal">
        <div class="flex items-center mt-4 pl-6 font-bold">Admin</div>
        <a href="/admin/tools"
            class="flex items-center py-4 pl-6 nav-item @if (request()->is('admin/tools/*') || request()->is('admin/tools')) active-nav-link font-semibold @endif ">
            <i class="fas fa-tachometer-alt mr-3"></i>
            จัดการอุปกรณ์
        </a>
        <a href="/admin/user-tools"
            class="flex items-center hover:opacity-100 py-4 pl-6 nav-item @if (request()->is('admin/user-tools/*') || request()->is('admin/user-tools')) active-nav-link font-semibold @endif">
            <i class="fas fa-table mr-3"></i>
            รายการยืมอุปกรณ์
        </a>
        <a href="/admin/users"
            class="flex items-center hover:opacity-100 py-4 pl-6 nav-item 
            @if (request()->is('admin/users/*') || request()->is('admin/users')) active-nav-link font-semibold @endif">
            <i class="fas fa-table mr-3"></i>
            User Management
        </a>

        <hr>

        <a href="/admin/dashboard"
            class="flex items-center py-4 pl-6 nav-item @if (request()->is('admin/dashboard/*') || request()->is('admin/dashboard')) active-nav-link font-semibold @endif ">
            <i class="fas fa-tachometer-alt mr-3"></i>
            Dashboard
        </a>
        <a href="/admin/tables"
            class="flex items-center hover:opacity-100 py-4 pl-6 nav-item @if (Request::path() == 'tables') active-nav-link font-semibold @endif">
            <i class="fas fa-table mr-3"></i>
            Tables
        </a>
        <a href="/admin/forms"
            class="flex items-center hover:opacity-100 py-4 pl-6 nav-item @if (Request::path() == 'forms') active-nav-link font-semibold @endif">
            <i class="fas fa-align-left mr-3"></i>
            Forms
        </a>
        <a href="/admin/tabs"
            class="flex items-center hover:opacity-100 py-4 pl-6 nav-item @if (Request::path() == 'tabs') active-nav-link font-semibold @endif">
            <i class="fas fa-tablet-alt mr-3"></i>
            Tabbed Content
        </a>
        <a href="/admin/calendar"
            class="flex items-center hover:opacity-100 py-4 pl-6 nav-item @if (Request::path() == 'calendar') active-nav-link font-semibold @endif">
            <i class="fas fa-calendar mr-3"></i>
            Calendar
        </a>
    </nav>
    <a href="/admin/logout"
        class="absolute w-full logout-btn bottom-0  text-white flex items-center justify-center py-4">
        <i class="fas fa-sign-out-alt mr-3"></i>
        Logout
    </a>
</aside>
