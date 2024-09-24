<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Úkolomet</title>
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
            <a class="relative py-2 px-4 rounded-md transition duration-700 ease-in-out hover:text-white hover:bg-cbtsec" href="./dashboard" title="Dashboard"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6h9.75M10.5 6a1.5 1.5 0 1 1-3 0m3 0a1.5 1.5 0 1 0-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-3.75 0H7.5m9-6h3.75m-3.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-9.75 0h9.75" />
              </svg>
              </a>
              
  
            <a class="py-2 px-4 rounded-md transition duration-700 ease-in-out hover:text-white hover:bg-cbtsec" href="./profil" title="Profil"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
              </svg>
              </a>
  
            <a class="py-2 px-4 rounded-md transition duration-700 ease-in-out hover:text-white hover:bg-cbtsec" href="./login.html" title="Přihlášení"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
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
                    <a href="./projekty.html"><p class="transition duration-500 ease-in-out p-2 hover:bg-cbtsec rounded-lg font-bold cursor-pointer">Projekty</p></a>
                    <a href="./ukoly.html"><p class="transition duration-500 ease-in-out p-2 hover:bg-cbtsec rounded-lg font-bold cursor-pointer">Úkoly</p></a>
                    <a href="./reporty.html"><p class="transition duration-500 ease-in-out p-2 hover:bg-cbtsec rounded-lg font-bold cursor-pointer">Reporty</p></a>
                    <a href="./dashboard.html"><p class="transition duration-500 ease-in-out p-2 hover:bg-cbtsec rounded-lg font-bold cursor-pointer">Dashboard</p></a>
                    <a href="./profil.html"><p class="transition duration-500 ease-in-out p-2 hover:bg-cbtsec rounded-lg font-bold cursor-pointer">Profil</p></a>
                    <a href="./login.html"><p class="transition duration-500 ease-in-out p-2 hover:bg-cbtsec rounded-lg font-bold cursor-pointer">Přihlášení</p></a>
                </div>
            </div>
    </header>


        <main class="border border-gray-300 md:flex mx-auto items-center justify-center text-ctprim">
            <div class="collapse md:flex md:flex-col md:visible md:bg-[url('/public/img/login-picture.png')] md:bg-size-full md:bg-cover md:bg-center md:text-center md:w-1/2 md:justify-center md:items-center md:py-60 md:gap-2">
                <h1 class="collapse md:visible md:text-5xl lg:text-7xl md:font-bold md:pb-12">Úkolomet</h1>
                <p class="collapse md:visible md:text-xl md:font-bold">Mějte svoje úkoly pod kontrolou.</p>
                <p class="collapse md:visible md:text-xl md:font-bold">Po přihlášení můžete zadávat úkoly a organizovat svůj čas.</p>
            </div>

            <div class="flex flex-col md:w-1/2">
                <div class="flex flex-col items-center justify-center">
                    <div class="md:hidden text-center">
                        <h1 class="text-5xl font-bold">Úkolomet</h1>
                        <p class="text-xl">Mějte svoje úkoly pod kontrolou.</p>
                        <p class="text-xl">Po přihlášení můžete zadávat úkoly a organizovat svůj čas.</p>
                    </div>
                </div>

                <div class="flex flex-col text-center">
                    <div class="flex flex-col py-12 font-bold">
                        <h1 class="text-3xl">Vítej zpět</h1>
                        <p class="text-xl py-2 font-bold">Vlož svůj email, heslo a přihlaš se do Úkolometu</p>
                    </div>
                    <form action="#" method="get" class="flex flex-col w-2/3 text-xl gap-2 py-6 mx-auto justify-center text-center">
                        <label class="font-bold" for="email">Email</label>
                        <input class="text-center rounded-lg border border-ctsec py-2" id="email" type="email" name="email" placeholder="Napiš svůj email" required>
                        <label class="font-bold" for="password">Heslo</label>
                        <input class="text-center rounded-lg border border-ctsec py-2" id="password" type="password" name="password" placeholder="Napiš své heslo" required>

                        <div class="flex gap-6 py-6 justify-center">
                            <label>
                                <input type="checkbox" checked="checked">
                                <span class="checkmark"></span>Zapamatuj heslo
                            </label>                    
                            <div class="flex gap-2">
                                <p>Zapoměl jsi heslo?  </p>
                                <a href="#">Změnit heslo</a>
                            </div>
                        </div>

                        <button class="py-2 rounded-lg bg-cbtprim text-cbttprim hover:bg-cbtsec hover:text-cbttsec" type="submit">Přihlaš se</button>

                    </form>

                    <div class="justify-center">
                        <div class="flex gap-2 font-bold justify-center pb-6">
                            <p>Nemám účet  </p>
                            <a href="/registrace">Registrace</a>
                        </div>
                        <p>nebo se přihlas přes</p>
                        <button class="font-bold">Google</button>
                        <button class="font-bold">Facebook</button>
                    </div>
                </div>
            </div>
        </main>


    </div>

    <footer class="bg-ctsec">
        <div class="text-cb1 my-6 px-6 py-6 lg:flex md:mx-20 lg:mx-48">
            <ul class="text-center w-1/3">
                <li class="text-xl font-bold pb-4">Informace</li>
                <p class="px-20">Úkolomet je webová aplikace, která pomáhá s organizací úkolů. Po přihlášení se zobrazí další volby a nastavení.</p>
                <p>Všechny osobní údaje budou použity výhradně pro účely této aplikace.</p>
                <p class="text-xl font-bold pt-6 pb-2">Více informací:</p>
                <a class="font-bold hover:text-cb2" href="./osobni-udaje.html">Zpracování osobních údajů</a>
            </ul>
  
            <ul class="text-center w-1/3">
                <li class="text-xl font-bold pb-4">Kontakt</li>
                <li class="font-bold py-2">Adresa</li>
                <li class="text-cb3 font-bold">Zdeněk Bezdíček</li>
                <li>17. listopadu 475</li>
                <li>Klášterec nad Ohří</li>
                <li class="font-bold py-2">Telefon</li>
                <li class="text-cb3 font-bold">+420 774 253 976</li>
                <li class="font-bold py-2">E-mail</li>
                <li>zdenek.bezdicek@gmail.com</li>
            </ul>
  
            <ul class="flex flex-col gap-2 text-center w-1/3">
                <li class="px-3 text-xl font-bold pb-4">Odkazy</li>
                <li class="px-3 font-bold py-2">Úkolomet</li>
                <li><a class="px-3 py-2 rounded-lg hover:text-cb2" href="./index.html">Hlavní stránka</a></li>
                <li><a class="px-3 py-2 rounded-lg hover:text-cb2" href="./projekty.html">Projekty</a></li>
                <li><a class="px-3 py-2 rounded-lg hover:text-cb2" href="./ukoly.html">Úkoly</a></li>
                <li><a class="px-3 py-2 rounded-lg hover:text-cb2" href="./reporty.html">Reporty</a></li>
                <li><a class="px-3 py-2 rounded-lg hover:text-cb2" href="./dashboard.html">Dashboard</a></li>
                <li><a class="px-3 py-2 rounded-lg hover:text-cb2" href="./profil.html">Profil</a></li>
                <li><a class="px-3 py-2 rounded-lg hover:text-cb2" href="./registrace.html">Registrace</a></li>
                <li><a class="px-3 py-2 rounded-lg hover:text-cb2" href="./login.html">Přihlášení</a></li>
            </ul>
        </div>
    </footer>

    
</body>
</html>