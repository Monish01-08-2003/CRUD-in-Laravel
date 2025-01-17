<x-app-layout>
    <div class="note-container single-note">
        <h1>Edit your note</h1>
        <form action={{ route('note.update', $notes) }} method="POST" class="note">
            @csrf
            @method('put')
            <textarea name="note" rows="10" class="note-body" placeholder="Enter your
    note here">
  {{ $notes->note }}
    </textarea>
            <div class="note-buttons">
                <a href={{ route('note.index') }} class="note-cancel-button">Cancel</a>
                <button class="note-submit-button">Submit</button>
            </div>
        </form>
    </div>
</x-app-layout>
