<nav x-data="{ open: false }" class="bg-red-300 border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('home') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-white" />
                    </a>
                </div>

                <!-- Novo Tópico Link -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <a href="{{ route('newTopic') }}"
                        class="{{ request()->routeIs('newTopic') ? $currentBar : $sideBar }}">
                        {{ __('Novo') }}
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <a href="{{ route('dashboard') }}"
                        class="{{ request()->routeIs('dashboard') ? $currentBar : $sideBar }}">
                        {{ __('Tópicos') }}
                    </a>
                </div>

                {{-- Profile --}}
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <a href="{{ route('profile.edit') }}"
                        class="{{ request()->routeIs('profile.edit') ? $currentBar : $sideBar }}">
                        {{ __('Perfil') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</nav>
