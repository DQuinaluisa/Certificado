<nav x-data="{ open: false }" class="min-w-full bg-white z-10">
    <div class="block sm:flex justify-between max-w-7xl mx-auto px-0 sm:px-6 ">                  
        <div class="block sm:flex sm:justify-between">
            <div class="block sm:flex">
                <x-nav-base/>
                <div class="hidden invisible space-x-8 py-8 sm:-my-px sm:ml-10 sm:flex lg:visible">
                    @if (isset($rol))
                        @if ($rol != '1')
                            @auth
                            <a href="{{ route('mas_cursos') }}">
                                {{ __('Más cursos') }}
                            </a>

                            <a href="{{ route('cursos_aprobados') }}">
                                {{ __('Certificados') }}
                            </a> 
                            
                            <a href="{{ route('profile.show') }}">
                                {{ __('Perfil') }}
                            </a>
                            <form action="{{ route('logout') }}" method="POST">
                                <a href="{{ url('logout') }}" onclick="this.closest('form').submit()" class="">Cerrar sesión</a>
                            </form>
                            @endauth
                            @unless (Auth::check())
                            <a href="{{ route('buscar') }}">
                                {{ __('Welcome') }}
                            </a>
                            @endunless
                        @endif
                    @endif
                    @if (isset($rol))
                        @if ($rol == '1')
                            @auth
                            <a href="{{ route('cursos.index') }}">
                                {{ __('Crear cursos') }}
                            </a>
                            <a href="{{ route('certificados_create') }}">
                                {{ __('Crear certificado') }}
                            </a>
                            <form action="{{ route('logout') }}" method="POST">
                                <a href="{{ url('logout') }}" onclick="this.closest('form').submit()" class="">Cerrar sesión</a>
                            </form>
                            @endauth
                            @unless (Auth::check())
                            <a href="{{ route('buscar') }}">
                                {{ __('Welcome') }}
                            </a>
                            @endunless
                        @endif
                    @endif
                </div>
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
                <div class="relative">
                    @if (isset($rol))
                        @if ($rol != '1')
                            @auth
                            <a href="{{ route('mas_cursos') }}">
                                {{ __('Más cursos') }}
                            </a>
    
                            <a href="{{ route('cursos_aprobados')}}">
                                {{ __('Certificados') }}
                            </a> 
                            
                            <a href="{{ route('profile.show') }}">
                                {{ __('Perfil') }}
                            </a>
                            <form action="{{ route('logout') }}" method="POST">
                                <a href="{{ url('logout') }}" onclick="this.closest('form').submit()" class="">Cerrar sesión</a>
                            </form>
                            @endauth
                            @unless (Auth::check())
                            <a href="{{ route('buscar') }}">
                                {{ __('Welcome') }}
                            </a>
                            @endunless
                        @endif
                    @endif
                    @if (isset($rol))
                        @if ($rol == '1')
                            @auth
                            <a href="{{ route('cursos.index') }}">
                                {{ __('Crear cursos') }}
                            </a>
                            <a href="{{ route('certificados_create') }}">
                                {{ __('Crear certificado') }}
                            </a>
                            <form action="{{ route('logout') }}" method="POST">
                                <a href="{{ url('logout') }}" onclick="this.closest('form').submit()" class="">Cerrar sesión</a>
                            </form>
                            @endauth
                            @unless (Auth::check())
                            <a href="{{ route('buscar') }}">
                                {{ __('Welcome') }}
                            </a>
                            @endunless
                        @endif
                    @endif
                </div>
            </x-slot>
        </x-jet-dropdown>
    </div>
</nav>
