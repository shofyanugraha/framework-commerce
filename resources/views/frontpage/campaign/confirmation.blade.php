@extends('frontpage/layouts/main')
@section('content')
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="panel">
                        <div class="panel-body">
                            <h3 class="sc-title text-center">Konfirmasi Pesanan</h3>
                            <form action="#" mehthod="post" id="form-confirmation">
                                <div class="form-group">
                                    <label class="control-label">Kode Pesanan <span class="required">*</span></label>
                                    <input type="text" name="code" required class="form-control" placeholder="Kode Pesanan Anda">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Email <span class="required">*</span></label>
                                    <input type="text" name="email" required class="form-control" placeholder="Email Yang Digunakan Order">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Total Transfer <span class="required">*</span></label>
                                    <input type="text" name="total_transfer" required class="form-control" placeholder="Total Uang Yang Ditransfer">
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Bank</label>
                                    <select required name="bank_id" class="form-control">
                                        <option value="">Pilih Bank</option>
                                        @foreach($bank as $bnk)
                                            <option value="{{ $bnk->id  }}">{{ $bnk->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Nama Pengguna Rekening</label>
                                    <input type="text" name="account_holder" required class="form-control" placeholder="Nama Pengguna Rekening Bank">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Tanggal Transfer</label>
                                    <input data-toggle="datepicker" class="form-control" name="confirmation_date" required placeholder="Tanggal Anda Melakukan Transfer">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Catatan</label>
                                    <textarea name="notes" id="" cols="30" rows="3" class="form-control"></textarea>
                                </div>
                                <button class="btn btn-primary btn-block" type="submit">Konfirmasi</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $('[data-toggle="datepicker"]').datepicker({
                autoHide: true,
                endDate: new Date(),
                format: 'dd-mm-yyyy'
            });
            $('#form-confirmation').validate({
                rules: {
                    code: 'required',
                    email: 'required',
                    total_transfer: 'required',
                    bank_id: 'required',
                    account_holder: 'required',
                    confirmation_date: 'required'
                },
                submitHandler: function (form) {
                    $('.overlay').fadeIn();
                    var data = $('#form-confirmation').serializeObject();
                    axios.post(app.host + 'confirmation', data, {
                        //headers: {
                        //  'Authorization': 'Bearer '
                        //}
                    }).then(function (response) {
                        $('.overlay').fadeOut();
                        if (response.data.meta.status == true) {
                            swal({
                                title: 'Konfirmasi Berhasil!',
                                text: 'Terimakasih telah melakukan konfirmasi, silahkan tunggu informasi selanjutnya',
                                type: 'success'
                            }, function () {
                                var $form=$(document.createElement('form')).css({display:'none'}).attr("method","POST").attr("action","{{ url('/track-order') }}/"+response.data.data.code);
                                $("body").append($form);
                                $form.submit();
                            });
                        } else {
                            swal({
                                title: 'Konfirmasi Gagal!',
                                text: response.data.meta.message,
                                type: 'error'
                            }, function () {
                            });
                        }
                    });
                    return false;
                }
            });
        });
    </script>
@endsection