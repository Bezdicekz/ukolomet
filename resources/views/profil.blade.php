<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrace | Úkolomet</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>


<x-layouts.app>
  
    <main class="w-1/2 mx-auto text-center text-ctprim">
    <div class="mx-auto mt-10 p-6 bg-white rounded-lg shadow-lg">
        <h2 class="text-center text-2xl font-bold mb-6">Upravit profil</h2>
        <h3 class="text-center text-xl font-bold mb-6">Zde můžete měnit informace o svém profilu</h3>

        @if(session('status'))
            <div class="bg-green-500 text-white p-4 rounded mb-4">
                {{ session('status') }}
            </div>
        @endif

        <form class="flex flex-col text-ctprim" action="{{ route('profile.update') }}" method="POST">
            @csrf

            <div class="flex mx-auto mb-6">
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium">Jméno</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" 
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm text-center">
                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            

                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" 
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm text-center">
                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="flex mx-auto mb-6">
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium">Nové heslo</label>
                    <input type="password" name="password" id="password" 
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm text-center">
                    @error('password')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password_confirmation" class="block text-sm font-medium">Potvrzení hesla</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" 
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm text-center">
                </div>
            </div>

            <div class="flex mx-auto mb-6">
                <div class="mb-4">
                    <label for="hodinova_sazba" class="block text-sm font-medium">Hodinová sazba (v Kč)</label>
                    <input type="number" name="hodinova_sazba" id="hodinova_sazba" value="{{ old('hodinova_sazba', $user->{'hodinova_sazba'}) }}" 
                        class="mt-1 block w-full border-gray-100 rounded-md shadow-sm focus:ring-indigo-100 focus:border-indigo-100 sm:text-sm text-center">
                    @error('hodinova_sazba')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="flex justify-center">
                <button type="submit" class="px-4 py-2 bg-cbtprim text-cbttprim font-bold rounded hover:bg-cbtsec hover:text-cbttsec">Uložit</button>
            </div>
        </form>
    </div>
    </main>

    </x-layouts.app>
