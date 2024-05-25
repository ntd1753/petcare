<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="iq-edit-list-data">
                <div class="tab-content">
                    <div class="tab-pane fade active show" id="personal-information" role="tabpanel">
                        <div class="iq-card">
                            <div class="iq-card-header d-flex justify-content-between">
                                <div class="iq-header-title">
                                    <h4 class="card-title">Bệnh án</h4>
                                </div>
                            </div>
                            <div class="iq-card-body">
                                <form method="POST" action="{{route('patient_store',$pat->id)}}">
                                    @csrf
                                    <div class="form-group row align-items-center">
                                        <div class="col-md-4">
                                            <label for="ngaykham">Ngày khám</label>
                                            <input type="date" class="form-control" id="ngaykham" name="ngaykham" value="{{ $pat->appointmentDate }}">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="ngaytaikham">Ngày tái khám</label>
                                            <input type="date" class="form-control" id="ngaytaikham" name="ngaytaikham" value="{{ $pat->recheckDate }}">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="trieuchung">Triệu chứng</label>
                                        <input type="text" class="form-control" id="trieuchung" name="trieuchung" value="{{ $pat->symptoms }}">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="chuandoan">Chuẩn đoán</label>
                                        <input type="text" class="form-control" id="chuandoan" name="chuandoan" value="{{ $pat->diagnosis }}">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="nhacnho">Nhắc nhở</label>
                                        <input type="text" class="form-control" id="nhacnho" name="nhacnho" value="{{ $pat->reminder }}">
                                    </div>
                                    <div id="table" class="table-editable col-md-12">
                                        <label for="colFormLabel">Đơn thuốc</label>
                                        <span class="table-add float-right mb-3 mr-2">
                                            <button type="button" class="btn btn-sm iq-bg-success" onclick="addRow()"><i class="ri-add-fill"><span class="pl-1">Thêm</span></i></button>
                                        </span>
                                        <table id="medicine-table" class="table table-bordered table-responsive-md table-striped text-center">
                                            <thead>
                                            <tr>
                                                <th>Tên thuốc</th>
                                                <th>Liều dùng</th>
                                                <th>Tần suất</th>
                                                <th>Xóa</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($pat->medicalRecord->medications as $medical)
                                                <tr>
                                                    <td contenteditable="true"><input type="text" name="medicines[{{ $loop->index }}][name]" value="{{ $medical->MedicationName }}" class="form-control"></td>
                                                    <td contenteditable="true"><input type="text" name="medicines[{{ $loop->index }}][dosage]" value="{{ $medical->Dose }}" class="form-control"></td>
                                                    <td contenteditable="true"><input type="text" name="medicines[{{ $loop->index }}][frequency]" value="{{ $medical->Frequency }}" class="form-control"></td>
                                                    <td>
                                                        <button type="button" class="btn iq-bg-danger btn-rounded btn-sm my-0" onclick="deleteRow(this)">Xóa</button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                    <script>
                                        function addRow() {
                                            var table = document.getElementById("medicine-table").getElementsByTagName('tbody')[0];
                                            var row = table.insertRow(table.rows.length);
                                            var cell1 = row.insertCell(0);
                                            var cell2 = row.insertCell(1);
                                            var cell3 = row.insertCell(2);
                                            var cell4 = row.insertCell(3);
                                            cell1.innerHTML = '<input type="text" name="medicines[' + table.rows.length + '][name]" class="form-control">';
                                            cell2.innerHTML = '<input type="text" name="medicines[' + table.rows.length + '][dosage]" class="form-control">';
                                            cell3.innerHTML = '<input type="text" name="medicines[' + table.rows.length + '][frequency]" class="form-control">';
                                            cell4.innerHTML = '<button type="button" class="btn iq-bg-danger btn-rounded btn-sm my-0" onclick="deleteRow(this)">Xóa</button>';
                                        }

                                        function deleteRow(btn) {
                                            var row = btn.parentNode.parentNode;
                                            row.parentNode.removeChild(row);
                                        }
                                    </script>

                                    <button type="submit" class="btn btn-primary mr-2">Xong</button>
                                    <button type="button" class="btn iq-bg-danger" onclick="history.back()">Hủy</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
