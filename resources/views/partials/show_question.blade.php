<tr class="bg-gray-100 border-b border-gray-300 text-center text-gray-800">
    <td class="py-4 px-4 font-bold text-2xl">{{ $count }}.</td>
    <td class="py-4 px-4">
        <div class="bg-gray-300 text-black rounded-lg px-4 py-2">
            {{ $question }}
        </div>
    </td>
    <td class="py-4 px-4">
        <form action="{{ route('delete_question', ['questionId' => $questionId, 'eventId' => $eventId]) }}" method="post">
            @csrf
            @method('DELETE')
            <button
                class="bg-red-600 text-white px-6 py-2 rounded-lg hover:bg-red-700 hover:text-gray-200 transition duration-300">
                Delete
            </button>
        </form>
    </td>
</tr>
