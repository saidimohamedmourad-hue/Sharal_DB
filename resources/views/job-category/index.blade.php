<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('job categories') }}
        </h2>
    </x-slot>

   <div class="overflow-x-auto p-6">
    <!-- Add New Category Button -->
    <div class="flex justify-end mb-4">
        <a href="{{ route('job-categories.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
            + Add New Category
        </a>
    </div>
    <!-- Table job categories -->
    <table class="min-w-full bg-white divide-y border divide-gray-200 rounded-lg shadow-mt-4 bg-white">
        <thead>
            <tr>
            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-900">category name</th>
            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-800">actions</th>
            </tr>
            </thead>
            
        <tbody>
            @foreach($categories as $category)
            <tr class="border-b">
                <td class="px-6 py-4 text-gray-800">{{ $category->name }}</td>
                <td >
                    <div class="flex space-x-4">
                        <!-- edit button -->
                    <a href="{{ route('job-categories.edit', $category->id) }}"
                     class="text-blue-500 hover:text-blue-700 ">✍️Edit</a>
                        <!-- delete button -->

                    <form action="{{ route('job-categories.destroy', $category->id) }}"
                     method="POST" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:text-red-700">🗃️Archive</button>
                    </form>
                    </div>
                    </td>
                    </tr>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div>
        {{ $categories->links() }}
    </div>
   </div>
</x-app-layout>
