<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Přihlášení | Úkolomet</title>
    <script src="//unpkg.com/alpinejs" defer></script>
    @vite('resources/css/app.css')
</head>

<x-layouts.app>

        <!--
        ---------------- Sekce main ----------------
        -->
        <main class="md:border-t-4 md:border-cbtsec md:flex mx-auto items-center justify-center text-ctprim md:py-16">
            <div class="collapse md:flex md:flex-col md:visible md:bg-[url('/public/img/login-picture.png')] md:bg-contain md:bg-no-repeat md:bg-center md:bg-size-full md:bg-cover md:bg-center md:text-center md:w-1/2 md:justify-center md:items-center md:py-60 md:gap-2 lg:bg-contain lg:bg-no-repeat lg:bg-center lg:bg-size-full lg:bg-cover lg:bg-center lg:text-center lg:w-1/2 lg:justify-center lg:items-center lg:py-60 lg:gap-2">
                <h1 class="collapse md:visible md:text-3xl lg:text-5xl md:font-bold md:pb-12">Úkolomet</h1>
                <p class="collapse md:visible md:font-bold">Mějte svoje úkoly pod kontrolou.</p>
                <p class="collapse md:visible md:font-bold">Po přihlášení můžete zadávat úkoly a organizovat svůj čas.</p>
            </div>

            <div class="flex flex-col md:w-1/2">
                <div class="flex flex-col items-center justify-center">
                    <div class="md:hidden text-center">
                        <h1 class="text-xl font-bold">Úkolomet</h1>
                        <p>Mějte svoje úkoly pod kontrolou.</p>
                        <p>Po přihlášení můžete zadávat úkoly a organizovat svůj čas.</p>
                    </div>
                </div>

                <div class="flex flex-col text-center">
                    <div class="flex flex-col py-6 font-bold">
                        <h1 class="text-2xl">Vítej zpět</h1>
                        <p class="py-2">Vlož svůj email, heslo a přihlaš se do Úkolometu</p>
                    </div>
                    <form action="/login" method="post" class="flex flex-col w-2/3 gap-2 py-6 mx-auto justify-center text-center">
                        @csrf
                        <label class="font-bold" for="email">Email</label>
                        <input class="text-center rounded-lg border border-ctsec py-2 text-xs" id="email" type="email" name="email" placeholder="Napiš svůj email" required>
                        <label class="font-bold" for="password">Heslo</label>
                        <input class="text-center rounded-lg border border-ctsec py-2 text-xs" id="password" type="password" name="password" placeholder="Napiš své heslo" required>

                        <div class="flex flex-col gap-6 py-6 justify-center text-xs">
                            <label>
                                <input type="checkbox" checked="checked">
                                <span class="checkmark"></span>Zapamatuj heslo
                            </label>                    
                            <div class="flex gap-2 mx-auto">
                                <p>Zapoměl jsi heslo?  </p>
                                <a class="hover:underline hover:cursor-pointer font-bold" href="#">Změnit heslo</a>
                            </div>
                        </div>

                        <button class="py-2 rounded-lg bg-cbtprim text-cbttprim hover:bg-cbtsec hover:text-cbttsec" type="submit">Přihlaš se</button>

                    </form>

                    <div class="justify-center">
                        <div class="flex gap-2 font-bold justify-center pb-6">
                            <p>Nemám účet:  </p>
                            <a class="hover:underline hover:cursor-pointer" href="/registrace">Registrace</a>
                        </div>
                        <p>nebo se přihlas přes</p>
                        <button class="hover:underline hover:cursor-pointer font-bold px-2">Google</button>
                        <button class="hover:underline hover:cursor-pointer font-bold"px-2>Facebook</button>
                    </div>
                </div>
            </div>
        </main>

    </x-layouts.app>