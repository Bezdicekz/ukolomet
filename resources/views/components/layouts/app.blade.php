
<body class="bg-cb1 font-sans">
    <div class="w-full mx-auto md:w-4/5 lg:2/3">
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

                        @if (Auth::check())
                            <!-- Uživatel je přihlášený - zobrazit ikonu pro odhlášení -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <button type="submit" class="text-xs font-bold py-2 px-4 rounded-md transition duration-700 ease-in-out hover:text-white hover:bg-cbtsec" title="Odhlášení"><p>{{auth()->user()->name}}</p>Odhlásit se</button>
                            <!-- <button type="submit" class="py-2 px-4 rounded-md transition duration-700 ease-in-out hover:text-white hover:bg-cbtsec" title="Odhlášení">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 10.5V6.75a4.5 4.5 0 1 1 9 0v3.75M3.75 21.75h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H3.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
                                </svg>
                            </button>
                            -->

                            </form>
                        @else
                            <!-- Uživatel není přihlášený - zobrazit ikonu pro přihlášení -->
                            <a class="py-2 px-4 rounded-md transition duration-700 ease-in-out hover:text-white hover:bg-cbtsec" href="{{ route('login') }}" title="Přihlášení">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
                                </svg>
                            </a>
                        @endif
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
                            <a href="./ukol">
                                <p class="transition duration-500 ease-in-out p-2 hover:bg-cbtsec rounded-lg font-bold cursor-pointer">Nový úkol</p>
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

                            @if (Auth::check())
                            <!-- Uživatel je přihlášený - zobrazit ikonu pro odhlášení -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <button type="submit" class="transition duration-500 ease-in-out p-2 hover:bg-cbtsec rounded-lg font-bold cursor-pointer" title="Odhlášení"><p>{{auth()->user()->name}}</p>Odhlásit se</button>
                                </form>
                            @else
                                <!-- Uživatel není přihlášený - zobrazit ikonu pro přihlášení -->
                                <a class="transition duration-500 ease-in-out p-2 hover:bg-cbtsec rounded-lg font-bold cursor-pointer" href="./login" title="Přihlášení">Přihlášení
                                </a>
                            @endif


                        </div>
                    </div>
                </header>
    </div>

            {{$slot}}

    <footer class="bg-ctsec">
      <div class="text-cb1 my-6 px-6 py-6 md:grid md:grid-cols-2 lg:flex md:mx-20 lg:mx-48">
          <ul class="text-center w-1/3">
              <li class="text-xl font-bold pb-4">Informace</li>
              <p class="px-20">Úkolomet je webová aplikace, která pomáhá s organizací úkolů. Po přihlášení se zobrazí další volby a nastavení.</p>
              <p>Všechny osobní údaje budou použity výhradně pro účely této aplikace.</p>
              <p class="text-xl font-bold pt-6 pb-2">Více informací:</p>
              <a class="font-bold hover:text-cb2" href="./osobni-udaje">Zpracování osobních údajů</a>
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
              <li><a class="px-3 py-2 rounded-lg hover:text-cb2" href="./">Hlavní stránka</a></li>
              <li><a class="px-3 py-2 rounded-lg hover:text-cb2" href="./projekty">Projekty</a></li>
              <li><a class="px-3 py-2 rounded-lg hover:text-cb2" href="./ukol">Nový úkol</a></li>
              <li><a class="px-3 py-2 rounded-lg hover:text-cb2" href="./reporty">Reporty</a></li>
              <li><a class="px-3 py-2 rounded-lg hover:text-cb2" href="./dashboard">Dashboard</a></li>
              <li><a class="px-3 py-2 rounded-lg hover:text-cb2" href="./profil">Profil</a></li>
              <li><a class="px-3 py-2 rounded-lg hover:text-cb2" href="./registrace">Registrace</a></li>
              <li><a class="px-3 py-2 rounded-lg hover:text-cb2" href="./login">Přihlášení</a></li>
          </ul>
      </div>
  </footer>

  </body>
</html>