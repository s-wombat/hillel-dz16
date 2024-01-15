<tr>
    <th scope="row">
        <a href="{{ route('categories.show', $category->id) }}">{{ $category->id }}</a>
    </th>
    <td>{{ $category->name }}</td>
    <td>{{ $category->description }}</td>
    <td>
        <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
            <a class="btn btn-outline-secondary" href="{{ route('categories.edit',$category->id) }}">Edit</a>
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-outline-danger">Delete</button>
        </form>
    </td>
</tr>
