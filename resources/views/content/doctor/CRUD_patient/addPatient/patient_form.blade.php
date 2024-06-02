<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="iq-edit-list-data">
                <div class="tab-content">
                    <div class="tab-pane fade active show" id="personal-information" role="tabpanel">
                        <div class="iq-card">
                            <div class="iq-card-header d-flex justify-content-between">
                                <div class="iq-header-title">
                                    <h4 class="card-title">Thêm Bệnh Án</h4>
                                </div>
                            </div>
                            <div class="iq-card-body">
                                <form method="POST" action="{{ route('patient_add',$pet_id)}}">
                                    @csrf
                                    <div class="form-group row align-items-center">
                                        <div class="col-md-4">
                                            <label for="ngaykham">Ngày khám</label>
                                            <input type="date" class="form-control" id="ngaykham" name="ngaykham">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="ngaytaikham">Ngày tái khám</label>
                                            <input type="date" class="form-control" id="ngaytaikham" name="ngaytaikham">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="trieuchung">Triệu chứng</label>
                                        <input type="text" class="form-control" id="trieuchung" name="trieuchung">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="chuandoan">Chuẩn đoán</label>
                                        <input type="text" class="form-control" id="chuandoan" name="chuandoan">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="nhacnho">Nhắc nhở</label>
                                        <input type="text" class="form-control" id="nhacnho" name="nhacnho">
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
                                            <!-- Các dòng sẽ được thêm vào bằng JavaScript -->
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

                                    <button type="submit" class="btn btn-primary mr-2">Thêm Bệnh Án</button>
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
