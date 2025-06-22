<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gray-100">
        <div class="max-w-5xl w-full mx-auto  md: rounded-lg overflow-hidden">
            <!-- Form Section -->
            <div class="p-8 bg-white">
                <div class="text-center mb-8">
                    <a href="/" class="inline-block">
                         <svg class="w-16 h-16 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path></svg>
                    </a>
                    <h2 class="mt-6 text-3xl font-extrabold text-gray-900">
                        Connectez-vous à votre compte
                    </h2>
                    <p class="mt-2 text-sm text-gray-600">
                        Ou <a href="{{ route('register') }}" class="font-medium text-green-600 hover:text-green-500">créez un nouveau compte</a>
                    </p>
                </div>

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf

                    <!-- Email Address -->
                    <div>
                        <label for="email" class="sr-only">Email</label>
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="Adresse e-mail"/>
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <label for="password" class="sr-only">Mot de passe</label>
                        <x-text-input id="password" class="block mt-1 w-full"
                                        type="password"
                                        name="password"
                                        required autocomplete="current-password"
                                        placeholder="Mot de passe" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Remember Me & Forgot Password -->
                    <div class="flex items-center justify-between mt-4">
                        <div class="flex items-center">
                            <input id="remember_me" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-green-600 focus:ring-green-500" name="remember">
                            <label for="remember_me" class="ml-2 block text-sm text-gray-900">{{ __('Remember me') }}</label>
                        </div>

                        @if (Route::has('password.request'))
                            <div class="text-sm">
                                <a class="font-medium text-green-600 hover:text-green-500" href="{{ route('password.request') }}">
                                    {{ __('Forgot your password?') }}
                                </a>
                            </div>
                        @endif
                    </div>

                    <div>
                        <x-primary-button class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                            {{ __('Log in') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</x-guest-layout>
