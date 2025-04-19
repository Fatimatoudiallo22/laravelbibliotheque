<nav x-data="{ open: false }" class="bg-black text-white shadow-md">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <div class="flex">
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}" class="focus:outline-none focus:ring focus:ring-gray-300 rounded-md">
                        <x-application-logo class="block h-9 w-auto fill-current text-white" />
                    </a>
                </div>

                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="text-lg text-white hover:text-gray-300 focus:outline-none focus:ring focus:ring-gray-300 rounded-md py-2">
                        {{ __('Dashboard') }}
                    </x-nav-link>

                    <x-nav-link :href="route('livres.index')" :active="request()->routeIs('livres.index')" class="text-lg text-white hover:text-gray-300 focus:outline-none focus:ring focus:ring-gray-300 rounded-md py-2">
                        {{ __('Livres') }}
                    </x-nav-link>

                    <x-nav-link :href="route('commandes.index')" :active="request()->routeIs('commandes.index')" class="text-lg text-white hover:text-gray-300 focus:outline-none focus:ring focus:ring-gray-300 rounded-md py-2">
                        {{ __('Commandes') }}
                    </x-nav-link>

                    @if(Auth::user()->role == 'gestionnaire')
                        <x-nav-link :href="route('clients.index')" :active="request()->routeIs('clients.index')" class="text-lg text-white hover:text-gray-300 focus:outline-none focus:ring focus:ring-gray-300 rounded-md py-2">
                            {{ __('Clients') }}
                        </x-nav-link>

                        <x-nav-link :href="route('paiements.index')" :active="request()->routeIs('paiements.index')" class="text-lg text-white hover:text-gray-300 focus:outline-none focus:ring focus:ring-gray-300 rounded-md py-2">
                            {{ __('paiements') }}
                        </x-nav-link>

                        <x-nav-link :href="route('statistiques.index')" :active="request()->routeIs('statistiques.index')" class="text-lg text-white hover:text-gray-300 focus:outline-none focus:ring focus:ring-gray-300 rounded-md py-2">
                            {{ __('statistiques') }}
                        </x-nav-link>
                    @endif
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48" class="shadow-md rounded-md bg-white dark:bg-gray-800">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-transparent hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>
                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.afficher')" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none transition duration-150 ease-in-out">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none transition duration-150 ease-in-out">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-white hover:text-gray-300 hover:bg-gray-800 focus:outline-none focus:bg-gray-800 focus:text-gray-300 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-gray-800">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="block px-4 py-2 text-base text-white hover:bg-gray-900 focus:outline-none focus:bg-gray-900 focus:text-white">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('livres.index')" :active="request()->routeIs('livres.index')" class="block px-4 py-2 text-base text-white hover:bg-gray-900 focus:outline-none focus:bg-gray-900 focus:text-white">
                {{ __('Livres') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('commandes.index')" :active="request()->routeIs('commandes.index')" class="block px-4 py-2 text-base text-white hover:bg-gray-900 focus:outline-none focus:bg-gray-900 focus:text-white">
                {{ __('Commandes') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('clients.index')" :active="request()->routeIs('clients.index')" class="block px-4 py-2 text-base text-white hover:bg-gray-900 focus:outline-none focus:bg-gray-900 focus:text-white">
                {{ __('Clients') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('paiements.index')" :active="request()->routeIs('paiements.index')" class="block px-4 py-2 text-base text-white hover:bg-gray-900 focus:outline-none focus:bg-gray-900 focus:text-white">
                {{ __('Factures') }}
            </x-responsive-nav-link>
        </div>

        <div class="pt-4 pb-1 border-t border-gray-700">
            <div class="px-4">
                <div class="font-medium text-base text-white">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-300">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.afficher')" class="block px-4 py-2 text-base text-white hover:bg-gray-900 focus:outline-none focus:bg-gray-900 focus:text-white">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();" class="block px-4 py-2 text-base text-white hover:bg-gray-900 focus:outline-none focus:bg-gray-900 focus:text-white">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>