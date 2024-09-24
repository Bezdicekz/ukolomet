<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Úkolomet</title>
    <script src="//unpkg.com/alpinejs" defer></script>
    @vite('resources/css/app.css')
</head>

<body class="bg-gradient-to-br from-cb1 to-cbtsec bg-cb1 font-sans">
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
        ---------------- Jednotlivé oddíly Landing Page ----------------
        -->
        <main class="flex flex-col gap-6 ">
            <div class="flex flex-col gap-6 text-3xl md:text-4xl lg:text-5xl text-center font-bold text-ctprim">
                <h1>Mějte své úkoly pod kontrolou</h1>
                <h2>s Úkolometem je nezapomenete</h2>
            </div>
            <a class="text-xl font-bold text-cbttprim bg-cbtprim px-6 py-4 mx-auto rounded-md transition duration-700 ease-in-out hover:text-cbttsec hover:bg-cbtsec my-6" href="#sprava-ukolu">Víc informací</a>
            <img class="rounded-2xl" src="/img/todo-lists.jpg" alt="Obrázek Úkolometu">
        </main>

        <section id="sprava-ukolu" class="my-12 flex flex-col justify-center items-center text-center lg:flex-row">
            <article class="p-6">
                <p class="text-xl pb-6">Organizace na dosah ruky</p>
                <p>Tříďte úkoly do kategorií a priorit, což vám pomůže mít vždy přehled o tom, co je důležité a co může počkat.</p>
            </article>

            <article class="p-6 border-y border-gray-300 lg:border-x lg:border-y-0">
                <p class="text-xl pb-6">Automatická upomínka</p>
                <p>Chytré notifikace vám pomohou nikdy nezapomenout na termíny a důležité úkoly.</p>
            </article>

            <article class="p-6">
                <p class="text-xl pb-6">Práce napříč zařízeními</p>
                <p>Ať už používáte telefon, tablet nebo počítač, všechny vaše úkoly stále aktuální.</p>
            </article>
        </section>

        <section class="my-12 flex flex-col items-center justify-center gap-12 w-2/3 text-center mx-auto border border-gray-300 rounded-xl p-12">
            <h2 class="text-4xl text-ctprim font-bold">Efektivní správa úkolů</h2>
            <p class="px-30 text-ctprim text-center">Úkolomet je intuitivní webová aplikace pro správu úkolů, která vám pomůže získat kontrolu nad každodenními povinnostmi. Díky jednoduchému a přehlednému rozhraní můžete snadno vytvářet seznamy, nastavovat priority a přidávat termíny splnění. Aplikace vás upozorní na důležité úkoly, synchronizuje data napříč všemi vašimi zařízeními a umožní vám soustředit se na to, co je opravdu důležité.</p>
        </section>

        <section class="py-12 lg:flex h-dvh">
            <div class="bg-[url('/public/img/ukoly.jpg')] bg-cover bg-center rounded-xl w-1/2">
            </div>

            <div class="flex flex-col pl-12 text-left justify-center gap-12 w-full mx-auto py-12 bg-[url('/public/img/ukoly.jpg')] rounded-md bg-cover bg-center md:w-2/3 lg:bg-none lg:w-1/2 lg:rounded-xl">
                <h2 class="text-4xl text-ctprim font-bold">S Úkolometem už nikdy nezapomenete na žádný úkol</h2>
                <a class="text-xl font-bold text-cbttprim bg-cbtprim px-12 py-4 mr-auto rounded-md transition duration-700 ease-in-out hover:text-cbttsec hover:bg-cbtsec my-6" href="./login">Vytvořit účet</a>
        </section>

        <section class="flex flex-col mx-auto text-ctprim w-full lg:w-4/5 xl:w-2/3">
            
            <h2 class="text-4xl font-bold pb-12 pl-4">Jak to funguje?</h2>
            
            <div class="py-12 pl-32 relative">
                <h3 class="pb-6 text-xl font-bold">Přihlášení</h3>
                <p>Přihlášení do aplikace zajistí, že jsou vaše seznamy úkolů chráněny před očima nepovolaných lidí. Díky přihlášení do aplikace také můžete individuálně nastavovat důležité věci, jako je třeba přístrojová deska a další možnosti aplikace.</p>
                <div class="flex font-bold items-center justify-center w-10 h-10 z-10 text-center text-white top-10 left-4 rounded-full bg-cbtsec absolute ">
                    <p>1</p>
                </div>
                <div class="absolute top-10 left-8 h-full w-2 bg-cbtsec"></div>
            </div>
            
            <div class="py-12 pl-32 relative">
                <h3 class="pb-6 text-xl font-bold">Vytvoření úkolu</h3>
                <p>Přidejte nové úkoly jednoduše kliknutím na tlačítko „Přidat úkol“. Zadejte název, popis a nastavte termín splnění. Můžete si také nastavit čas a cenu práce za úkol nebo hodinu.</p>
                <div class="flex font-bold items-center justify-center w-10 h-10 z-10 text-center text-white top-10 left-4 rounded-full bg-cbtsec absolute ">
                    <p>2</p>
                </div>
                <div class="absolute top-10 left-8 h-full w-2 bg-cbtsec"></div>
            </div>

            <div class="py-12 pl-32 relative">
                <h3 class="pb-6 text-xl font-bold">Třídění a organizace</h3>
                <p>Rozdělte své úkoly do kategorií nebo projektů a nastavte jim priority, abyste vždy věděli, co je důležité.</p>
                <div class="flex font-bold items-center justify-center w-10 h-10 z-10 text-center text-white top-10 left-4 rounded-full bg-cbtsec absolute ">
                    <p>3</p>
                </div>
                <div class="absolute top-10 left-8 h-full w-2 bg-cbtsec"></div>
            </div>

            <div class="py-12 pl-32 relative">
                <h3 class="pb-6 text-xl font-bold">Nastavení připomínek</h3>
                <p>U každého úkolu můžete nastavit automatické upomínky, které vás upozorní na blížící se termíny.</p>
                <div class="flex font-bold items-center justify-center w-10 h-10 z-10 text-center text-white top-10 left-4 rounded-full bg-cbtsec absolute ">
                    <p>4</p>
                </div>
                <div class="absolute top-10 left-8 h-full w-2 bg-cbtsec"></div>
            </div>

            <div class="py-12 pl-32 relative">
                <h3 class="pb-6 text-xl font-bold">Synchronizace napříč zařízeními</h3>
                <p>Díky tomu, že se jedná o webovou aplikaci, Vaše úkoly se automaticky synchronizují na všech zařízeních, ať už používáte telefon, tablet nebo počítač.</p>
                <div class="flex font-bold items-center justify-center w-10 h-10 z-10 text-center text-white top-10 left-4 rounded-full bg-cbtsec absolute ">
                    <p>5</p>
                </div>
                <div class="absolute top-10 left-8 h-full w-2 bg-cbtsec"></div>
            </div>

            <div class="py-12 pl-32 relative">
                <h3 class="pb-6 text-xl font-bold">Sledování pokroku</h3>
                <p>Označujte splněné úkoly a sledujte svůj postup, díky čemuž budete mít vždy přehled o tom, co už máte hotové a co vás ještě čeká.</p>
                <div class="flex font-bold items-center justify-center w-10 h-10 z-10 text-center text-white top-10 left-4 rounded-full bg-cbtsec absolute ">
                    <p>6</p>
                </div>
            </div>
            <a class="text-xl font-bold text-cbttprim bg-cbtprim px-12 py-4 mr-auto rounded-md transition duration-700 ease-in-out hover:text-cbttsec hover:bg-cbtsec my-6 ml-32" href="./registrace">Vytvořit účet</a>
        </section>
    </div>
    

    <footer class="bg-ctsec">
        <div class="text-cb1 my-6 px-6 py-6 lg:flex md:mx-20 lg:mx-48">
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
                <li><a class="px-3 py-2 rounded-lg hover:text-cb2" href="./index">Hlavní stránka</a></li>
                <li><a class="px-3 py-2 rounded-lg hover:text-cb2" href="./projekty">Projekty</a></li>
                <li><a class="px-3 py-2 rounded-lg hover:text-cb2" href="./ukoly">Úkoly</a></li>
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