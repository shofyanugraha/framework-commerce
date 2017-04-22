<template>
<div id="checkout">
    <div class="row">
        <div class="col-md-6">
            <h2 class="title">Checkout</h2>
            <form action="#" class="form">
                <h3>Informasi Pembeli</h3>
                <div class="form-group">
                    <input type="email" id="email" class="form-control" placeholder="Email">
                </div>
                <div class="form-group">
                    <input type="number" id="phone" class="form-control" placeholder="No. Handphone">
                </div>
                <h3>Informasi Penerima</h3>
                <div class="form-group">
                    <input type="text" id="name" class="form-control" placeholder="Nama Penerima">
                </div>
                <div class="form-group">
                    <input type="number" id="phone-2" class="form-control" placeholder="No. Handphone Penerima">
                </div>
                <div class="form-group">
                    <textarea name="address" id="address" class="form-control" placeholder="Alamat lengkap"></textarea>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <select name="province" id="province" class="form-control">
                                <option value="" disabled="disabled" selected>Pilih Provinsi</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <select name="city" id="city" class="form-control">
                                <option value="" disabled="disabled" selected>Pilih Kota</option>
                            </select>               
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <select name="districtId" id="districtId" class="form-control">
                                <option value="" disabled="disabled" selected>Pilih Kecamatan</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="postal_code" placeholder="Kode Pos">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <textarea name="note" id="note" class="form-control" placeholder="Catatan"></textarea>
                </div>
                <h5>Bank</h5>
                <p>Silahkan pilih salah satu bank yang akan digunakan</p>
                <div class="row bank-action">
                    <div class="col-md-4">
                        <a href="#" data-id="1" class="btn-bank"><img src=""></a>
                        <div class="bank-option text-xs-center">
                            <input id="bank" class="bankoption" type="radio" name="bank" value="1">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <a href="#" data-id="1" class="btn-bank"><img src=""></a>
                        <div class="bank-option text-xs-center">
                            <input id="bank" class="bankoption" type="radio" name="bank" value="1">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <a href="#" data-id="1" class="btn-bank"><img src=""></a>
                        <div class="bank-option text-xs-center">
                            <input id="bank" class="bankoption" type="radio" name="bank" value="1">
                        </div>
                    </div>
                </div>
                <button type="submit" disabled="disabled" class="btn btn-info btn-block" id="btnProceed">Proses Pesanan</button>
            </form>
        </div>

        <div class="col-md-5 col-md-offset-1">
            <div class="checkout-cart">
                <h2 class="bordered-title size-3"><span>Or</span>der Summary</h2>
                <cart-items type="cart-checkout col-md-12"></cart-items>
                <div class="checkout-shipping-cost">
                    <div class="pull-left">Ongkos Kirim</div>
                    <div class="pull-right">30000</div>
                    <div class="clearfix"></div>
                </div>
                <div class="checkout-total col-md-12">
                    <div class="pull-left">Total</div>
                    <div class="pull-right">330000</div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
</div>
</template>
<script>
    export default {
        props: {},

        data() {
            return {

                registerForm: $.extend(true, new SparkForm({
                    name: '',
                    email: '',
                    
                }), Spark.forms.register)

            }
        },

        mounted() {}

    }
</script>