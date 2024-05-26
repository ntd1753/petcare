@foreach($appointments as $item)
    <tr>
        <td>{{ $item->id }}</td>
        <td>{{ $item->petId }}</td>
        <td>{{ $item->doctor->name }}</td>
        <td>{{ $item->date }}</td>
        <td>{{ $item->time }}</td>
        <td>{{ $item->status }}</td>
        <td class="place-content-center" >
            <a href="{{route('admin.appointment.edit',$item->id )}}"
              "><button type="button" class="btn mb-3 btn-warning">Sửa</button></a>
            <a href="{{route('admin.appointment.destroy',$item->id )}}"
               onclick="return confirm('Bạn có muốn xóa không?');"><button type="button" class="btn mb-3 btn-danger"><i class="ion-trash-b"></i></button></a>
        </td>
    </tr>
@endforeach
