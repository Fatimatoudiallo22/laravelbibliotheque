<x-guest-layout>
    <style>
        /* Anim fade in */
        .fade-in {
            animation: fadeInUp 1s ease both;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Focus shadow on input */
        input:focus, input:focus-visible {
            outline: none;
            box-shadow: 0 0 0 4px rgba(110, 231, 183, 0.4);
        }

        /* Hover scale on button */
        .hover-scale:hover {
            transform: scale(1.02);
            box-shadow: 0 10px 20px rgba(16, 185, 129, 0.4);
        }
    </style>

    <div class="min-h-screen flex items-center justify-center bg-cover bg-center px-4 py-10" style="background-image: url('{{ asset('storage/images/OIP (11).jpeg') }}');">
        <div class="fade-in w-full max-w-3xl bg-transparent shadow-2xl rounded-3xl p-10">

            <div class="text-center mb-10">
                <h1 class="text-5xl font-bold text-black drop-shadow">Créer un compte <span class="text-green-500">Bibliotheque</span></h1>
                <p class="text-lg text-black/90 mt-3 italic">Accédez à un monde de lecture, gratuitement 📖</p>
                <p class="text-lg text-black/80">Remplissez le formulaire pour rejoindre notre communauté</p>
            </div>

            <form method="POST" action="{{ route('register') }}" class="space-y-8">
                @csrf

                @php
                    $fields = [
                        ['id' => 'name', 'label' => 'Nom', 'type' => 'text', 'icon' => 'fa-user'],
                        ['id' => 'prenom', 'label' => 'Prénom', 'type' => 'text', 'icon' => 'fa-user'],
                        ['id' => 'adresse', 'label' => 'Adresse', 'type' => 'text', 'icon' => 'fa-location-dot'],
                        ['id' => 'telephone', 'label' => 'Téléphone', 'type' => 'text', 'icon' => 'fa-phone'],
                        ['id' => 'email', 'label' => 'Adresse e-mail', 'type' => 'email', 'icon' => 'fa-envelope'],
                        ['id' => 'password', 'label' => 'Mot de passe', 'type' => 'password', 'icon' => 'fa-lock'],
                        ['id' => 'password_confirmation', 'label' => 'Confirmez le mot de passe', 'type' => 'password', 'icon' => 'fa-lock'],
                    ];
                @endphp

                @foreach ($fields as $field)
                    <div class="relative">
                        <label for="{{ $field['id'] }}" class="block mb-2 text-black text-lg font-medium">{{ $field['label'] }}</label>
                        <x-text-input
                            id="{{ $field['id'] }}"
                            type="{{ $field['type'] }}"
                            name="{{ $field['id'] }}"
                            class="w-full p-4 pl-12 bg-transparent rounded-md shadow-sm text-lg text-black border-none focus:border-green-500 focus:ring-green-500"
                            :value="old($field['id'])"
                            required
                            autocomplete="{{ $field['id'] }}"
                        />
                        <div class="absolute left-4 top-11 text-green-500 text-lg">
                            <i class="fas {{ $field['icon'] }}"></i>
                        </div>
                        <x-input-error :messages="$errors->get($field['id'])" class="mt-1 text-red-500 text-lg" />
                    </div>
                @endforeach

                <div>
                    <x-primary-button class="hover-scale w-full bg-green-500 hover:bg-green-600 text-black font-semibold py-4 rounded-md transition-all text-lg border-none focus:ring-2 focus:ring-green-400">
                        <i class="fas fa-user-plus mr-2"></i> S'inscrire
                    </x-primary-button>
                </div>

                <div class="text-center mt-6 text-lg text-black">
                    Vous avez déjà un compte ?
                    <a href="{{ route('login') }}" class="text-green-500 underline hover:text-green-600 font-medium">Se connecter</a>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>