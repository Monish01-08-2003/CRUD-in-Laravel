<x-app-layout>
    <div class="note-container single-note">
        <div class="note-header">
            <h1>Note: {{ $notes->created_at }}</h1>
            <div class="note-buttons">
                <a href={{ route('note.edit', $notes) }} class="note-edit-button">Edit</a>
                <form method="POST" action={{ route('note.destroy', $notes) }}>
                    @csrf
                    @method('delete')
                    <button class="note-delete-button">Delete</button>
                </form>
            </div>
        </div>
        <div class="note">
            <div class="note-body">
                {{ $notes->note }}
            </div>
        </div>
    </div>
</x-app-layout>
