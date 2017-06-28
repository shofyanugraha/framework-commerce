<template>
<div id="checkout">

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

        mounted() {
            app.methods.priceFormat();
        }

    }
</script>