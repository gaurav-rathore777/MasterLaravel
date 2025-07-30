<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Create Task
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded shadow">
                <form method="POST" action="{{ route('tasks.store') }}">
                    @csrf

                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700">Title</label>
                        <input type="text" name="title" class="form-control w-full rounded border-gray-300" required value="{{ old('title') }}">
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700">Description</label>
                        <textarea name="description" class="form-control w-full rounded border-gray-300">{{ old('description') }}</textarea>
                    </div>

                    <div class="form-check mb-4">
                        <input type="checkbox" name="is_completed" value="1" class="form-check-input" id="completed">
                        <label class="form-check-label ml-2" for="completed">Mark as completed</label>
                    </div>

                    <div class="flex items-center">
                        <button type="submit" class="btn btn-success me-2">Save Task</button>
                        <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
