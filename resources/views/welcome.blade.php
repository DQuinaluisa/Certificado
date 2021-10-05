<x-guest-layout>
    <x-slot name="header">
        <div class="py-px">
            @section('title', 'Inicio')
            <h1 class="max-w-7xl mx-auto text-2xl text-left md:text-center text-green-esquel dark:text-white font-sans transition duration-300 ease-in-out">
                Bienvenido
            </h1>
        </div>
    </x-slot>
    <x-slot name="content">
        <div class="w-full flex flex-col-reverse gap-y-5 lg:grid lg:grid-cols-2">
            <div class="swiper mySwiper w-full m-auto">
                <div class="swiper-wrapper w-full m-auto">
                    <div class="swiper-slide w-full m-auto">
                        <a href="https://esquel.org.ec/es/actualidad/noticia/noticias/item/1290-ministerio-de-educacion-recibe-herramienta-para-prevenir-suicidios-en-el-sistema-educativo.html">
                            <img
                                class="object-cover w-full h-96"
                                src="https://esquel.org.ec//images/noticias/educacionLIbro.jpg?v=8"
                            />
                        </a>
                    </div>
                    <div class="swiper-slide w-full m-auto">
                        <a href="https://esquel.org.ec/es/actualidad/noticia/noticias/item/1287-alianza-por-la-desnutricion-cronica-infantil-respuesta-para-la-proteccion-de-la-ninez-y-adolescencia-en-el-pais.html">
                            <img
                            class="object-cover w-full h-96"
                            src="https://esquel.org.ec/media/k2/items/cache/89be03aca8f1275a2e53b04561e41fc0_M.jpg?v=8"
                            />
                        </a>
                    </div>
                    <div class="swiper-slide w-full m-auto">
                        <a href="https://esquel.org.ec/es/actualidad/noticia/noticias/item/1266-dialogos-nacionales-un-pacto-social-por-el-ecuador.html">
                            <img
                                class="object-cover w-full h-96"
                                src="https://esquel.org.ec/media/k2/items/cache/e30009a3602f8cbfab5cfa0c873509ad_M.jpg?v=8"
                            />
                        </a>
                    </div>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-pagination"></div>
            </div>

            <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
            <script>
            var swiper = new Swiper('.mySwiper', {
                spaceBetween: 30,
                centeredSlides: true,
                autoplay: {
                delay: 2500,
                disableOnInteraction: false,
                },
                pagination: {
                el: '.swiper-pagination',
                clickable: true,
                },
                navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
                },
            });
            </script>

            <div
            class="w-full rounded-lg border-green-esquel">

                <form
                action="{{ route('checkUser_2') }}"
                method="PUT"
                class="m-auto px-2 py-10 ssm:p-10 max-w-lg shadow-md rounded-md relative bg-gray-100 dark:bg-gray-800 transition duration-300 ease-in-out">
                    @csrf
                    @if (isset($alert))
                        <div class="my-5 px-5 py-3 text-sm text-center bg-red-500 w-full text-white">
                            {{$alert}}
                        </div>
                    @endif
                    <div class="py-10 text-green-esquel dark:text-green-esquel_active text-center font-bold uppercase">
                        <h4>Descarga tus certificados</h4>
                    </div>
                    <div class="absolute right-10 top-4">
                        <a
                        href="{{ route('login') }}"
                        class="px-2 pt-4 break-words dark:bg-gray-300 rounded-xl">
                            <i class="fas fa-user fa-2x"></i>
                        </a>
                    </div>

                    <label for="cedula"
                    class="clear-both float-none font-sans text-justify mb-4 my tracking-wide text-green-esquel font-semibold hover:text-green-esquel_button dark:text-gray-300 w-50 text-sm transition duration-300 ease-in-out transform">
                    Cédula de identidad
                        <input
                        name="cedula"
                        type="number"
                        required
                        placeholder="1750636465"
                        autocomplete="on"
                        class="mt-3 my-8 mb-4 block bg-gray-100 hover:bg-white dark:bg-gray-800 dark:hover:bg-gray-900 dark:text-green-esquel_active border border-gray-300 dark:border-gray-700 hover:border-gray-400 w-full rounded text-sm text-green-esquel hover:shadow-md hover:-translate-y-2 transition transform duration-300 ease-in-out"/>
                    </label>

                    <label for="nombre"
                    class="clear-both float-none font-sans text-justify mb-4 my tracking-wide text-green-esquel font-semibold hover:text-green-esquel_button dark:text-gray-300 w-50 text-sm transition duration-300 ease-in-out transform">
                    Nombre completo
                        <input
                        name="nombre"
                        type="text"
                        required
                        placeholder="Juan Balverde"
                        autocomplete="on"
                        class="mt-3 my-8 mb-4 block bg-gray-100 hover:bg-white dark:bg-gray-800 dark:hover:bg-gray-900 dark:text-green-esquel_active border border-gray-300 dark:border-gray-700 hover:border-gray-400 w-full rounded text-sm text-green-esquel hover:shadow-md hover:-translate-y-2 transition transform duration-300 ease-in-out"/>
                    </label>

                    <label for="celular"
                    class="clear-both float-none font-sans text-justify mb-4 my tracking-wide text-green-esquel font-semibold hover:text-green-esquel_button dark:text-gray-300 w-50 text-sm transition duration-300 ease-in-out transform">
                    Celular
                        <input
                        name="celular"
                        type="number"
                        required
                        placeholder="0978906515"
                        autocomplete="on"
                        class="mt-3 my-8 mb-4 block bg-gray-100 hover:bg-white dark:bg-gray-800 dark:hover:bg-gray-900 dark:text-green-esquel_active border border-gray-300 dark:border-gray-700 hover:border-gray-400 w-full rounded text-sm text-green-esquel hover:shadow-md hover:-translate-y-2 transition transform duration-300 ease-in-out"/>
                    </label>

                    <label for="email"
                    class="clear-both float-none font-sans text-justify mb-4 my tracking-wide text-green-esquel font-semibold hover:text-green-esquel_button dark:text-gray-300 w-50 text-sm transition duration-300 ease-in-out transform">
                    Correo electrónico
                        <input
                        name="email"
                        type="email"
                        required
                        placeholder="juan_balverde@hotmail.com"
                        autocomplete="on"
                        class="mt-3 my-8 mb-4 block bg-gray-100 hover:bg-white dark:bg-gray-800 dark:hover:bg-gray-900 dark:text-green-esquel_active border border-gray-300 dark:border-gray-700 hover:border-gray-400 w-full rounded text-sm text-green-esquel hover:shadow-md hover:-translate-y-2 transition transform duration-300 ease-in-out"/>
                    </label>
                    <div class="w-full flex justify-center">
                        <input
                        id="submit"
                        type="submit"
                        value="Ingresar"
                        class="py-2 px-10 outline-none text-sm bg-white hover:bg-green-esquel_button dark:bg-gray-800 dark:hover:bg-green-esquel_button text-gray-500 dark:text-gray-300 dark:hover:text-gray-100 hover:text-gray-800 rounded border border-gray-500 hover:border-green-esquel_button hover:shadow-xl transition duration-300 ease-in-out transform hover:scale-105 content-center">
                    </div>
                </form>
            </div>
        </div>
    </x-slot>
    <x-slot name="content_footer">
    </x-slot>
</x-guest-layout>
