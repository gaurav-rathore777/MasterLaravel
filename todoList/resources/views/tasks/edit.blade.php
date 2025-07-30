<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Edit Task
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded shadow">
                <form method="POST" action="{{ route('tasks.update', $task) }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700">Title</label>
                        <input type="text" name="title" class="form-control w-full rounded border-gray-300" required value="{{ old('title', $task->title) }}">
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700">Description</label>
                        <textarea name="description" class="form-control w-full rounded border-gray-300">{{ old('description', $task->description) }}</textarea>
                    </div>

                    <div class="form-check mb-4">
                        <input type="checkbox" name="is_completed" value="1" class="form-check-input" id="completed"
                            {{ $task->is_completed ? 'checked' : '' }}>
                        <label class="form-check-label ml-2" for="completed">Mark as completed</label>
                    </div>

                    <div class="flex items-center">
                        <button type="submit" class="btn btn-primary me-2">Update Task</button>
                        <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
