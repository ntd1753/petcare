@foreach($service_type as $item)
    <tr>
        <td contenteditable="true">{{$item->id}}</td>
        <td contenteditable="true">{{$item->name}}</td>
        <td contenteditable="true">{!! $item->description !!}</td>
        <td contenteditable="true">{{$item->price}}</td>
        <td class="place-content-center">
            <a href="{{route('admin.typeOfService.edit',$item->id )}}"
              "><button type="button" class="btn mb-3 btn-warning">Sửa</button></a>

            <a href="{{route('admin.typeOfService.destroy',$item->id )}}"
               onclick="return confirm('Bạn có muốn xóa không?');"><button type="button" class="btn mb-3 btn-danger"><i class="ion-trash-b"></i></button></a>
        </td>
    </tr>
@endforeach
