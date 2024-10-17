<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Přihlášení | Úkolomet</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>

<x-layouts.app>

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
                    <form action="/registrace" method="post" class="flex flex-col w-2/3 py-6 mx-auto justify-center text-center">
                        @csrf
                        <label class="font-bold text-sm" for="jmeno">Jméno a příjmení</label>
                        <input class="text-center rounded-lg border border-ctsec py-2 text-xs" id="jmeno" type="text" name="jmeno" placeholder="Napiš jméno a příjmení" required>

                        <!-- validace pro pole jmeno -->
                        @error('jmeno')
                            <div class="text-xs font-bold text-red-500">{{ $message }}</div>
                        @enderror
                        

                        <label class="font-bold text-sm mt-4" for="email">Email</label>
                        <input class="text-center rounded-lg border border-ctsec py-2 text-xs" id="email" type="email" name="email" placeholder="Napiš svůj email" required>¨

                        <!-- validace pro pole email -->
                        @error('email')
                            <div class="text-xs font-bold text-red-500">{{ $message }}</div>
                        @enderror

                        <label class="font-bold text-sm mt-4" for="password1">Heslo</label>
                        <input class="text-center rounded-lg border border-ctsec py-2 mb-2 text-xs" id="password1" type="password" name="password1" placeholder="Napiš své heslo" required>
                        <input class="text-center rounded-lg border border-ctsec py-2 text-xs" id="password2" type="password" name="password2" placeholder="Potvrď své heslo" required>

                        <!-- validace pro pole heslo -->
                        @error('password1')
                            <div class="text-xs font-bold text-red-500">{{ $message }}</div>
                        @enderror


                        <button class="py-2 my-2 mt-4 font-bold rounded-lg bg-cbtprim text-cbttprim hover:bg-cbtsec hover:text-cbttsec" type="submit">Registrovat se</button>

                        <!--
                        Validace, která pod formulář vypíše všechny chyby.
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li class="text-red-500">{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif 
                        -->
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
  
    </x-layouts.app>