<tr>
    <th scope="row">
        <a href="{{ route('event', $event->id) }}">{{ $event->id }}</a>
    </th>
    <td>{{ $event->name }}</td>
    <td>{{ $event->description }}</td>
    <td>{{ $event->dateTime }}</td>
</tr>