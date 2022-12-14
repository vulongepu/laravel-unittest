@extends('layouts.app')

@section('content')

    <header class="flex items-center mb-3 py-4">
        <div class="flex justify-between items-center w-full">
            <h2 class="text-grey text-sm font-nomal">My project</h2>
            <a href="/projects/create" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">New Project</a>
        </div>
    </header>


       <main class="lg:flex lg:flex-wrap -mx-3">
            @forelse($projects as $project)
                <div class="lg:w-1/3 px-3 pb-6">
                    <div class="bg-white p-5 rounded-lg shadow" style="height: 200px">
                        <h3 class="font-nomal text-xl py-4 -ml-5 mb-3 border-l-4 border-blue-light pl-4">
                            <a href="{{ $project->path() }}">{{ $project->title }}</a>
                        </h3>

                        <div class="text-grey">
                            {{ $project->description }}
                        </div>
                    </div>
                </div>
            @empty
                <li>No project yet.</li>
            @endforelse
       </main>


@endsection
