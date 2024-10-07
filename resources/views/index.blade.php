<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Úkolomet</title>
    <script src="//unpkg.com/alpinejs" defer></script>
    @vite('resources/css/app.css')
</head>


    <x-layouts.app>
        
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
    </x-layouts.app>