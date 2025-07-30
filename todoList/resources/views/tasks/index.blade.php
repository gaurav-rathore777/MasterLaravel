<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            My Tasks
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if(session('success'))
                <div class="alert alert-success mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <div class="mb-4">
                <a href="{{ route('tasks.create') }}" class="btn btn-primary">Create New Task</a>
            </div>

            @if($tasks->count())
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <table class="table table-bordered w-full">
                        <thead>
                            <tr>
                                <th class="p-2">Title</th>
                                <th class="p-2">Description</th>
                                <th class="p-2">Status</th>
                                <th class="p-2">Created</th>
                                <th class="p-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tasks as $task)
                                <tr>
                                    <td class="p-2">{{ $task->title }}</td>
                                    <td class="p-2">{{ $task->description }}</td>
                                    <td class="p-2">
                                        @if($task->is_completed)
                                            <span class="badge bg-success">Completed</span>
                                        @else
                                            <span class="badge bg-warning text-dark">Pending</span>
                                        @endif
                                    </td>
                                    <td class="p-2">{{ $task->created_at->format('d M, Y') }}</td>
                                    <td class="p-2">
                                        @can('update', $task)
                                        <a href="{{ route('tasks.edit', $task) }}" class="btn btn-sm btn-secondary">Edit</a>
                                        
                                        @endcan
                                        
                                        @can('delete', $task)
                                        <form action="{{ route('tasks.destroy', $task) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    @endcan
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p class="text-gray-600">You have no tasks yet.</p>
            @endif

        </div>
    </div>
</x-app-layout>
