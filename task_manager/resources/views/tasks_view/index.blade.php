@extends('tasks_view.app')

@section('content')
    <a href="{{ route('create') }}" class="btn btn-primary">Ajouter une tache</a>
    <table class="table">
        <thead>
            <tr>
                <th>Titre</th>
                <th>Description</th>
                <th>status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tasks as $task)
                <tr>
                    <td>{{ $task->title }}</td>
                    <td>{{ $task->description }}</td>
                    <td>
                        @if($task->status == 1)
                            <span class="badge text-bg-success">Terminer</span>

                        @else
                            <span class="badge text-bg-warning">En cours</span>
 
                        @endif
                      
                    </td>
                    <td>
                        <a href="{{ route('edit',$task->id) }}" class="btn btn-info">Modifier</a>
                        <form style="display: inline;" action="{{ route('destroy', $task->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Etes vous sur de vouloir supprimer cet article ?') " class="btn btn-danger">Supprimer</button>
                        </form>
                        
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
@endsection
