@if (in_array('delete', $parts))
  {{-- <form action="{{ route('admin.' . $crudRoutePart . 's.destroy', $row->id) }}" method="POST">
    <input type="hidden" name="_method" value="DELETE">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <button type="submit" class="delete-confirm"><i class="fa-regular fa-trash-can"></i></button>
  </form> --}}
  <i class="fa-regular fa-trash-can"></i>
@endif
