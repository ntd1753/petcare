<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="iq-edit-list-data">
                <div class="tab-content">
                    <div class="tab-pane fade active show" id="personal-information" role="tabpanel">
                        <div class="iq-card">
                            <div class="iq-card-header d-flex justify-content-between">
                                <div class="iq-header-title">
                                    <h4 class="card-title">Thông tin thú cưng</h4>
                                </div>
                            </div>
                            <div class="iq-card-body">
                                <form method="POST" action="{{route('pet_store',$proPet->id)}}">
                                    @csrf
                                    <div class="form-group row align-items-center">
                                        <div class="col-md-12">
                                            <div class="profile-img-edit">
                                                <img class="profile-pic" src="images/user/11.png" alt="profile-pic">
                                                <div class="p-image">
                                                    <i class="ri-pencil-line upload-button"></i>
                                                    <input class="file-upload" type="file" accept="image/*"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class=" row align-items-center">
                                        <div class="form-group col-sm-6">
                                            <label for="name">Tên:</label>
                                            <input type="text" class="form-control" id="name" name="name" value="{{$proPet->name}}">
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label for="age">Tuổi:</label>
                                            <input type="text" class="form-control" id="age" name="age" value="{{$proPet->age}}">
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label for="gname">Loài:</label>
                                                <select  class="form-control" value="{{$proPet->speciesId}}" name="gname">
                                                    @foreach($species as $species)
                                                    <option value="{{$species->id}}">{{$species->speciesName}}</option>
                                                    @endforeach
                                                </select>


                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label for="cname">Màu lông:</label>
                                            <input type="text" class="form-control" id="cname" name="cname" value="{{$proPet->color}}">
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label class="d-block">Giống:</label>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" value="Cái" id="customRadio6" name="customRadio1" class="custom-control-input" checked="">
                                                <label class="custom-control-label" for="customRadio6"> Cái </label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="customRadio7" value="Đực" name="customRadio1" class="custom-control-input">
                                                <label class="custom-control-label" for="customRadio7"> Đực </label>
                                            </div>
                                        </div>

                                    </div>
                                    <button type="submit" class="btn btn-primary mr-2">Xong</button>
                                    <button type="reset" class="btn iq-bg-danger">Hủy</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
