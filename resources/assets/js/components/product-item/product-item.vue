<template>
<div class="row">
    <div class="col-md-3" v-for="item in items">
        <div class="product text-center">
            <div class="product-image">
                <img :src="item.image" class="img-responsive">
            </div>
            <div class="product-title h4">{{item.title}}</div>
            <div class="product-price priceformat">{{item.price}}</div>
            <a class="btn  btn-primary">Lihat Detail</a>
        </div>
    </div>
</div>
</template>
<script>
    export default {
        props: {},

        data() {
            return {

                items:[
                    {
                        image: "/images/product/01.png",
                        title: "Chelsea Product",
                        price: "150000" 
                    },
                    {
                        image: "/images/product/01.png",
                        title: "Chelsea Product",
                        price: "150000"
                    },
                    {
                        image: "/images/product/01.png",
                        title: "Chelsea Product",
                        price: "150000"
                    },
                    {
                        image: "/images/product/01.png",
                        title: "Chelsea Product",
                        price: "150000"
                    }
                ]

            }
        },

        mounted() {
            app.methods.priceFormat();
        }

    }
</script>