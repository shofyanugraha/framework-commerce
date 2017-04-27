<template>
<div id="sale">
    <div class="breadcrumbs">
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">Jackets</a></li>
            <li>Wind Runner</li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="row">
                <div class="col-xs-2">
                    <div class="image-preview-buttons">
                        <img :src="item.image_front" alt="" class="active img-responsive">
                        <img :src="item.image_back" alt="" class="img-responsive">
                    </div>
                </div>
                <div class="col-xs-9">
                    <div class="image-preview">
                        <div class="preview-zoom">
                            <a :href="item.image_front">
                                <img :src="item.image_front" class="zoom img-fluid">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="info-preorder">
                <h3>Informasi Pre-order</h3>
                <p>Barang akan diproduksi selambat-lambatnya 14 hari kerja setelah masa promosi selesai, dan pengiriman barang dilaksanakan 1-2 hari kerja dari proses produksi selesai</p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="product-description">
                <h2 class="title">{{item.title}}</h2>
                <p class="priceformat price">{{item.price}}</p>
                <p class="description">{{item.desc}}</p>
                <div class="row">
                    <div class="col-md-8">
                        <span v-for="color in item.color">
                            <input type="radio" class="color-select" :id="'item-color-'+color.title" v-model="colors" :value="color.title">
                            <label :for="'item-color-'+color.title" :style="{background:color.hex}"></label>
                        </span>
                    </div>
                    <div class="col-md-4">
                        <select class="form-control" v-model="size">
                            <option :value="size" v-for="size in item.size" v-if="size == 's'">{{size}}</option>
                        </select>
                    </div>
                </div>
                <button class="btn btn-lg btn-primary buy-button">Beli Sekarang</button>

                <div class="countdown-holder">
					<h4 class="text-center">Masa Preorder</h4>
					<ul class="countdown">
			          <li class="seperator"><i class="fa fa-clock-o"></i></li>
			          <li> <span class="days">00</span>
			            <p class="days_ref">Hari</p>
			          </li>
			          <li class="seperator"></li>
			          <li> <span class="hours">00</span>
			            <p class="hours_ref">Jam</p>
			          </li>
			          <li class="seperator"></li>
			          <li> <span class="minutes">00</span>
			            <p class="minutes_ref">Menit</p>
			          </li>
			          <li class="seperator"></li>
			          <li> <span class="seconds">00</span>
			            <p class="seconds_ref">Detik</p>
			          </li>
			        </ul>
		        </div>

                <!-- contact us -->
                <div class="social-connect">
                    <p class="info">Anda perlu bantuan, chat sekarang juga !</p>
                    <div class="row">
                        <div class="col-md-4">
                            <button class="btn btn-lg btn-block btn-social-wa"><i class="fa fa-whatsapp"></i> Whatsapp</button>
                        </div>
                        <div class="col-md-4">
                            <button class="btn btn-lg btn-block btn-social-line"><i class="fa fa-commenting-o"></i> Line</button>
                        </div>
                        <div class="col-md-4">
                            <button class="btn btn-lg btn-block btn-social-fb"><i class="fa fa-facebook-f"></i> Facebook</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
                sdata:{
                        image_front: "/images/product/01.png",
                        image_back: "/images/product/01.png",
                        title: "Chelsea Product",
                        desc: "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.",
                        price: 200000,
                        color:[
                            {
                                hex:'#000',
                                title:"black"
                            },
                            {
                                hex:'#ddd',
                                title:"gray"
                            }
                        ],
                        size:["s","m","l","xl"]
                },
                size: "s",
                
                //colors selected
                colors:""
            }
        },

        computed: {
            item: function(){
                // let storage = Storages.localStorage;
                // return storage.get('cart');
                return this.sdata;
            }
        },

        methods: {
        },

        mounted() {
            var $zoom = $('.zoom').magnify();
            $('.countdown').downCount({
                date: '12/30/2017 23:59:59',
                offset: 7
            });
            app.methods.priceFormat();
        }
    }
</script>