<x-layout>
@include('partials._search')


<a href="/" class="inline-block text-black ml-4 mb-4"
><i class="fa-solid fa-arrow-left"></i> Back
</a>

<div class="mx-4">
    <x-card class="!p-10">
        <div
            class="flex flex-col items-center justify-center text-center"
        >
            <img
                class="w-48 mr-6 mb-6"
                {{-- if image set as image path, else set as default image --}}
                src="{{$job->logo ? asset('storage/' . $job->logo) : asset('images/no-image.png')}}"
                alt=""
            />

            <h3 class="text-2xl mb-2">{{$job->title}}</h3>
            <div class="text-xl font-bold mb-4">{{$job->company}}</div>
            <x-job-tags :tagsCsv="$job->tags"/>
            <div class="text-lg my-4">
                <i class="fa-solid fa-location-dot"></i>{{$job->location}}
            </div>
            <div class="border border-gray-200 w-full mb-6"></div>
            <div>
                <h3 class="text-3xl font-bold mb-4">
                    Job Description
                </h3>
                <div class="text-lg space-y-6">
                {{$job->description}}

                    <a
                        href="mailto:{{$job->companyEmail}}"
                        class="block bg-laravel text-white mt-6 py-2 rounded-xl hover:opacity-80"
                        ><i class="fa-solid fa-envelope"></i>
                        Contact Employer</a
                    >

                    <a
                        href="{{$job->website}}"
                        target="_blank"
                        class="block bg-black text-white py-2 rounded-xl hover:opacity-80"
                        ><i class="fa-solid fa-globe"></i> Visit
                        Website</a
                    >
                </div>
            </div>
        </div>
    </x-card>

    {{-- edit --}}
    <x-card class="mt-4 p-2 flex space-x-6">
        <a href="/jobs/{{$job->id}}/edit">
        {{-- font awesome is coming from layout --}}
             <i class="fa-solid fa-pencil"></i> Edit
        </a>
    </x-card>
</div>


</x-layout>