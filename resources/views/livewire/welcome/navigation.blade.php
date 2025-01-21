<nav class="flex justify-end flex-1 -mx-3 bg-white"> 
    @auth
        <a
            href="{{ url('/dashboard') }}"
            class="rounded-md px-3 py-2 text-gray-800 ring-1 ring-transparent transition hover:text-gray-600 focus:outline-none focus-visible:ring-[#FF2D20] font-bold"
        >
            Dashboard
        </a>
    @else
        <a
            href="{{ route('login') }}"
            class="rounded-md px-3 py-2 text-gray-800 ring-1 ring-transparent transition hover:text-gray-600 focus:outline-none focus-visible:ring-[#FF2D20] font-bold"
        >
            Log in
        </a>

        @if (Route::has('register'))
            <a
                href="{{ route('register') }}"
                class="rounded-md px-3 py-2 text-gray-800 ring-1 ring-transparent transition hover:text-gray-600 focus:outline-none focus-visible:ring-[#FF2D20] font-bold"
            >
                Register
            </a>
        @endif
    @endauth
</nav>
