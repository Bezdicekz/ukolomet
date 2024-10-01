<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Úkolomet</title>
    <script src="//unpkg.com/alpinejs" defer></script>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
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

                @if (Auth::check())
                    <!-- Uživatel je přihlášený - zobrazit ikonu pro odhlášení -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="py-2 px-4 rounded-md transition duration-700 ease-in-out hover:text-white hover:bg-cbtsec" title="Odhlášení">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 10.5V6.75a4.5 4.5 0 1 1 9 0v3.75M3.75 21.75h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H3.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
                            </svg>
                        </button>
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

    </div>

    <main class="mt-6 md:grid md:grid-cols-2 lg:flex mx-4 gap-4 lg:h-[85vh]">
        <div class="bg-cb3 mb-4 rounded-lg shadow-lg p-4 lg:w-1/4">
          <!-- Horní část kalendáře: měsíc a tlačítka -->
          <div class="flex justify-between items-center mb-2">
            <h2 id="kalendar-mesic-rok" class="text-lg font-semibold">Září 2024</h2>
            <div class="flex items-center space-x-2">
              <button id="mesic-zpet" class="text-gray-500 hover:text-gray-700">&lt;</button>
              <button id="mesic-vpred" class="text-gray-500 hover:text-gray-700">&gt;</button>
            </div>
          </div>
      
          <!-- Nadpisy pro dny v týdnu -->
          <div class="grid grid-cols-7 text-center text-gray-700 font-semibold">
            <div>Po</div>
            <div>Út</div>
            <div>St</div>
            <div>Čt</div>
            <div>Pá</div>
            <div>So</div>
            <div>Ne</div>
          </div>
      
          <!-- Kalendářové dny -->
          <div id="dny-v-kalendari" class="grid grid-cols-7 text-center mt-2 text-gray-500">
            <!-- Dny budou generovány pomocí JavaScriptu -->
          </div>
      
          <div>
              <h2 class="text-xl py-6">Úkoly pro dnešní den:</h2>
      
              <!-- seznam aktuálních úkolů -->     
              <div class="flex gap-2 items-center">
                  
                  <!-- Ikona spuštění úkol je hotový -->
                  <div id="hotovo" class="w-4 h-4 border border-gray-300 rounded-md hover:border-gray-800"></div>
                  <p class="w-4/6">Úkol 1</p>

                  <div class="flex gap-2 items-center ml-auto pr-2">
                    
                    <!-- Ikona spuštění úkolu -->
                    <svg id="spust-ukol" class="hover:text-gray-800 w-6 h-6 text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5.25 5.653c0-.856.917-1.398 1.667-.986l11.54 6.347a1.125 1.125 0 0 1 0 1.972l-11.54 6.347a1.125 1.125 0 0 1-1.667-.986V5.653Z" />
                    </svg>
                    
                    <!-- Ikona edituj úkol -->
                    <svg id="edituj-ukol" class="hover:text-gray-800 w-6 h-6 text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                    </svg>
        
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="hover:text-gray-800 w-6 h-6 text-gray-300">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                      </svg>
                  </div>  
              </div>
          </div>
          </div>
        </div>

        <!-- Nedcházející úkoly -->    
        <div class="bg-cb3  mb-4 rounded-lg shadow-lg p-4 lg:w-1/4">
          <h2 class="text-lg font-semibold pb-6">Nadcházející úkoly:</h2>

                        <!-- seznam aktuálních úkolů -->     
                        <div class="flex gap-2 items-center">
                          
                          <!-- Ikona spuštění úkol je hotový -->
                          <div id="hotovo" class="w-4 h-4 border border-gray-300 rounded-md hover:border-gray-800"></div>
                          <div class="flex flex-col w-4/6">
                            <p>Úkol 1</p>
                            <!-- Uběhnutý čas úkolu -->
                            <p id="cas-ukolu" x-text="finalTime" class="hover:text-gray-800 text-gray-300 text-left">00:00:00</p>
                          </div>
                          <div class="flex gap-2 items-center ml-auto pr-2"> 
                            <!-- Aplikuj timer po kliknutí na play -->
                            <div x-data="timerApp()">
                              <button @click="prepniTimer" class="flex items-center">

                                <!-- Pokud není zapnuto provede se -->
                                <template x-if="!zapnuto">
                                  <!-- Ikona spuštění úkolu -->
                                  <svg id="spust-ukol" class="hover:text-gray-800 w-6 h-6 text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                      <path stroke-linecap="round" stroke-linejoin="round" d="M5.25 5.653c0-.856.917-1.398 1.667-.986l11.54 6.347a1.125 1.125 0 0 1 0 1.972l-11.54 6.347a1.125 1.125 0 0 1-1.667-.986V5.653Z" />
                                  </svg>
                                </template>

                                <!-- Pokud je zapnuto provede se -->
                                <template x-if="zapnuto">
                                  <!-- Ikona Stop -->
                                  <svg class="hover:text-gray-800 w-6 h-6 text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5.25 7.5A2.25 2.25 0 0 1 7.5 5.25h9a2.25 2.25 0 0 1 2.25 2.25v9a2.25 2.25 0 0 1-2.25 2.25h-9a2.25 2.25 0 0 1-2.25-2.25v-9Z" /> 
                                  </svg>
                                </template>
                              </button>
                            </div>
                            
                            <!-- Ikona edituj úkol -->
                            <svg id="edituj-ukol" class="hover:text-gray-800 w-6 h-6 text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                            </svg>
                
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="hover:text-gray-800 w-6 h-6 text-gray-300">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                              </svg>
                          </div>
                      </div>
        </div>

        <div class="bg-cb3 mb-4 rounded-lg shadow-lg p-4 lg:w-1/4">
          <h2 class="text-lg font-semibold pb-6">Projekty:</h2>

          <!-- seznam aktuálních úkolů -->     
          <div class="flex gap-2 items-center">
            
              <!-- Ikona spuštění úkol je hotový -->
              <div id="hotovo" class="w-4 h-4 border border-gray-300 rounded-md hover:border-gray-800"></div>
              <p class="w-4/6">Projekt 1</p>

              <div class="flex gap-2 items-center ml-auto pr-2">  
                <!-- Ikona edituj projekt -->
                <svg id="edituj-projekt" class="hover:text-gray-800 w-6 h-6 text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                </svg>

                <!-- Ikona smaž projekt -->
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="hover:text-gray-800 w-6 h-6 text-gray-300">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                  </svg>
              </div>
          </div>
        </div>
        <div class="bg-cb3 mb-4 rounded-lg shadow-lg p-4 lg:w-1/4">
          <h2 class="text-lg font-semibold pb-6">Dokončené úkoly:</h2>

                        <!-- seznam aktuálních úkolů -->     
                        <div class="flex gap-2 items-center">
                  
                          <!-- Ikona spuštění úkol je hotový -->
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-gray-800">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                          </svg>
                          
                          <p class="w-4/6">Úkol 1</p>
                          <div class="flex gap-2 items-center ml-auto pr-2">
                            <!-- Ikona spuštění úkolu -->
                            <svg id="spust-ukol" class="hover:text-gray-800 w-6 h-6 text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5.25 5.653c0-.856.917-1.398 1.667-.986l11.54 6.347a1.125 1.125 0 0 1 0 1.972l-11.54 6.347a1.125 1.125 0 0 1-1.667-.986V5.653Z" />
                            </svg>
                            
                            <!-- Ikona edituj úkol -->
                            <svg id="edituj-ukol" class="hover:text-gray-800 w-6 h-6 text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                            </svg>
                
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="hover:text-gray-800 w-6 h-6 text-gray-300">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                              </svg>
                          </div>  
                      </div>
        </div>
      
        
    </main>


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