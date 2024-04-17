<div class="bg-white shadow-md rounded-lg p-8 max-w-2xl mx-auto">
    <h1 class="text-2xl font-bold mb-4">Create Project</h1>
    <form action="" wire:submit.prevent="store" class="space-y-4">
        <div>
            <label for="url" class="block text-gray-700 font-bold mb-2">URL do Projeto</label>
            <input type="text" id="url" wire:model="url" placeholder="Digite a URL do projeto"
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:shadow-outline">
        </div>
        <div>
            <label for="name" class="block text-gray-700 font-bold mb-2">Nome do Projeto</label>
            <input type="text" id="name" wire:model="name" placeholder="Digite o nome do projeto"
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:shadow-outline">
        </div>
        <div>
            <label for="api_url" class="block text-gray-700 font-bold mb-2">API URL do Projeto</label>
            <input type="text" id="api_url" wire:model="api_url" placeholder="Digite a API URL do projeto"
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:shadow-outline">
        </div>
        <div>
            <label for="status" class="block text-gray-700 font-bold mb-2">Status do Projeto</label>
            <input type="number" id="status" wire:model="status" placeholder="Digite o status do projeto"
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:shadow-outline">
        </div>
        <button type="submit"
            class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Salvar</button>
    </form>
</div>
