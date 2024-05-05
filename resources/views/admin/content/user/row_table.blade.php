@foreach($users as $item)
    <tr>
        <td contenteditable="true">{{$item->id}}</td>
        <td contenteditable="true">{{$item->email}}</td>
        <td contenteditable="true">{{$item->name}}</td>
        <td contenteditable="true">{{$item->phoneNumber}}</td>
        <td contenteditable="true">{{$item->address}}</td>
        <td contenteditable="true" class="place-content-center"><img src="@if(is_null($item->avatar)) https://cdn.sforum.vn/sforum/wp-content/uploads/2023/10/avatar-trang-4.jpg @else {!! $item->avatar !!} @endif " class="img-fluid avatar-80 "> </td>
        <td>
            <a href="#"
               onclick="return confirm('Bạn có muốn xóa không?');">Xóa</a>
        </td>
    </tr>
@endforeach
