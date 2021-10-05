<x-guest-layout>
    <x-slot name="header">
        <div>
            @section('title', 'Inicio de sesión')
            <h1 
            class="max-w-7xl mx-auto text-green-esquel dark:text-green-esquel_title_dark text-center font-thin text-xl uppercase transition duration-300 ease-in-out"
            >
                Inicio de sesión
            </h1>
        </div>
    </x-slot>
    <x-slot name="content">
        <div class="w-auto h-auto bg-white dark:bg-gray-800 py-12 max-w-lg m-auto rounded-lg border shadow-md border-gray-300 dark:border-gray-600 transition duration-300 ease-in-out">
        <form 
            action="{{ route('checkUser') }}" 
            method="PUT" 
            class="m-auto max-w-md px-2 ssm:min-w-max ssm:px-20">
                @csrf
                @if (isset($alert))
                    <div class="my-5 px-5 py-3 text-sm text-center bg-red-500 w-full text-white">
                        {{$alert}}
                    </div>
                @endif
                <label 
                class="font-sans ml-2 uppercase tracking-wide text-green-esquel dark:text-gray-300 dark:hover:text-green-esquel_active hover:text-green-esquel w-50 text-sm transition duration-300 ease-in-out transform"
                for="usuario">
                    <div 
                    class="grid gap-y-6 grid-cols-10 grid-rows-1 overflow-hidden break-all"
                    >
                        <img 
                        alt="icono de usuario en login"
                        class="pt-1 flex justify-center rounded-sm dark:bg-gray-300 transition duration-300 ease-in-out"
                        width="22px"
                        src="https://img.icons8.com/ios-glyphs/90/000000/user--v1.png"/>
                        <span class="my-auto text-left col-start-2 col-span-9">
                            Email
                        </span>
                    </div>
                    <input 
                    name="email" 
                    type="email" 
                    required 
                    placeholder="ejemplo@ejemplo.com" 
                    autocomplete="on"
                    class="mt-3 mb-4 w-full bg-gray-100 hover:bg-white dark:bg-gray-800 dark:hover:bg-gray-900 text-green-esquel dark:text-green-esquel_active border border-gray-300 dark:border-gray-700 hover:border-gray-400 rounded text-sm hover:shadow-md hover:-translate-y-2 transition transform duration-300 ease-in-out"
                    />
                </label>

                <label 
                class="font-sans ml-2 uppercase tracking-wide text-green-esquel dark:text-gray-300 dark:hover:text-green-esquel_active hover:text-green-esquel w-50 text-sm transition duration-300 ease-in-out transform" 
                for="password"
                >
                    <div 
                    class="grid gap-y-6 grid-cols-10 grid-rows-1 overflow-hidden break-all"
                    >
                        <img 
                        alt="icono de clave en login"
                        class="pt-1 flex justify-center rounded-sm dark:bg-gray-300 transition duration-300 ease-in-out"
                        width="22px"
                        src="https://img.icons8.com/material-rounded/96/000000/password.png"/>
                        <span class="my-auto text-left col-start-2 col-span-9">
                        Contraseña
                        </span>
                    </div>
                    <div 
                    class="flex py-1 leading-normal flex-col ssm:flex-row mt-2"
                    >
                        <input 
                        id="password" 
                        name="password" 
                        type="password" 
                        minlength="5" 
                        maxlength="20" 
                        required 
                        placeholder="contraseña" 
                        autocomplete="on"
                        class="w-full bg-gray-100 hover:bg-white dark:bg-gray-800 dark:hover:bg-gray-900 text-green-esquel dark:text-green-esquel_active border border-gray-300 dark:border-gray-700 hover:border-gray-400 rounded text-sm hover:shadow-md hover:-translate-y-2 transition transform duration-300 ease-in-out" 
                        />     
                        <button
                        type="button" 
                        onclick="pass()" 
                        class="flex text-center w-26 mt-2 sm:m-0 sm:w-auto m-auto py-2 px-2 sm:ml-2 border-0 focus:outline-none rounded-md bg-yellow-500 hover:bg-yellow-600 text-white transition duration-300 ease-in-out transform"
                        >
                            <div class="w-20 text-center m-auto">
                                <input type="button" name="showPass" id="showPass" value="Ver" class="bg-transparent">
                            </div>
                        </button>
                    </div>
                </label>
                <div class="pt-5 grid grid-row-2 gap-1">
                    <div class="flex justify-center overflow-hidden">
                        <button 
                        type="submit" 
                        class="grid grid-cols-3 grid-rows-1 py-2 my-3 w-40 overflow-hidden rounded bg-gradient-to-r from-green-esquel_title_dark to-green-esquel transition duration-300 ease-in-out transform hover:text-white text-gray-100 break-all hover:no-underline hover:scale-105 focus:no-underline"
                        >
                            <img 
                            class="m-auto transform scale-150"
                            width="22px" 
                            src="https://img.icons8.com/ios-glyphs/90/000000/login-rounded-right--v1.png"/> 
                            <span class="text-right w-16">
                                Ingresar
                            </span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <script>
            function pass(){
                var tipo = document.getElementById("password");
                if(tipo.type == "password"){
                    tipo.type = "text";
                    document.getElementById('showPass').value = "ocultar";
                }else{
                    tipo.type = "password";
                    document.getElementById('showPass').value = "ver";
                }
            }
        </script>
    </x-slot>
    <x-slot name="content_footer">
    </x-slot>
</x-guest-layout>
