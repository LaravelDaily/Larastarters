<template>
    <div class="font-sans antialiased text-gray-900">
        <main>
            <section class="relative w-full h-full min-h-screen py-40">
                <div class="absolute top-0 w-full h-full bg-no-repeat  bg-slate-800 bg-full"
                    style="background-image: url('/images/register_bg_2.png')"></div>

                <div class="container h-full px-4 mx-auto">
                    <div class="flex items-center content-center justify-center h-full ">
                        <slot />
                    </div>
                </div>

                <footer class="absolute bottom-0 w-full pb-6 bg-slate-800">
                    <div class="container px-4 mx-auto">
                        <hr class="mb-6 border-b-1 border-slate-600" />
                        <div class="flex flex-wrap items-center justify-center  md:justify-between">
                            <div class="w-full px-4 md:w-4/12">
                                <div class="py-1 text-sm font-semibold text-center text-white md:text-left">
                                    Copyright ©
                                    <span id="get-current-year"></span>
                                    <a href="https://www.creative-tim.com?ref=njs-login"
                                        class="py-1 text-sm font-semibold text-white  hover:text-slate-300">
                                        Creative Tim
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
            </section>
        </main>
    </div>
</template>
