<tr>
    <th scope="row">
        <a href="{{ route('events.show', $event->id) }}">{{ $event->id }}</a>
    </th>
    <td>{{ $event->title }}</td>
    <td>{{ $event->notes }}</td>
    <td>{{ $event->dt_start }}</td>
    <td>{{ $event->dt_end }}</td>
    <td>{{ $event->user->name }}</td>
    <td>
        <form action="{{ route('events.destroy', $event->id) }}" method="POST">
            <a class="btn btn-outline-secondary" href="{{ route('events.edit',$event->id) }}">Edit</a>
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-outline-danger">Delete</button>
        </form>
    </td>
</tr>