<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
    <div class="iq-card row">
        <div class="iq-card-header col-sm-6 d-flex justify-content-between">
            <div class="iq-header-title">
                <h4 class="card-title">Danh sách thú cưng</h4>
            </div>
        </div>
        <div class="col-sm-6 d-flex align-items-center justify-content-end"> @include("content.doctor.CRUD_patient.form_search")
        </div>
    </div>
</div>
        @foreach($listPet02 as $item)
            <div class="col-sm-6 col-md-3">
                <div class="iq-card">
                    <div class="iq-card-body text-center">
                        <div class="doc-profile">
                            <img class="rounded-circle img-fluid avatar-80" src="@if(is_null($item->avatar)) images/user/12.jpg
                            @else {{$item->avatar}} @endif " alt="profile">
                        </div>
                        <div class="iq-doc-info mt-3">
                            <h4> {{$item->name}}</h4>
                            <p class="mb-0" >{{$item->species->speciesName}}</p>
                        </div>

                        <a href="{{route('doctor.petInfo',$item->id)}}" class="btn btn-primary">Xem hồ sơ</a>
                    </div>
                </div>
            </div>

        @endforeach



    </div>
</div>
