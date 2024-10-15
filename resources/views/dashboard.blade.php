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
              
              <div class="flex gap-6 items-center">
                <!-- Ikona dokončení úkolu -->
                <div id="hotovo" class="w-4 h-4 border border-gray-300 rounded-md hover:border-gray-800"></div>
                <p class="w-4/6">{{ $dnesniukol->nazev }}</p>
                
                <!-- Skryté pole pro ID -->
                <input type="hidden" name="ukol_id" value="{{ $dnesniukol->id }}">

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
                    <form action="{{ route('ukol.destroy', $dnesniukol->id) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn-delete">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="hover:text-gray-800 w-6 h-6 text-gray-300">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                        </svg>
                      </button>
                    </form>
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
                <form action="{{ route('ukol.complete', $ukol->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="btn-complete w-4 h-4 border border-gray-300 rounded-md hover:border-gray-800"></button>
                </form>
                
                <div class="flex flex-col w-4/6">
                  <p>{{$ukol->nazev}}</p>

                <!-- Skryté pole pro ID -->
                <input type="hidden" name="ukol_id" value="{{ $ukol->id }}">

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
                                     <!-- Připravné modální okno -->
                  <div x-data="{ modalOpen: false }"
                      @keydown.escape.window="modalOpen = false"
                      class="relative z-50 w-auto h-auto">
                      <button @click="modalOpen=true" class="inline-flex items-center justify-center"><svg id="edituj-ukol" class="hover:text-gray-800 w-6 h-6 text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                  </svg></button>
                      <template x-teleport="body">
                          <div x-show="modalOpen" class="fixed top-0 left-0 z-[99] flex items-center justify-center w-screen h-screen" x-cloak>
                              <div x-show="modalOpen" 
                                  x-transition:enter="ease-out duration-300"
                                  x-transition:enter-start="opacity-0"
                                  x-transition:enter-end="opacity-100"
                                  x-transition:leave="ease-in duration-300"
                                  x-transition:leave-start="opacity-100"
                                  x-transition:leave-end="opacity-0"
                                  @click="modalOpen=false" class="absolute inset-0 w-full h-full bg-black bg-opacity-40"></div>
                              <div x-show="modalOpen"
                                  x-trap.inert.noscroll="modalOpen"
                                  x-transition:enter="ease-out duration-300"
                                  x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                  x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                                  x-transition:leave="ease-in duration-200"
                                  x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                                  x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                  class="relative w-full py-6 bg-white px-7 sm:max-w-lg sm:rounded-lg">
                                  <div class="flex items-center justify-between pb-2">
                                      <h3 class="text-lg font-semibold">Editace úkolu</h3>
                                      <button @click="modalOpen=false" class="absolute top-0 right-0 flex items-center justify-center w-8 h-8 mt-5 mr-5 text-gray-600 rounded-full hover:text-gray-800 hover:bg-gray-50">
                                          <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg>  
                                      </button>
                                  </div>
                                  <div class="relative w-auto">
                                  <div class="bg-cb3 mb-4 rounded-lg shadow-lg p-4 lg:w-4/5 text-center mx-auto text-ctprim">   
                                    <h1 class="text-xl font-bold mb-4">Upravit úkol</h1>
                                    
                                    <form action="{{ route('ukol.update', $ukol->id) }}" method="POST" class="flex flex-col gap-4 justify-center items-center">
                                        @csrf
                                        @method('PUT')
                                        
                                        <div>
                                        <label for="nazev">Název úkolu:</label>
                                        <input type="text" name="nazev" id="nazev" value="{{ $ukol->nazev }}" required>
                                        </div>

                                        <div>
                                        <label for="popis">Popis:</label>
                                        <textarea name="popis" id="popis" required>{{ $ukol->popis }}</textarea>
                                        </div>

                                        <div>
                                        <label for="id_projektu">Projekt:</label>
                                        <input type="text" name="id_projektu" id="id_projektu" value="{{ $ukol->id_projektu }}" required>
                                        </div>

                                        <div>
                                        <label for="celkovy_cas_ukolu">Celkový čas:</label>
                                        <input type="number" name="celkovy_cas_ukolu" id="celkovy_cas_ukolu" value="{{ $ukol->celkovy_cas_ukolu }}" required>
                                        </div>

                                        <div>
                                        <label for="datum_zahajeni">Datum zahájení:</label>
                                        <input type="date" name="datum_zahajeni" id="datum_zahajeni" value="{{ $ukol->datum_zahajeni }}" required>
                                        </div>

                                        <div>
                                        <label for="planovany_datum_ukonceni">Plánovaný datum ukončení:</label>
                                        <input type="date" name="planovany_datum_ukonceni" id="planovany_datum_ukonceni" value="{{ $ukol->planovany_datum_ukonceni }}" required>
                                        </div>

                                        <div>
                                        <label for="stav">Stav:</label>
                                        <input type="text" name="stav" id="stav" value="{{ $ukol->stav }}" required>
                                        </div>

                                        <div>
                                        <label for="rozpocet">Rozpočet:</label>
                                        <input type="number" name="rozpocet" id="rozpocet" value="{{ $ukol->rozpocet }}" required>
                                        </div>

                                        <button type="submit" class="py-2 px-6 transition duration-700 ease-in-out rounded-md hover:text-white hover:bg-cbtsec">Uložit změny</button>
                                    </form>

                                    </div>

                                  </div>
                              </div>
                          </div>
                      </template>
                  </div>
                        
                  <!-- Ikona smaž úkol -->
                  <form action="{{ route('ukol.destroy', $ukol->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-delete">
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="hover:text-gray-800 w-6 h-6 text-gray-300"><path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                          </svg>
                        </button>
                  </form>
          
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
            <div class="flex flex-col gap-2 items-left">

              @foreach ($dokonceneukoly as $dokoncenyukol)
              <div class="flex gap-2">
              <div class="flex gap-2 text-left">
                  <!-- Ikona spuštění úkol je hotový -->
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-gray-800">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                  </svg>
                  
                      <p>{{$dokoncenyukol->nazev}}</p>

                    <!-- Skryté pole pro ID -->
                    <input type="hidden" name="ukol_id" value="{{ $dokoncenyukol->id }}">
              </div>

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
              @endforeach
            </div>
            
        </div>
      
        
    </main>

</x-layouts.app>

