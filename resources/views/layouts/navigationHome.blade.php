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

                <!-- Home -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? $currentBar : $sideBar }}">
                        {{ __('Home') }}
                    </a>
                </div>

                <!-- Topics -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <a href="{{ '' }}"
                        class="{{ request()->routeIs('dashboard') ? $currentBar : $sideBar }}">
                        {{ __('Tópicos') }}
                    </a>
                </div>

                {{-- Users --}}
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <a href="{{ '' }}"
                        class="{{ request()->routeIs('profile.edit') ? $currentBar : $sideBar }}">
                        {{ __('Usuários') }}
                    </a>
                </div>

                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <a href="{{ '' }}"
                        class="{{ request()->routeIs('profile.edit') ? $currentBar : $sideBar }}">
                        {{ __('teste') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</nav>
