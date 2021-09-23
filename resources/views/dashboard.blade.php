<x-app-layout>
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
                <form action="{{ route('message.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <x-jet-label>
                            Asunto
                        </x-jet-label>
                        <x-jet-input type="text" class="w-full" placeholder="Ingrese asunto..." name="subjet" />
                    </div>

                    <div class="mb-4">
                        <x-jet-label>
                            Mensaje
                        </x-jet-label>
                        <textarea name="" rows="6" class="form-control w-full"
                            placeholder="Escriba su mensaje..."></textarea>
                    </div>

                    <div class="mb-4">
                        <x-jet-label>
                            Destinatario
                        </x-jet-label>

                        <select name="to_user_id" class="form-control w-full">
                            <option value="" selected disabled>Seleccione un usuario</option>

                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <x-jet-button>
                        Enviar mensaje
                    </x-jet-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
