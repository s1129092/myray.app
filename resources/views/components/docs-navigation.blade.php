<nav class="docs-navigation" x-data="{ navOpen: false }" x-on:livewire:navigated.window="navOpen = false">
    <button @click="navOpen = !navOpen" class="block lg:hidden w-full bg-white border-b px-5 py-4 text-left font-semibold text-base flex justify-between items-center">
        <span>Contents</span>

        <i class="fa fa-thin fa-angle-up" x-bind:class="! navOpen ? 'rotate-180' : ''"></i>
    </button>

    <div class="p-5 pb-0 lg:p-8 lg:pb-0">
        <button @click="showSearchBox = true" class="border rounded p-3 w-full flex justify-between">
            <div class="flex items-center">
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M15.0555 13.8145L11.7477 10.5066C12.544 9.44645 12.9739 8.15598 12.9725 6.83C12.9725 3.44305 10.217 0.6875 6.83 0.6875C3.44305 0.6875 0.6875 3.44305 0.6875 6.83C0.6875 10.217 3.44305 12.9725 6.83 12.9725C8.15598 12.9739 9.44645 12.544 10.5066 11.7477L13.8145 15.0555C13.9819 15.2052 14.2003 15.2851 14.4248 15.2788C14.6493 15.2725 14.8629 15.1805 15.0217 15.0217C15.1805 14.8629 15.2725 14.6493 15.2788 14.4248C15.2851 14.2003 15.2052 13.9819 15.0555 13.8145ZM2.4425 6.83C2.4425 5.96223 2.69982 5.11396 3.18193 4.39244C3.66403 3.67092 4.34927 3.10856 5.15098 2.77648C5.95269 2.4444 6.83487 2.35751 7.68596 2.5268C8.53705 2.6961 9.31883 3.11397 9.93243 3.72757C10.546 4.34117 10.9639 5.12295 11.1332 5.97404C11.3025 6.82513 11.2156 7.70731 10.8835 8.50902C10.5514 9.31073 9.98909 9.99597 9.26756 10.4781C8.54604 10.9602 7.69777 11.2175 6.83 11.2175C5.66679 11.2161 4.55162 10.7534 3.72911 9.93089C2.9066 9.10838 2.4439 7.99321 2.4425 6.83Z" fill="#13052B"/>
                </svg>
                <span class="text-xs ml-2">Quick Search</span>
            </div>
            <span class="text-xs text-gray-400">⌘K</span>
        </button>
    </div>

    <ul class="bg-white p-5 lg:p-8 border-b lg:border-none" x-bind:class="! navOpen ? 'hidden lg:block' : ''">
        @foreach($navigation->categories as $key => $category)
            <li>
                @include('partials.docs.navigation-category', ['category' => $category])
            </li>
        @endforeach
    </ul>
</nav>
