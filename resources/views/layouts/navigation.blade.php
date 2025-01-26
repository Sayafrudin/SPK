<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <svg class="w-6 h-6 text-gray-800 dark:text-black" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                            viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M4 5.78571C4 4.80909 4.78639 4 5.77778 4H18.2222C19.2136 4 20 4.80909 20 5.78571V15H4V5.78571ZM12 12c0-.5523.4477-1 1-1h2c.5523 0 1 .4477 1 1s-.4477 1-1 1h-2c-.5523 0-1-.4477-1-1ZM8.27586 6.31035c.38089-.39993 1.01387-.41537 1.4138-.03449l2.62504 2.5c.1981.18875.3103.45047.3103.72414 0 .27368-.1122.5354-.3103.7241l-2.62504 2.5c-.39993.3809-1.03291.3655-1.4138-.0344-.38088-.4-.36544-1.033.03449-1.4138L10.175 9.5 8.31035 7.72414c-.39993-.38089-.41537-1.01386-.03449-1.41379Z"
                                clip-rule="evenodd" />
                            <path d="M2 17v1c0 1.1046.89543 2 2 2h16c1.1046 0 2-.8954 2-2v-1H2Z" />
                        </svg>
                    </a>
                </div>


                {{-- Obat --}}
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>

                    <x-dropdown class="" align="right">
                        <x-slot name="trigger">
                            <button
                                class="inline-flex items-center mt-1 px-5 pt-5 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                <div class="mb-5">Obat</div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('obat.index')">
                                {{ __('List Obat') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('penjualan.index')">
                                {{ __('Penjualan') }}
                            </x-dropdown-link>
                        </x-slot>
                    </x-dropdown>


                    {{-- SPK --}}
                    <x-dropdown class="" align="right">
                        <x-slot name="trigger">
                            <button
                                class="inline-flex items-center mt-1 px-5 pt-5 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                <div class="mb-5">SPK</div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('spk.kriteria')">
                                {{ __('Kriteria') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('spk.alternatif')">
                                {{ __('Alternatif') }}
                            </x-dropdown-link>
                        </x-slot>
                    </x-dropdown>

                    
                    {{-- Parameter --}}
                    <x-dropdown class="" align="right">
                        <x-slot name="trigger">
                            <button
                                class="inline-flex items-center mt-1 px-5 pt-5 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                <div class="mb-5">Parameter</div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('parameter.kadaluwarsa')">
                                {{ __('Tingkat Kadaluwarsa') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('parameter.obat-khusus')">
                                {{ __('Obat Khusus') }}
                            </x-dropdown-link>
                        </x-slot>
                    </x-dropdown>


                    {{-- Laporan --}}
                    <x-dropdown class="" align="right">
                        <x-slot name="trigger">
                            <button
                                class="inline-flex items-center mt-1 px-5 pt-5 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                <div class="mb-5">Laporan</div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('laporan.perhitungan')">
                                {{ __('Perhitungan & Perankingan') }}
                            </x-dropdown-link>
                        </x-slot>
                    </x-dropdown>
                </div>
            
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link>
                        {{ __('Log Out') }}
                        {{-- :href="route('logout')"
                        onclick="event.preventDefault();
                                        this.closest('form').submit();" --}}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
