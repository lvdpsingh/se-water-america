<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('New Move-In Request Form') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Please fill in the below information to request for a new move-in service.") }}
        </p>
    </header>

    <form method="POST" action="{{ route('newservice.create') }}" class="mt-6 space-y-6">
        @csrf

        <div>
            <x-input-label for="move_in_date" :value="__('Move-in Date')" />
            <x-text-input id="move_in_date" name="move_in_date" type="date" class="mt-1 block w-full" />
            <x-input-error class="mt-2" :messages="$errors->get('move_in_date')" />
        </div>
        <div>
            <x-input-label for="address_1" :value="__('Address Line 1')" />
            <x-text-input id="address_1" name="address_1" type="text" class="mt-1 block w-full" />
            <x-input-error class="mt-2" :messages="$errors->get('address_1')" />
        </div>
        <div>
            <x-input-label for="address_2" :value="__('Address Line 2')" />
            <x-text-input id="address_2" name="address_2" type="text" class="mt-1 block w-full" />
            <!--<x-input-error class="mt-2" :messages="$errors->get('name')" />-->
        </div>
        <div>
            <x-input-label for="city" :value="__('City')" />
            <x-text-input id="city" name="city" type="text" class="mt-1 block w-full" />
            <x-input-error class="mt-2" :messages="$errors->get('city')" />
        </div>
        <div>
            <x-input-label for="state" :value="__('State')" />
            <x-text-input id="state" name="state" type="text" class="mt-1 block w-full" />
            <x-input-error class="mt-2" :messages="$errors->get('state')" />
        </div>
        <div>
            <x-input-label for="country" :value="__('Country')" />
            <x-text-input id="country" name="country" type="text" class="mt-1 block w-full" />
            <x-input-error class="mt-2" :messages="$errors->get('country')" />
        </div>
        <div>
            <x-input-label for="zipcode" :value="__('ZipCode')" />
            <x-text-input id="zipcode" name="zipcode" type="text" class="mt-1 block w-full" />
            <x-input-error class="mt-2" :messages="$errors->get('zipcode')" />
        </div>
        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Submit') }}</x-primary-button>

{{--            @if (session('success'))--}}
{{--                <p--}}
{{--                    x-data="{ show: true }"--}}
{{--                    x-show="show"--}}
{{--                    x-transition--}}
{{--                    x-init="setTimeout(() => show = false, 2000)"--}}
{{--                    class="text-sm text-gray-600"--}}
{{--                >{{ session('success') }}</p>--}}
{{--            @endif--}}
        </div>

    </form>
</section>
