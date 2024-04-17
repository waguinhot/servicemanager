{{-- <div>
    @if ($projects)
        @foreach ($projects as $project)
            <div>


                {{ $project->name }} -- {{ $project->url }} -- {{ $project->api_url }} -- {{ $project->status }}
            </div>
        @endforeach
    @endif
</div> --}}

<div class=" bg-white shadow-md flex-col rounded px-8 pt-6 pb-8 mb-4  w-2/3 mr-auto ml-auto">
    <button wire:click="verificar"
        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Verificar</button>
    @if ($projects)
        <div>
            @foreach ($projects as $index => $project)
                <div x-data="{ openTab{{ $index }}: false }" class="mt-4 p-4">
                    <!-- Título do projeto -->
                    <div @click="openTab{{ $index }} = !openTab{{ $index }}"
                        class="flex cursor-pointer w-full px-4 py-2  items-center font-medium text-1xl border rounded-lg   hover:bg-gray-100">
                        <div class="font-medium text-1xl w-3/12 capitalize-first-letter">
                            {{ $project->name }}
                        </div>
                        <div class="w-6/12">
                            <p>URL: {{ $project->url }}</p>
                        </div>
                        @if ($project->status == 1)
                            <div class="w-2/12 bg-green-500 p-2 rounded-lg text-white">
                                <p class="text-center">Ativo</p>
                            </div>
                        @endif

                        @if ($project->status == 0)
                            <div class="w-2/12 bg-red-500 p-2 rounded-lg text-white text-center">
                                <p class="text-center">Inativo</p>
                            </div>
                        @endif


                        <div class="w-1/12 flex items-center justify-center ">
                            <span x-show="!openTab{{ $index }}" class="transform">&#x2b;</span>
                            <span x-show="openTab{{ $index }}" class="transform">&#x2212;</span>
                        </div>
                    </div>
                    <!-- Conteúdo do projeto -->
                    <div x-show.transition.origin.top.left="openTab{{ $index }}"
                        class="px-4 py-2 bg-gray-100 flex flex-wrap">


                        @foreach ($project->History as $history)
                            @if ($history->status_code == 200)
                                <div x-data="{ showChild: false }"
                                    class="h-6 w-4 bg-green-500 m-1 cursor-pointer rounded relative"
                                    @mouseover="showChild = true" @mouseleave="showChild = false">
                                    <div x-show="showChild"
                                        class="fixed w-40 mt-8  absolute bg-white p-2 rounded border shadow-lg">

                                        <p class="text-gray-600">Status: {{ $history->status_code }}</p>
                                        <p class="text-gray-600">URL:
                                            <span
                                                class="{{ $history->status == 1 ? 'bg-green-500' : 'bg-red-500' }} text-white p-1 rounded">
                                                {{ $history->status == 1 ? 'Ativo' : 'Inativo' }}
                                            </span>
                                        </p>
                                        <p class="text-gray-600">Data: {{ $history->date }}</p>
                                    </div>
                                </div>
                            @endif
                            @if ($history->status_code != 200)
                                <div x-data="{ showChild: false }"
                                    class="h-6 w-4 bg-red-500 m-1 cursor-pointer rounded relative"
                                    @mouseover="showChild = true" @mouseleave="showChild = false">
                                    <div x-show="showChild"
                                        class="fixed w-40 mt-8  absolute bg-white p-2 rounded border shadow-lg">

                                        <p class="text-gray-600">Status: {{ $history->status_code }}</p>
                                        <p class="text-gray-600">URL:
                                            <span
                                                class="{{ $history->status == 1 ? 'bg-green-500' : 'bg-red-500' }} text-white p-1 rounded">
                                                {{ $history->status == 1 ? 'Ativo' : 'Inativo' }}
                                            </span>
                                        </p>
                                        <p class="text-gray-600">Data: {{ $history->date }}</p>
                                    </div>
                                </div>
                            @endif
                        @endforeach


                    </div>
                </div>
            @endforeach
        </div>
    @endif


    <div class="fixed bottom-8 right-8">
        <a href="{{ route('projects.create') }}">
            <div class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-full shadow-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
            </div>
        </a>
    </div>


</div>
