<tr class="border-b border-gray-200 hover:bg-white">
    <td class="py-3 px-6 text-center">{{ $count }}</td>
    <td class="py-3 px-6 text-center">{{ $date }}</td>
    <td class="py-3 px-6 text-center">{{ $time }}</td>
    <td class="py-3 px-6 text-center">
        @if ($check == 0)
        <form action="{{ route('delete_schedule',['eventId'=>$eventId,'availableId'=>$id]) }}" method="post">
            @csrf
            @method('delete')
            <button class="bg-red-400 text-white py-1 px-3 rounded-lg hover:bg-red-600">Delete</button>
        </form>
        @else
        <button class="bg-green-400 text-white py-1 px-3 rounded-lg hover:bg-green-600">Registered</button>
        @endif
    </td>
</tr>