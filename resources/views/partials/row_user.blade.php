<tr>
    <th scope="row">
        <a href="{{ route('users.show', $user->id) }}">{{ $user->id }}</a>
    </th>
    <td>{{ $user->name }}</td>
    <td>{{ $user->email }}</td>
    @if($user->role == 0)
        <td>User</td>
    @else
        <td>Admin</td>
    @endif
    <td>
        <form action="{{ route('users.destroy', $user->id) }}" method="POST">
            <a class="btn btn-outline-secondary" href="{{ route('users.edit',$user->id) }}">Edit</a>
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-outline-danger">Delete</button>
        </form>
    </td>
</tr>
