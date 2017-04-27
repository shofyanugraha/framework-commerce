<template>
<div class="cart-items">
    <table class="table">
        <thead v-if="type == 'cart-modal'">
            <tr>
                <td></td>
                <td>Produk</td>
                <td>Qty</td>
                <td>Price</td>
                <td v-if="type == 'cart-modal'"><a href="#" class="remove-all-cart" onclick="deleteAll()"><i class="fa fa-times"></i></a></td>
            </tr>
        </thead>
        <tbody class="cart-holder-item">
            <tr v-for="item in items">
                <td width="80" style="vertical-align:middle"><img :src="item.image" :alt="item.title" class="img-responsive"></td>
                <td style="vertical-align:middle">
                    <h4 class="item-title">{{item.title}}</h4>
                    <p class="item-desc">{{item.desc}}</p>
                </td>
                <td style="vertical-align:middle">X {{item.qty}}</td>
                <td style="vertical-align:middle;text-align:right"><span class="priceformat">{{item.price}}</span></td>
                <td v-if="type == 'cart-modal'" style="vertical-align:middle"><a href="#"><i class="fa fa-times"></i></a></td>
                <td v-if="type == 'cart-preview'" style="vertical-align:middle"><button class="btn btn-primary btn-sm">Edit</button></td>
            </tr>
        </tbody>
    </table>
</div>
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