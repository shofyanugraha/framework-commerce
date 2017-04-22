<template>
    <div class="row">
        <div class="col-md-8">
            <cart-items type="cart-preview"></cart-items>
        </div>
        <div class="col-md-4">
            <div class="panel cart-preview-total">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h3>Subtotal</h3>
                        </div>
                        <div class="col-md-6">
                            <h3 class="priceformat">200000</h3>
                        </div>
                    </div>
                    <p>Perhitungan ongkos kirim akan dihitung ketika checkout</p>
                    <button class="btn btn-block btn-lg btn-success">Lakukan Checkout <span class="fa fa-long-arrow-right"></span></button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {},

        data() {
            return {}
        },

        mounted() {
            app.methods.priceFormat();

        }

    }
</script>