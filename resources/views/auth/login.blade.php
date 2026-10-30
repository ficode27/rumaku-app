<x-auth>
    <div class="w-full max-w-sm bg-neutral-primary-soft p-6 border border-default rounded-base shadow-xs">
        <div class="mb-6">
            <h5 class="text-xl font-semibold text-heading mb-2">Masuk</h5>
        </div>

        @if ($errors->any())
            <div class="flex p-4 mb-4 text-sm text-fg-danger-strong rounded-base bg-danger-soft border border-danger-subtle"
                role="alert">
                <svg class="w-4 h-4 me-2 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                    height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 11h2v5m-2 0h4m-2.592-8.5h.01M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                <span class="sr-only">Danger</span>
                <div>
                    <span class="font-medium">Ensure that these requirements are met:</span>
                    <ul class="mt-2 list-disc list-outside space-y-1 ps-2.5">
                        @foreach ($errors->all() as $error )
                             <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>

        @endif

        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="relative z-0 w-full mb-5 group">
                <input type="email" name="email" id="email"
                    class="block py-2.5 px-0 w-full text-sm text-heading bg-transparent border-0 border-b-2 border-default-medium appearance-none focus:outline-none focus:ring-0 focus:border-brand peer"
                    placeholder=" " value="{{ old('email') }}" required />
                <label for="email"
                    class="absolute text-sm text-body duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-fg-brand peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">
                    Email
                </label>

                @error('email')
                    <div class="p-4 mt-4 text-sm text-fg-danger-strong rounded-base bg-danger-soft" role="alert">
                        <p>{{ $message }}</p>
                    </div>
                @enderror
            </div>


            <div class="relative z-0 w-full mb-5 group">
                <input type="password" name="password" id="password"
                    class="block py-2.5 px-0 w-full text-sm text-heading bg-transparent border-0 border-b-2 border-default-medium appearance-none focus:outline-none focus:ring-0 focus:border-brand peer"
                    placeholder=" " required />
                <label for="password"
                    class="absolute text-sm text-body duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-fg-brand peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Kata
                    Sandi</label>

                @error('password')
                    <div class="p-4 mt-4 text-sm text-fg-danger-strong rounded-base bg-danger-soft" role="alert">
                       <p>{{ $message }}</p>
                    </div>
                @enderror
            </div>

            <div class="flex items-start my-6">
                <div class="flex items-center">
                    <input id="remember" type="checkbox" name="remember"
                        class="w-4 h-4 border border-default-medium rounded-xs bg-neutral-secondary-medium focus:ring-2 focus:ring-brand-soft">
                    <label for="remember" class="ms-2 text-sm font-medium text-heading">Ingat aku</label>
                </div>
                <a href="#" class="ms-auto text-sm font-medium text-fg-brand hover:underline">Lupa password?</a>
            </div>
            <button type="submit"
                class="text-white bg-brand box-border border border-transparent hover:bg-brand-strong focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none w-full mb-3">Masuk
                ke akunmu</button>
            <div class="text-sm font-medium text-body">Belum daftar? <a href="#"
                    class="text-fg-brand hover:underline">Buat akun</a></div>
        </form>
    </div>
</x-auth>