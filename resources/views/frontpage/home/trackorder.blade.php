@extends('frontpage/layouts/main')
@section('content')
    <div class="main-content section">
        <div class="container">
            <h3 class="sc-title">Lacak Pesanan</h3>
            <p>Lacak Pesanan Anda</p>
            <form class="form row" id="form-tracker" method="post">
                <input type="text" class="hiddenRecaptcha required" style="visibility: hidden" name="hiddenRecaptcha" id="hiddenRecaptcha">
                <div class="col-md-4">
                    <div class="form-group ">
                        <label for="order-number" class="sr-only">Invoice</label>
                        <input type="text" class="form-control" required="required" name="code" id="order-number" placeholder="Kode Pesanan" value="{{ isset($code) ? $code : '' }}">
                    </div>
                    <div style="margin-bottom: 1em">
                        {!! Recaptcha::render() !!}
                    </div>
                    <button type="submit" class="btn btn-danger disabled">Track Order</button>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function () {
           $('#form-tracker').validate({
               rules: {
                   code: {
                       required: true,
                       minlength: 6
                   },
                   hiddenRecaptcha: {
                       required: function () {
                           if (grecaptcha.getResponse() == '') {
                               return true;
                           } else {
                               return false;
                           }
                       }
                   }
               },
               submitHandler: function(form) {
                   $('.overlay').fadeIn();
                   var data = $('#form-tracker').serializeObject();
                   data.hiddenRecaptcha = grecaptcha.getResponse();
                   axios.post(app.host + 'order/tracker', data, {
                       //headers: {
                       //  'Authorization': 'Bearer '
                       //}
                   }).then(function(response) {
                       if (response.data.meta.status == true) {
                           var $form=$(document.createElement('form')).css({display:'none'}).attr("method","POST").attr("action","{{ url('/track-order') }}/"+data.code);
                           $("body").append($form);
                           $form.submit();
                       } else {
                           swal({
                               title: 'Failed!',
                               text: 'order failed!',
                               type: 'success'
                           }, function() {
                           });
                       }
                   });

                   return false;
               }
           });
        });
    </script>
@endsection