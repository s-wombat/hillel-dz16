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
            <x-a-button href="{{ route('events.edit',$event->id) }}" color="outline-secondary">Edit</x-a-button>
            @csrf
            @method('DELETE')
            <x-button type="submit" color="outline-danger">Delete</x-button>
        </form>
    </td>
</tr>