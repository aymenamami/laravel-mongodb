@extends('tasks.layout')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Tasks</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('task.create') }}"> Create New Task</a>
            </div>
        </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Details</th>
            <th width="280px">Action</th>
        </tr>
	    @foreach ($tasks as $task)
	    <tr>
	        <td>{{ ++$i }}</td>
	        <td>{{ $task->name }}</td>
	        <td>{{ $task->detail }}</td>
	        <td>
                <form action="{{ route('task.destroy',$task->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('task.show',$task->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('task.edit',$task->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
	        </td>
	    </tr>
	    @endforeach
    </table>


@endsection
