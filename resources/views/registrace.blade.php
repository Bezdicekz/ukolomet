<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrace</title>
    <script src="//unpkg.com/alpinejs" defer></script>
    @vite('resources/css/app.css')
</head>

<body class="bg-cb1 font-sans">
    <div class="w-full mx-auto md:w-4/5 lg:2/3">
        <!--
        ---------------- Řádek navigace ----------------
        -->
        <header class="flex gap-4 py-2 items-center justify-between px-4 pb-12">
            <a href="./">
                <img class="w-48 min-w-28 transition duration-700 ease-in-out hover:scale-110" src="/img/logo.webp" alt="logo úkolomet">
            </a>

            <nav class="lg:flex hidden gap-4 text-xl ">
                <a class="py-2 px-4 rounded-md transition duration-700 ease-in-out hover:text-white hover:bg-cbtsec" href="./projekty">Projekty</a>
                <a class="py-2 px-4 rounded-md transition duration-700 ease-in-out hover:text-white hover:bg-cbtsec" href="./ukoly">Úkoly</a>
                <a class="py-2 px-4 rounded-md transition duration-700 ease-in-out hover:text-white hover:bg-cbtsec" href="./reporty">Reporty</a>
            </nav>

            <div class="lg:flex hidden gap-4 text-xl">
                <a class="relative py-2 px-4 rounded-md transition duration-700 ease-in-out hover:text-white hover:bg-cbtsec" href="./dashboard" title="Dashboard">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6h9.75M10.5 6a1.5 1.5 0 1 1-3 0m3 0a1.5 1.5 0 1 0-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-3.75 0H7.5m9-6h3.75m-3.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-9.75 0h9.75" />
                    </svg>
                </a>
                
                <a class="py-2 px-4 rounded-md transition duration-700 ease-in-out hover:text-white hover:bg-cbtsec" href="./profil" title="Profil">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                    </svg>
                </a>

                <a class="py-2 px-4 rounded-md transition duration-700 ease-in-out hover:text-white hover:bg-cbtsec" href="./login" title="Přihlášení">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
                    </svg>
                </a>
            </div>

            <!--
            ---------------- Hamburgerové menu ----------------
            -->
            <div x-data="{open: false}" class="relative lg:hidden py-4 px-8">
                <button @click="open = !open">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                </button>

                <div class="absolute bg-cb3 opacity-90 top-10 right-5 shadow-lg h-auto w-48 p-4 rounded border border-ctprim space-y-2" x-show="open" @click.away="open = false" x-transition>
                    <a href="./projekty">
                        <p class="transition duration-500 ease-in-out p-2 hover:bg-cbtsec rounded-lg font-bold cursor-pointer">Projekty</p>
                    </a>
                    <a href="./ukoly">
                        <p class="transition duration-500 ease-in-out p-2 hover:bg-cbtsec rounded-lg font-bold cursor-pointer">Úkoly</p>
                    </a>
                    <a href="./reporty">
                        <p class="transition duration-500 ease-in-out p-2 hover:bg-cbtsec rounded-lg font-bold cursor-pointer">Reporty</p>
                    </a>
                    <a href="./dashboard">
                        <p class="transition duration-500 ease-in-out p-2 hover:bg-cbtsec rounded-lg font-bold cursor-pointer">Dashboard</p>
                    </a>
                    <a href="./profil">
                        <p class="transition duration-500 ease-in-out p-2 hover:bg-cbtsec rounded-lg font-bold cursor-pointer">Profil</p>
                    </a>
                    <a href="./login">
                        <p class="transition duration-500 ease-in-out p-2 hover:bg-cbtsec rounded-lg font-bold cursor-pointer">Přihlášení</p>
                    </a>
                </div>
            </div>
        </header>



        <!--
        ---------------- Sekce main ----------------
        -->
        <main class="md:border-t-4 md:border-cbtsec md:flex mx-auto items-center justify-center text-ctprim md:py-16">
            <div class="collapse md:flex md:flex-col md:visible md:bg-[url('/public/img/login-picture.png')] md:bg-contain md:bg-no-repeat md:bg-center md:bg-size-full md:bg-cover md:bg-center md:text-center md:w-1/2 md:justify-center md:items-center md:py-60 md:gap-2 lg:bg-contain lg:bg-no-repeat lg:bg-center lg:bg-size-full lg:bg-cover lg:bg-center lg:text-center lg:w-1/2 lg:justify-center lg:items-center lg:py-60 lg:gap-2">
                <h1 class="collapse md:visible md:text-3xl lg:text-5xl md:font-bold md:pb-12">Úkolomet</h1>
                <p class="collapse md:visible md:font-bold">Mějte svoje úkoly pod kontrolou.</p>
                <p class="collapse md:visible md:font-bold">Registrací získáš přístup do aplikace..</p>
            </div>

            <div class="flex flex-col md:w-1/2">
                <div class="flex flex-col items-center justify-center">
                    <div class="md:hidden text-center">
                        <h1 class="text-xl font-bold">Úkolomet</h1>
                        <p>Mějte svoje úkoly pod kontrolou.</p>
                        <p>Registrací získáš přístup do aplikace.</p>
                    </div>
                </div>

                <div class="flex flex-col text-center">
                    <div class="flex flex-col py-6 font-bold">
                        <h1 class="text-2xl">Registrace</h1>
                        <p class="py-2">Zadej svůj e-mail a nastav heslo.</p>
                    </div>
                    <form action="/registrace" method="post" class="flex flex-col w-2/3 gap-2 py-6 mx-auto justify-center text-center">
                        <label class="font-bold" for="email1">Email</label>
                        <input class="text-center rounded-lg border border-ctsec py-2 text-xs" id="email" type="email" name="email1" placeholder="Napiš svůj email" required>
                        <label class="font-bold" for="password1">Heslo</label>
                        <input class="text-center rounded-lg border border-ctsec py-2 text-xs" id="password1" type="password" name="password1" placeholder="Napiš své heslo" required>
                        <input class="text-center rounded-lg border border-ctsec py-2 text-xs" id="password2" type="password" name="password2" placeholder="Potvrď své heslo" required>


                        <button class="py-2 my-2 font-bold rounded-lg bg-cbtprim text-cbttprim hover:bg-cbtsec hover:text-cbttsec" type="submit">Registrovat se</button>

                    </form>

                    <div class="justify-center">
                        <div class="flex gap-2 font-bold justify-center pb-6">
                            <p>Již mám účet:  </p>
                            <a class="hover:underline hover:cursor-pointer" href="/login">Přihlásit se</a>
                        </div>
                        <p>nebo se zaregistruj přes</p>
                        <button class="hover:underline hover:cursor-pointer font-bold px-2">Google</button>
                        <button class="hover:underline hover:cursor-pointer font-bold"px-2>Facebook</button>
                    </div>
                </div>
            </div>
        </main>
    </div>
  
</body>
</html>