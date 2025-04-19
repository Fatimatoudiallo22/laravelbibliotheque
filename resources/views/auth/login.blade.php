<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-cover bg-center px-4 py-8"
         style="background-image: url('{{ asset('storage/images/OIP (10).jpeg') }}');">
        <div class="w-full max-w-2xl bg-white/15 backdrop-blur-md shadow-2xl rounded-2xl p-10 text-gray-800">

            <div class="text-center mb-10">
                <h1 class="text-5xl font-bold text-white drop-shadow-lg">Bienvenue à <span class="text-yellow-400">Sama Librairie</span></h1>
                <p class="text-lg text-white/90 mt-3 italic">Découvrez, explorez, lisez 📚</p>
                <p class="text-lg text-white/80">Connectez-vous pour accéder à votre univers littéraire personnalisé</p>
            </div>

            <x-auth-session-status class="mb-6 text-white text-lg" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}" class="space-y-8">
                @csrf

                <div class="relative">
                    <label for="email" class="block mb-2 text-white text-lg font-medium">Adresse e-mail</label>
                    <x-text-input id="email" type="email" name="email"
                                    class="block w-full rounded-md p-4 pl-12 bg-white/80 text-lg text-gray-800 shadow-sm focus:ring-2 focus:ring-yellow-400"
                                    placeholder="exemple@samalibrairie.com"
                                    :value="old('email')" required autofocus autocomplete="username" />
                    <div class="absolute left-4 top-11 text-gray-400 text-lg">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="mt-1 text-red-500 text-lg" />
                </div>

                <div class="relative">
                    <label for="password" class="block mb-2 text-white text-lg font-medium">Mot de passe</label>
                    <x-text-input id="password" type="password" name="password"
                                    class="block w-full rounded-md p-4 pl-12 bg-white/80 text-lg text-gray-800 shadow-sm focus:ring-2 focus:ring-yellow-400"
                                    placeholder="Votre mot de passe"
                                    required autocomplete="current-password" />
                    <div class="absolute left-4 top-11 text-gray-400 text-lg">
                        <i class="fas fa-lock"></i>
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-1 text-red-500 text-lg" />
                </div>

                <div class="flex items-center justify-between text-lg">
                    <label class="flex items-center text-white cursor-pointer">
                        <input type="checkbox" name="remember" class="mr-3 rounded border-gray-300 text-yellow-400 focus:ring-yellow-400 h-5 w-5">
                        Se souvenir de moi
                    </label>
                    @if (Route::has('password.request'))
                        <a class="text-yellow-300 hover:underline transition-opacity cursor-pointer" href="{{ route('password.request') }}">
                            Mot de passe oublié ?
                        </a>
                    @endif
                </div>

                <div>
                    <x-primary-button class="w-full bg-yellow-400 hover:bg-yellow-500 text-gray-900 font-semibold py-4 rounded-md transition-all cursor-pointer text-lg">
                        Se connecter
                    </x-primary-button>
                </div>
            </form>

            <div class="text-center mt-8 text-lg text-white">
                Vous n'avez pas encore de compte ?
                <a href="{{ route('register') }}" class="text-yellow-300 underline hover:text-yellow-400 transition-opacity cursor-pointer">Créer un compte</a>
            </div>

        </div>
    </div>
</x-guest-layout>