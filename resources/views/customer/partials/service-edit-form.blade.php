<section>
    @if (session('success'))
        <p
            x-data="{ show: true }"
            x-show="show"
            x-transition
            x-init="setTimeout(() => show = false, 10000)"
            class="alert alert-success alert-dismissible fade show text-wrap text-gray-600 text-size-xxx-small"
        >{{ session('success') }}</p>
    @elseif(session('error'))
        <p
            x-data="{ show: true }"
            x-show="show"
            x-transition
            x-init="setTimeout(() => show = false, 10000)"
            class="alert alert-danger alert-dismissible fade show text-gray-600 text-size-xxx-small"
        >{{ session('error') }}</p>
    @endif

    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Update Service Request') }}
        </h2>
    </header>

    <form method="POST" action="{{ url('customer/service/update/'.$service->id) }}" class="mt-6 space-y-6">
        @csrf
        {{--        @method('patch')--}}

        <div>
            <x-input-label for="move_in_date" :value="__('Move-in Date')" />
            <x-text-input id="move_in_date" name="move_in_date" type="date" class="mt-1 block w-full" :value="old('move_in_date', $service->move_in_date)" />
            <x-input-error class="mt-2" :messages="$errors->get('move_in_date')" />
        </div>
        <div>
            <x-input-label for="address_1" :value="__('Address Line 1')" />
            <x-text-input id="address_1" name="address_1" type="text" class="mt-1 block w-full" :value="old('address_1', $service->address_1)" />
            <x-input-error class="mt-2" :messages="$errors->get('address_1')" />
        </div>
        <div>
            <x-input-label for="address_2" :value="__('Address Line 2')" />
            <x-text-input id="address_2" name="address_2" type="text" class="mt-1 block w-full" :value="old('address_2', $service->address_2)" />
            <!--<x-input-error class="mt-2" :messages="$errors->get('name')" />-->
        </div>
        <div>
            <x-input-label for="city" :value="__('City')" />
            <x-text-input id="city" name="city" type="text" class="mt-1 block w-full" :value="old('city', $service->city)"/>
            <x-input-error class="mt-2" :messages="$errors->get('city')" />
        </div>
        <div>
            <x-input-label for="state" :value="__('State')" />
            <x-text-input id="state" name="state" type="text" class="mt-1 block w-full" :value="old('state', $service->state)"/>
            <x-input-error class="mt-2" :messages="$errors->get('state')" />
        </div>
        <div>
            <x-input-label for="country" :value="__('Country')" />
            <x-text-input id="country" name="country" type="text" class="mt-1 block w-full" :value="old('country', $service->country)"/>
            <x-input-error class="mt-2" :messages="$errors->get('country')" />
        </div>
        <div>
            <x-input-label for="zipcode" :value="__('ZipCode')" />
            <x-text-input id="zipcode" name="zipcode" type="text" class="mt-1 block w-full" :value="old('zipcode', $service->zipcode)"/>
            <x-input-error class="mt-2" :messages="$errors->get('zipcode')" />
        </div>

        <a type="button" class="btn btn-info" href="{{ url('/customer/validate-address/'.$service->id) }}">Validate</a>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Update') }}</x-primary-button>
        </div>

{{--        @if (session('success'))--}}
{{--            <div class="flex items-center gap-4">--}}
{{--                <x-primary-button>{{ __('Update') }}</x-primary-button>--}}
{{--            </div>--}}
{{--        @endif--}}
    </form>
</section>
