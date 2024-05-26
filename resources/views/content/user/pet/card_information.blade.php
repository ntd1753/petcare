<div class="col-lg-4 row m-0 p-0">
        <div class="col-sm-12">
            <div class="iq-card iq-card-block iq-card-stretch iq-card-height iq-user-profile-block" style="height: 50%;">
                <div class="iq-card-body">

                    <div class="user-details-block">
                        <div class="user-profile text-center">
                            <img src="@if(is_null($inforPet->avatar)) {{asset('images/user/11.png')}} @else{{$inforPet->avatar}} @endif" alt="profile-img" class="avatar-130 img-fluid">
                        </div>
                        <div class="text-center mt-3">
                            <h4><b>{{$inforPet->name}}</b></h4>
                            <p>{{$inforPet->age}} Tuổi</p>
                        </div>
                        <ul class="doctoe-sedual d-flex align-items-center justify-content-between p-0 mt-4 mb-0">
                            <li class="text-center">
                                <h4 class="text-primary">Loài</h4>
                                <h5>{{$inforPet->species->speciesName}}</h5>
                            </li>
                            <li class="text-center">
                                <h4 class="text-primary">Giống</h4>
                                <h5>{{$inforPet->gender}}</h5>
                            </li>
                            <li class="text-center">
                                <h4 class="text-primary">Màu lông</h4>
                                <h5>{{$inforPet->color}}</h5>
                            </li>
                        </ul>
                        <div class="text-center mt-3">
                          <a href="/pet_update/{{$inforPet->id}}" id="linkToOtherPage" >
                              <button type="submit" class="btn btn-primary mr-2">Sửa</button>
                          </a>
                      </div>
                    </div>

                </div>
            </div>
        </div>
</div>
