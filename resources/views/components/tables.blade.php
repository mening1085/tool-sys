@extends('layouts.master')

@section('content')
    <h1 class="text-3xl text-black pb-6">Tables</h1>

    <div class="w-full mt-6">
        <p class="text-xl pb-3 flex items-center">
            <i class="fas fa-list mr-3"></i> Table Example
        </p>
        <div class="bg-white overflow-auto">
            <table class="min-w-full bg-white">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Name</th>
                        <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Last name
                        </th>
                        <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Phone</th>
                        <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Email</td>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    <tr>
                        <td class="w-1/3 text-left py-3 px-4">Lian</td>
                        <td class="w-1/3 text-left py-3 px-4">Smith</td>
                        <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="tel:622322662">622322662</a>
                        </td>
                        <td class="text-left py-3 px-4"><a class="hover:text-blue-500"
                                href="mailto:jonsmith@mail.com">jonsmith@mail.com</a></td>
                    </tr>
                    <tr class="bg-gray-200">
                        <td class="w-1/3 text-left py-3 px-4">Emma</td>
                        <td class="w-1/3 text-left py-3 px-4">Johnson</td>
                        <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="tel:622322662">622322662</a>
                        </td>
                        <td class="text-left py-3 px-4"><a class="hover:text-blue-500"
                                href="mailto:jonsmith@mail.com">jonsmith@mail.com</a></td>
                    </tr>
                    <tr>
                        <td class="w-1/3 text-left py-3 px-4">Oliver</td>
                        <td class="w-1/3 text-left py-3 px-4">Williams</td>
                        <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="tel:622322662">622322662</a>
                        </td>
                        <td class="text-left py-3 px-4"><a class="hover:text-blue-500"
                                href="mailto:jonsmith@mail.com">jonsmith@mail.com</a></td>
                    </tr>
                    <tr class="bg-gray-200">
                        <td class="w-1/3 text-left py-3 px-4">Isabella</td>
                        <td class="w-1/3 text-left py-3 px-4">Brown</td>
                        <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="tel:622322662">622322662</a>
                        </td>
                        <td class="text-left py-3 px-4"><a class="hover:text-blue-500"
                                href="mailto:jonsmith@mail.com">jonsmith@mail.com</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <p class="pt-3 text-gray-600">
            Source: <a class="underline"
                href="https://tailwindcomponents.com/component/striped-table">https://tailwindcomponents.com/component/striped-table</a>
        </p>
    </div>

    <div class="w-full mt-12">
        <p class="text-xl pb-3 flex items-center">
            <i class="fas fa-list mr-3"></i> Table Example
        </p>
        <div class="bg-white overflow-auto">
            <table class="text-left w-full border-collapse">
                <!--Border collapse doesn't work on this site yet but it's available in newer tailwind versions -->
                <thead>
                    <tr>
                        <th
                            class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                            Name</th>
                        <th
                            class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                            Last Name</th>
                        <th
                            class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                            Phone</th>
                        <th
                            class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                            Email</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="hover:bg-grey-lighter">
                        <td class="py-4 px-6 border-b border-grey-light">Lian</td>
                        <td class="py-4 px-6 border-b border-grey-light">Smith</td>
                        <td class="py-4 px-6 border-b border-grey-light">622322662</td>
                        <td class="py-4 px-6 border-b border-grey-light">jonsmith@mail.com</td>
                    </tr>
                    <tr class="hover:bg-grey-lighter">
                        <td class="py-4 px-6 border-b border-grey-light">Lian</td>
                        <td class="py-4 px-6 border-b border-grey-light">Smith</td>
                        <td class="py-4 px-6 border-b border-grey-light">622322662</td>
                        <td class="py-4 px-6 border-b border-grey-light">jonsmith@mail.com</td>
                    </tr>
                    <tr class="hover:bg-grey-lighter">
                        <td class="py-4 px-6 border-b border-grey-light">Lian</td>
                        <td class="py-4 px-6 border-b border-grey-light">Smith</td>
                        <td class="py-4 px-6 border-b border-grey-light">622322662</td>
                        <td class="py-4 px-6 border-b border-grey-light">jonsmith@mail.com</td>
                    </tr>
                    <tr class="hover:bg-grey-lighter">
                        <td class="py-4 px-6 border-b border-grey-light">Lian</td>
                        <td class="py-4 px-6 border-b border-grey-light">Smith</td>
                        <td class="py-4 px-6 border-b border-grey-light">622322662</td>
                        <td class="py-4 px-6 border-b border-grey-light">jonsmith@mail.com</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <p class="pt-3 text-gray-600">
            Source: <a class="underline"
                href="https://tailwindcomponents.com/component/table">https://tailwindcomponents.com/component/table</a>
        </p>
    </div>

    <div class="w-full mt-12">
        <p class="text-xl pb-3 flex items-center">
            <i class="fas fa-list mr-3"></i> Table Example
        </p>
        <div class="bg-white overflow-auto">
            <table class="min-w-full leading-normal">
                <thead>
                    <tr>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            User
                        </th>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Rol
                        </th>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Created at
                        </th>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Status
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 w-10 h-10">
                                    <img class="w-full h-full rounded-full"
                                        src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2.2&w=160&h=160&q=80"
                                        alt="" />
                                </div>
                                <div class="ml-3">
                                    <p class="text-gray-900 whitespace-no-wrap">
                                        Vera Carpenter
                                    </p>
                                </div>
                            </div>
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <p class="text-gray-900 whitespace-no-wrap">Admin</p>
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <p class="text-gray-900 whitespace-no-wrap">
                                Jan 21, 2020
                            </p>
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <span class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                                <span aria-hidden class="absolute inset-0 bg-green-200 opacity-50 rounded-full"></span>
                                <span class="relative">Activo</span>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 w-10 h-10">
                                    <img class="w-full h-full rounded-full"
                                        src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2.2&w=160&h=160&q=80"
                                        alt="" />
                                </div>
                                <div class="ml-3">
                                    <p class="text-gray-900 whitespace-no-wrap">
                                        Blake Bowman
                                    </p>
                                </div>
                            </div>
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <p class="text-gray-900 whitespace-no-wrap">Editor</p>
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <p class="text-gray-900 whitespace-no-wrap">
                                Jan 01, 2020
                            </p>
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <span class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                                <span aria-hidden class="absolute inset-0 bg-green-200 opacity-50 rounded-full"></span>
                                <span class="relative">Activo</span>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 w-10 h-10">
                                    <img class="w-full h-full rounded-full"
                                        src="https://images.unsplash.com/photo-1540845511934-7721dd7adec3?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2.2&w=160&h=160&q=80"
                                        alt="" />
                                </div>
                                <div class="ml-3">
                                    <p class="text-gray-900 whitespace-no-wrap">
                                        Dana Moore
                                    </p>
                                </div>
                            </div>
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <p class="text-gray-900 whitespace-no-wrap">Editor</p>
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <p class="text-gray-900 whitespace-no-wrap">
                                Jan 10, 2020
                            </p>
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <span class="relative inline-block px-3 py-1 font-semibold text-orange-900 leading-tight">
                                <span aria-hidden class="absolute inset-0 bg-orange-200 opacity-50 rounded-full"></span>
                                <span class="relative">Suspended</span>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-5 py-5 bg-white text-sm">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 w-10 h-10">
                                    <img class="w-full h-full rounded-full"
                                        src="https://images.unsplash.com/photo-1522609925277-66fea332c575?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2.2&h=160&w=160&q=80"
                                        alt="" />
                                </div>
                                <div class="ml-3">
                                    <p class="text-gray-900 whitespace-no-wrap">
                                        Alonzo Cox
                                    </p>
                                </div>
                            </div>
                        </td>
                        <td class="px-5 py-5 bg-white text-sm">
                            <p class="text-gray-900 whitespace-no-wrap">Admin</p>
                        </td>
                        <td class="px-5 py-5 bg-white text-sm">
                            <p class="text-gray-900 whitespace-no-wrap">Jan 18, 2020</p>
                        </td>
                        <td class="px-5 py-5 bg-white text-sm">
                            <span class="relative inline-block px-3 py-1 font-semibold text-red-900 leading-tight">
                                <span aria-hidden class="absolute inset-0 bg-red-200 opacity-50 rounded-full"></span>
                                <span class="relative">Inactive</span>
                            </span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <p class="pt-3 text-gray-600">
            Source: <a class="underline"
                href="https://tailwindcomponents.com/component/table-responsive-with-filters">https://tailwindcomponents.com/component/table-responsive-with-filters</a>
        </p>
    </div>
@endsection
