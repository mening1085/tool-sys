 <!-- Desktop Header -->
 {{-- <header class="w-full items-center bg-white py-2 px-6 hidden sm:flex">

     <div x-data="{ isOpen: false }" class="w-full flex justify-end items-center">
         <button @click="isOpen = !isOpen"
             class="realtive z-10 w-12 h-12 rounded-full overflow-hidden border-4 border-gray-400 hover:border-gray-300 focus:border-gray-300 focus:outline-none">
             <img src="https://source.unsplash.com/uJ8LNVCBjFQ/400x400">
         </button>
         <button x-show="isOpen" @click="isOpen = false" class="h-full w-full fixed inset-0 cursor-default"></button>
         <div x-show="isOpen" class="absolute w-40 bg-white rounded-lg shadow-lg mr-2 mt-16">
             <div class="bg-gray-300 block px-4 py-2 rounded-t-lg">
                 <div class="w-24 ell-1 font-medium bg-gray-300">
                     {{ Auth::user()->name }}
                 </div>
             </div>
             <a href="/logout" class="block px-4 py-2 account-link hover:text-white hover:rounded-b-lg">Sign Out</a>
         </div>
     </div>
 </header> --}}

 <!-- Mobile Header & Nav -->
 <header x-data="{ isOpen: false }" class="w-full  sm:hidden">
     <div class="flex items-center justify-between bg-indigo-500 py-5 px-6 ">
         <a href="index.html"
             class="text-white text-lg font-semibold hover:text-gray-300">ระบบยืมคืนอุปกรณืและเครื่องมือ</a>
         <button @click="isOpen = !isOpen" class="text-white text-3xl focus:outline-none">
             <i x-show="!isOpen" class="fas fa-bars"></i>
             <i x-show="isOpen" class="fas fa-times"></i>
         </button>
     </div>

     <!-- Dropdown Nav -->
     <nav :class="isOpen ? 'flex' : 'hidden'" class="flex flex-col py-5 px-6 bg-white">
         <a href="/admin/tools"
             class="flex items-center py-4 pl-6 nav-item @if (request()->is('tool-management/*') || request()->is('tool-management')) active-nav-link font-semibold @endif ">
             <i class="fas fa-tachometer-alt mr-3"></i>
             จัดการอุปกรณ์
         </a>

         <hr>
         <a href="/admin/user-tools"
             class="flex items-center hover:opacity-100 py-4 pl-6 nav-item @if (request()->is('tools/*') || request()->is('tools')) active-nav-link font-semibold @endif">
             <i class="fas fa-table mr-3"></i>
             รายการยืมอุปกรณ์
         </a>

         <hr>
         <a href="/admin/users"
             class="flex items-center hover:opacity-100 py-4 pl-6 nav-item 
            @if (request()->is('users/*') || request()->is('users')) active-nav-link font-semibold @endif">
             <i class="fas fa-table mr-3"></i>
             User Management
         </a>

         <hr>

         <button
             class="w-full bg-white cta-btn font-semibold mt-16 rounded-lg shadow-lg hover:shadow-xl hover:bg-gray-300 flex items-center justify-center">
             <a href="/logout" class=" w-full logout-btn text-white flex items-center justify-center py-4">
                 <i class="fas fa-sign-out-alt mr-3"></i>
                 Logout
             </a>
         </button>

         {{--  --}}
     </nav>
     <!-- <button class="w-full bg-white cta-btn font-semibold py-2 mt-5 rounded-br-lg rounded-bl-lg rounded-tr-lg shadow-lg hover:shadow-xl hover:bg-gray-300 flex items-center justify-center">
                <i class="fas fa-plus mr-3"></i> New Report
            </button> -->
 </header>
