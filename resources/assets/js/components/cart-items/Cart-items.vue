<template>

</template>

<script>
    export default {
        props: {
            type:{
                type: String,
                default: 'cart-modal'
            }
        },

        data() {
            return {
                sdata:[
                    {
                        image: "/images/product/01.png",
                        title: "Chelsea Product",
                        desc: "M - Putih",
                        price: 200000,
                        qty: 2
                    },
                    {
                        image: "/images/product/01.png",
                        title: "Chelsea Product",
                        desc: "M - Putih",
                        price: 100000,
                        qty: 1
                    }
                ]
            }
        },

        computed: {
            items: function(){
                // let storage = Storages.localStorage;
                // return storage.get('cart');
                return this.sdata;
            }
        },

        mounted() {
            app.methods.priceFormat();
        }
    }
</script>