<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Úkolomet</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>

<x-layouts.app>

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
            <h2 class="text-xl py-6">Úkoly končící dnes:</h2>

            <!-- seznam aktuálních úkolů -->
            @foreach ($dnesniukoly as $dnesniukol)
            <div class="flex gap-2 items-center">
              
              
              <div class="flex gap-6 items-center">
                <!-- Ikona dokončení úkolu -->
                <div id="hotovo" class="w-4 h-4 border border-gray-300 rounded-md hover:border-gray-800"></div>
                <p class="w-4/6">{{ $dnesniukol->nazev }}</p>

                <div class="flex gap-2 items-center ml-auto pr-2">
                    
                    <!-- Ikona spuštění úkolu -->
                    <svg id="spust-ukol" class="hover:text-gray-800 w-6 h-6 text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5.25 5.653c0-.856.917-1.398 1.667-.986l11.54 6.347a1.125 1.125 0 0 1 0 1.972l-11.54 6.347a1.125 1.125 0 0 1-1.667-.986V5.653Z" />
                    </svg>
                    
                    <!-- Ikona editace úkolu -->
                    <svg id="edituj-ukol" class="hover:text-gray-800 w-6 h-6 text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                    </svg>

                    <!-- Ikona odstranění úkolu -->
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="hover:text-gray-800 w-6 h-6 text-gray-300">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                    </svg>
                </div>
              </div>  
            </div>
            @endforeach
        </div>
          </div>
        </div>

        <!-- Nadcházející úkoly -->    
         
        <div class="bg-cb3  mb-4 rounded-lg shadow-lg p-4 lg:w-1/4">
          <h2 class="text-lg font-semibold pb-6">Nadcházející úkoly:</h2>
            @foreach($ukoly as $ukol)

              <!-- seznam aktuálních úkolů -->     
              <div class="flex gap-2 items-center">
                
                <!-- Ikona spuštění úkol je hotový -->
                <div id="hotovo" class="w-4 h-4 border border-gray-300 rounded-md hover:border-gray-800"></div>
                <div class="flex flex-col w-4/6">
                  <p>{{$ukol->nazev}}</p>
                  <!-- Uběhnutý čas úkolu -->
                  <p id="cas-ukolu" x-text="finalTime" class="hover:text-gray-800 text-gray-300 text-left">Práce na úkolu {{$ukol->celkovy_cas_ukolu}} hodin</p>
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
            @endforeach
        </div>

        

        <div class="bg-cb3 mb-4 rounded-lg shadow-lg p-4 lg:w-1/4">
          <h2 class="text-lg font-semibold pb-6">Projekty:</h2>

        
          <!-- seznam projektů -->     
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

            <!-- seznam dokončených úkolů -->     
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

</x-layouts.app>

