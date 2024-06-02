<div class="col-lg-4 row m-0 p-0">
    <div class="col-sm-12" style="max-height: 350px">
        <div class="iq-card iq-card-block iq-card-stretch iq-card-height iq-user-profile-block" style="">
            <div class="iq-card-body">
                @foreach($inforPet02 as $infor)
                <div class="user-details-block">
                    <div class="user-profile text-center">
                        <img src="@if(is_null($infor->avatar)) {{asset('images/user/11.png')}} @else{{$infor->avatar}} @endif" alt="profile-img" class="avatar-130 img-fluid">
                    </div>
                    <div class="text-center mt-3">
                        <h4><b>{{$infor->name}}</b></h4>
                        <p>{{$infor->age}} Tuổi</p>
                    </div>
                    <ul class="doctoe-sedual d-flex align-items-center justify-content-between p-0 mt-4 mb-0">
                        <li class="text-center">
                            <h4 class="text-primary">Loài</h4>
                            <h5>{{$infor->species->speciesName}}</h5>
                        </li>
                        <li class="text-center">
                            <h4 class="text-primary">Giống</h4>
                            <h5>{{$infor->gender}}</h5>
                        </li>
                        <li class="text-center">
                            <h4 class="text-primary">Màu lông</h4>
                            <h5>{{$infor->color}}</h5>
                        </li>
                    </ul>
                    <div class="text-center mt-3">
                        @if(\Illuminate\Support\Facades\Auth::user()->hasRole('doctor'))
                            <form method="GET" action="{{route('patient_form',$infor->id)}}">
                                @csrf
                                <input type="hidden" name="pet_id" value="{{$infor->id}}">
                                {{--                            <button type="submit">Thêm bệnh án</button>--}}
                                <button type="submit" class="btn btn-primary mr-2">Thêm Bệnh Án</button>

                            </form>
                        @endif

{{--                        <a href="/patient_form" id="linkToOtherPage" >--}}
{{--                        </a>--}}
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
