<div class="table-responsive">
    <table id="datatable" class="table table-striped table-bordered" >
        <a href="{{route('doctor.calendar_today')}}" class="btn btn-primary">Hôm nay</a>
        <a href="#" class="btn btn-primary">Tất cả</a>

        <thead>
        <tr>
            <th>Tên</th>
            <th>Loài</th>
            <th>Tuổi</th>
            <th>Ngày</th>
            <th>Giờ</th>
            <th>Xem bệnh án</th>
        </tr>
        </thead>
        @foreach($listAppoint as $item)

        <tbody>
        <tr>
            <td>{{$item->pet->name}}</td>
            <td>{{$item->pet->species->speciesName}}</td>
            <td>{{$item->pet->age}}</td>
            <td>{{$item->date}}</td>
            <td>{{$item->time}}</td>
            <td> <a href="{{route('doctor.petInfo', $item->pet->id)}}" class="btn btn-primary">Xem hồ sơ</a>
            </td>
        </tr>
        </tbody>
        @endforeach
    </table>
</div>
