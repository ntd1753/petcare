@foreach($room as $item)
    <tr>
        <td contenteditable="true" class="text-center">{{$item->RoomNumber}}</td>
        <td contenteditable="true"  class="text-center">@if($item->Status == "available") Còn chỗ trống @else đầy @endif</td>
{{--        <td contenteditable="true">{{$item->price}}</td>--}}
        <td class="place-content-center" >
            <a href="{{route('admin.room.edit',$item->id )}}"
              "><button type="button" class="btn mb-3 btn-warning">Sửa</button></a>
            <a href="{{route('admin.room.destroy',$item->id )}}"
               onclick="return confirm('Bạn có muốn xóa không?');"><button type="button" class="btn mb-3 btn-danger"><i class="ion-trash-b"></i></button></a>
        </td>
    </tr>
@endforeach
