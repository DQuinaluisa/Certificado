<nav x-data="{ open: false }" class="min-w-full bg-white z-10 py-3">
    <div class="block sm:flex justify-between max-w-7xl mx-auto px-0 sm:px-6 ">
        <div class="block sm:flex sm:justify-between">
            <x-nav-base/>
            <div class="hidden invisible space-x-8 sm:-my-px sm:ml-10 sm:flex lg:visible my-auto">
                @auth
                    <form 
                    action="{{ route('logout') }}" 
                    method="POST" 
                    class="my-auto"
                    >
                    <a 
                    href="{{ url('logout') }}" onclick="this.closest('form').submit()" 
                    class="my-auto p-1 bg-red-500 text-white rounded-md hover:bg-red-600 text-center"
                        >Cerrar sesión</a>
                    </form>
                @endauth
                    <a
                    class="my-auto p-1"
                    href="{{ route('mas_cursos') }}">
                        {{ __('Más cursos') }}
                    </a>
                    <a
                    class="my-auto p-1" 
                    href="{{ route('buscar') }}">
                        {{ __('Inicio') }}
                    </a> 
            </div>
        </div>
        <x-jet-dropdown>
            <x-slot name="trigger">
                <div class="flex py-0 sm:py-8 justify-end visible lg:invisible lg:hidden">
                    @auth
                        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                            <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                            </button>
                        @else
                            <span class="inline-flex rounded-md">
                                <button type="button" class="leading-loose inline-flex items-center px-3 py-2 border border-transparent text-sm font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                                    @auth    
                                        {{ Auth::user()->name }}
                                    @endauth
                                    <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </span>
                        @endif
                    @endauth
                    @unless (Auth::check())
                        <span class="inline-flex rounded-md">
                            <button type="button" class="leading-loose inline-flex items-center px-3 py-2 border border-transparent text-sm  font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                                User
                                <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </span>
                    @endunless
                </div>
            </x-slot>
            <x-slot name="content">
                @auth
                    <form action="{{ route('logout') }}" method="POST" class="leading-loose px-2 my-4 bg-red-500 text-white rounded-md hover:bg-red-600 text-center">
                        <a href="{{ url('logout') }}" onclick="this.closest('form').submit()" class="">Cerrar sesión</a>
                    </form>
                @endauth
                    <a
                    class="my-auto p-1"
                    href="{{ route('mas_cursos') }}">
                        {{ __('Más cursos') }}
                    </a>
                    <a href="{{ route('buscar') }}">
                        {{ __('Inicio') }}
                    </a>
            </x-slot>
        </x-jet-dropdown>
    </div>
</nav>
