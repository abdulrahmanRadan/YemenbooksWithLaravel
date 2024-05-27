@auth
    <!-- Notification Bell -->
    <x-dropdown align="right" width="96">
        <x-slot name="trigger">
            <button class="relative">
                <svg class="w-6 h-6  top-0 right-0  inline-block " fill="yellow" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C6.67 6.165 6 7.388 6 9v5.158c0 .379-.214.725-.595.937L4 17h11zM13.73 21a2 2 0 01-3.46 0"></path>
                </svg>
                @if (Auth::user()->unreadNotifications->count() > 0)
                    <span class="absolute top-0 right-0 inline-block w-2 h-2 bg-red-600 rounded-full"></span>
                @endif
            </button>
        </x-slot>

        <x-slot name="content">
            <div class="w-80">
                <!-- Notification Content -->
                <div class="block px-4 py-2 text-xs text-gray-400">
                    {{ __('Notifications') }}
                </div>

                @forelse (Auth::user()->unreadNotifications as $notification)
                    <div class="block px-4 py-2 text-sm text-gray-700">
                        <div>{{ $notification->data['currency_name'] }} - {{ $notification->data['currency_rate'] }}</div>
                        <div class="text-xs text-gray-500">{{ $notification->created_at->diffForHumans() }}</div>
                    </div>
                @empty
                    <div class="block px-4 py-2 text-sm text-gray-700">
                        {{ __('No new notifications') }}
                    </div>
                @endforelse
            </div>
        </x-slot>
    </x-dropdown>
@endauth
