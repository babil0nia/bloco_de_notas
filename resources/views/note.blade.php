<tr>
    <td>{{ $note['title'] }}</td>
    <td>{{ $note->created_at->format('d/m/Y H:i:s') }}</td>
    <td>{{ Str::limit($note['text'], 3000) }}</td>
    <td>
        <a href="{{ route('edit', ['id' => Crypt::encrypt($note['id'])]) }}" class="btn btn-warning btn-sm">Editar</a>
        <form action="{{ route('delete', ['id' => Crypt::encrypt($note['id'])]) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir esta nota?')">Excluir</button>
        </form>
    </td>
</tr>    
