<x-layout>
    <x-card class='p-10'>
        <header>
            <h1
                class="text-3xl text-center font-bold my-6 uppercase"
            >
                Manage Gigs
            </h1>
        </header>

        <table class="w-full table-auto rounded-sm">
            <tbody>
                {{-- if jobs is not empty --}}
                @unless ($jobs->isEmpty())
                    {{-- create a tr for each job --}}
                    @foreach($jobs as $job)
                        <tr class="border-gray-300">
                            <td
                            class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                            >
                            <a href="/jobs/{{$job->id}}">
                                    {{$job->title}}
                                </a>
                            </td>
                            <td
                                class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                            >
                                <a
                                    href="/jobs/{{$job->id}}/edit"
                                    class="text-blue-400 px-6 py-2 rounded-xl"
                                    ><i
                                        class="fa-solid fa-pen-to-square"
                                    ></i>
                                    Edit</a
                                >
                            </td>
                            <td
                                class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                            >
                            <form method="POST" action="/job/{{$job->id}}">
                                @csrf
                                @method('DELETE')
                                <button class="text-red-500">
                                    <i class="fa-solid fa-trash"></i>Delete
                                </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                {{--if jobs is empty make a tr with 'NO JOBS FOUND'  --}}
                @else
                    <tr class="border-gray-300">
                        <td class="px-4 py-8 border-t-b border-gray-300 text-lg">
                            <p class="text-center">No Jobs Found</p>
                        </td>
                    </tr>
                @endunless

               
            </tbody>
        </table>
    </x-card>
</x-layout>