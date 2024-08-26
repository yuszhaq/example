<x-layout>
  <x-slot:heading>
    Jobs
  </x-slot:heading>
  <h2 class="text-lg font-bold">{{ $job['title'] }}</h2>
  <p>
    This job pays {{ $job->salary }} per year.
    {{-- You can either use a properties or an arrays to access the attributes for a given value when using laravel [eloquent]
    example of accesing the attribute using array is ahown below
    This job pays {{ $job['salary'] }} per year. --}}
    
  </p>

  <div class="mt-6 items-center flex gap-2">
    <x-button href="/jobs/{{ $job->id }}/edit">Edit Job</x-button>
    <form action="/jobs/{{ $job->id }}" method="post">
      @csrf
      @method('DELETE')
      <button class="text-red-700 text-sm font-bold relative inline-flex items-center px-4 py-2  bg-white border border-red-300 leading-5 rounded-md hover:text-red-500 ">Delete</button>
    </form>
  </div>

</x-layout>