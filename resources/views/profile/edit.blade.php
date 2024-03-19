<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    
                                <section>
                            <header>
                                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                    {{ __('Atualizar endereco') }}
                                </h2>
                            </header>

                            <form method="post" action="{{ route('endereco.update')}}" class="mt-6 space-y-6">
                                @csrf
                                @method('put')

                                <div>
                                    <x-input-label  :value="__('Logradouro:')" />
                                    <input id="logradouro" name="logradouro" type="text" class="mt-1 block w-full" value="{{$endereco->logradouro ?? 'Nulo'}} " />
                                </div>

                                <div>
                                    <x-input-label  :value="__('Numero:')" />
                                    <input id="numero" name="numero" type="text" class="mt-1 block w-full" value="{{$endereco->numero ?? 'Nulo'}}" />
                                </div>

                                <div>
                                    <x-input-label  :value="__('Cidade:')" />
                                    <input id="cidade" name="cidade" type="text" class="mt-1 block w-full" value="{{$endereco->cidade ?? 'Nulo'}}" />
                                </div>

                                <div>
                                    <x-input-label  :value="__('Cep:')" />
                                    <input id="cep" name="cep" type="text" class="mt-1 block w-full" value="{{$endereco->cep ?? 'Nulo'}}" />
                                </div>

                                <div>
                                    <x-input-label  :value="__('Complemento:')" />
                                    <input id="complemento" name="complemento" type="text" class="mt-1 block w-full" value="{{$endereco->complemento ?? 'Nulo'}}" />
                                </div>

                                <div>
                                    <x-input-label  :value="__('Estado:')" />
                                    <input id="estado" name="estado" type="text" class="mt-1 block w-full" value="{{$endereco->estado ?? 'Nulo'}}" />
                                </div>

                                <div>
                                    <input id="usuario_id" name="usuario_id" type="hidden" class="mt-1 block w-full" value="{{auth()->id() ?? '-1'}}" />
                                </div>
                                <div class="flex items-center gap-4">
                                    <x-primary-button type="submit" >Enviar</x-primary-button>

                                </div>
                            </form>
                        </section>

                </div>
            </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
