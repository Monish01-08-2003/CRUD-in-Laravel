<x-app-layout> <!-- the x in the div means this is a layout and the name of the layout is layout  -->
    <div class="note-container">
        <a href={{ route('note.create') }} class="new-note-btn">
            New Note
        </a>
        <div class="notes">
            @foreach ($Notes as $item)
                <div class="note">
                    <div class="note-body">
                        {{ Str::words($item->note, 30) }}
                    </div>
                    <div class="note-buttons">
                        <a href={{ route('note.show', $item) }} class="note-edit-button">View</a>
                        <a href={{ route('note.edit', $item) }} class="note-edit-button">Edit</a>
                        <form method="POST" action={{ route('note.destroy', $item) }}>
                            @csrf
                            @method('delete')
                            <button class="note-delete-button">Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach

        </div>
        @foreach ($Notes as $item)
        @endforeach
        {{ $Notes->links() }}
    </div>
</x-app-layout>
