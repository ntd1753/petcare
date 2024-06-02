<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title">Danh sách thú cưng</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <a href="{{route('user.register.add')}}"><button type="button" class="btn btn-outline-success mb-3"><i class="ri-add-fill"></i>Thêm thú cưng</button></a>

        </div>
    @foreach($listPet as $item)
            <div class="col-sm-6 col-md-3">
                <div class="iq-card">
                    <div class="iq-card-body text-center">
                        <div class="doc-profile">
                            <img class="rounded-circle img-fluid avatar-80" src="@if(is_null($item->avatar)) https://png.pngtree.com/png-clipart/20200701/original/pngtree-cat-default-avatar-png-image_5416936.jpg
                            @else {{asset($item->avatar)}} @endif " alt="profile">
                        </div>
                        <div class="iq-doc-info mt-3">
                            <h4> {{$item->name}}</h4>
                            <p class="mb-0" >{{$item->species->speciesName}}</p>
                        </div>
                        <a href="{{route('user.petInfo',$item->id)}}" class="btn btn-primary">Xem hồ sơ</a>
                    </div>
                </div>
            </div>
        @endforeach



    </div>
</div>
