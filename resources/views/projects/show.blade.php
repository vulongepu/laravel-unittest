@extends('layouts.app')

@section('content')

   <div class="flex mb-10">
       <div class="w-3/4 px-4">
           <h2 class="text-lg text-grey font-bold mb-3">Tasks</h2>
           @forelse($project->tasks as $task)
               <div class="card mb-3">
                   <form action="{{ $project->path() . '/tasks/' .$task->id }}" method="POST">
                        @method('PATCH')
                        @csrf
                       <div class="flex">
                           <input name="body" type="text" value="{{ $task->body }}" class="w-full {{ $task->completed ? 'text-gray-300': '' }}">
                           <input name="completed" type="checkbox" onChange="this.form.submit()"
                                  {{ $task->completed ? 'checked': '' }}
                           >
                       </div>
                   </form>
               </div>
           @empty

           @endforelse

           <div class="card mb-3">
               <form action="{{ $project->path() . '/tasks' }}" method="POST">
                   @csrf
                   <input type="text" placeholder="Begin adding tasks..." class="w-full" name="body">
               </form>
           </div>
       </div>

       <div class="w-1/4">
           <div class="card">
               <h1>{{ $project->title }}</h1>
               <div>{{ $project->description }}</div>
               <a href="/projects">Go Back</a>
           </div>
       </div>
   </div>


@endsection
