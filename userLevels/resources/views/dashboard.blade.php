<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 flex justify-center items-center">

        <div class="flex flex-col space-x-40 w-full h-full">

            {{-- ------------------------------------------------UpperHalf-------------------------- --}}

            <div class="flex flex-row space-x-40 w-full h-full">
                
                @auth
                @if(Auth::user()->roles_id == 1)
                <div class="bg-red-600 w-32 h-32">
                    Currently logged in as {{ Auth::user()->first_name }}
                </div>

                @elseif(Auth::user()->roles_id == 2)
                <div class="bg-blue-600 w-32 h-32">
                    Currently logged in as {{ Auth::user()->first_name }}
                </div>

                @elseif(Auth::user()->roles_id == 3)
                <div class="bg-green-600 w-32 h-32">
                    Currently logged in as {{ Auth::user()->first_name }}
                </div>

                @else
                <div class="w-1/2 h-1/3">
                    Bro how you here
                </div>

                @endif
            @endauth
              
                <div class="bg-red-900 w-1/2 h-1/3">

                    @auth
                    @if(Auth::user()->roles_id == 1)
                    @foreach ($data as $user)

                    <p>{{ $user->username }}</p>
                    <form method="POST" action="{{ route('profile.destroy' , $user->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete User</button>
                    </form>
                      @endforeach
    
                    @elseif(Auth::user()->roles_id == 2)
                    <div class="bg-blue-600 w-32 h-32">
                        Wa
                    </div>
    
                    @elseif(Auth::user()->roles_id == 3)
                    <div class="bg-green-600 w-32 h-32">
                        Wa
                    </div>
    
                    @else
                    <div class="w-1/2 h-1/3">
                        Bro how you here
                    </div>
    
                    @endif
                @endauth
                    
                </div>


            </div>


{{-- ------------------------------------------------Lower Half-------------------------- --}}
            {{-- <div class="flex flex-row space-x-60">
                <div class="bg-blue-600 w-60 h-60">
                    3
                </div>
                
                <div class="bg-indigo-600 w-60 h-60">
                    4
                </div>
            </div> --}}



        </div>

    </div>
</x-app-layout>
