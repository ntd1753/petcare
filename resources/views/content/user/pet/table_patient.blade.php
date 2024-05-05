
    <div class="col-lg-8">
        <div class="iq-card iq-card-block iq-card-stretch iq-card-height">

            <div class="iq-card-body pb-0">
                <div class="iq-header-title">
                    <h4 class="card-title text-primary">Bệnh Án</h4>
                </div>
                @foreach($inforPet->patients as $inf)
                <div class="row">
                    <div class="col-lg-6">
                        <div class="iq-card mb-0">
                            <div class="iq-card-header d-flex justify-content-between p-0 bg-white">
                                <div class="iq-card-body p-0">
                                    <table class="table mb-0 table-borderless table-box-shadow">
                                        <thead>
                                        <tr>
                                            <th scope="col">Thông tin</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <th scope="row">Ngày khám:</th>
                                            <td>{{$inf->appointmentDate}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Triệu chứng:</th>
                                            <td>{{$inf->symptoms}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Chuẩn đoán:</th>
                                            <td>{{$inf->diagnosis}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Nhắc nhở:</th>
                                            <td>{{$inf->reminder}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Ngày tái khám:</th>
                                            <td>{{$inf->recheckDate}}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>

                            </div>
                        </div>
                    <div class="col-lg-6">
                        <div class="iq-card mb-0">
                            <div class="iq-card-header d-flex justify-content-between p-0 bg-white">
                                <div class="iq-card-body p-0">
                                    <table class="table mb-0 table-borderless table-box-shadow">
                                       <thead>
                                       <tr>
                                           <th scope="col">Đơn Thuốc</th>

                                       </tr>
                                       </thead>
                                        <tbody>
                                        <tr>
                                            <th scope="row">Mã đơn:</th>
                                            <td>{{$inf->medicalRecord->id}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Ngày tạo đơn:</th>
                                            <td>{{$inf->medicalRecord->created_at}}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>

                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="iq-card mb-0">
                            <div class="iq-card-header d-flex justify-content-between p-0 bg-white">
                                <div class="iq-card-body p-0">
                                    <table class="table mb-0 table-borderless table-box-shadow">
                                        <thead>
                                        <tr>
                                            <th scope="col">Tên thuốc</th>
                                            <th scope="col">Số lượng</th>
                                            <th scope="col">Liều lượng</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($inf->medicalRecord->medications as $medical)
                                        <tr>
                                            <th scope="row">{{$medical->MedicationName}}</th>

                                            <td>{{$medical->Dose}}</td>
                                            <td>{{$medical->Frequency}}</td>

                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            </div>

                        </div>
                    </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

