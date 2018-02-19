<template>
    <section class="product4">
        <h1>ПОХОЖИЕ МОДЕЛИ</h1>
        <hr/>
        <div class="container">
            <div class="row">
                    <vm-card
                            class="col-md-3 col-sm-3 col-xs-12 bike-block card"

                            v-for="card in products"
                            :key="card"


                            src="/image/home-2section/bike1.png"
                            :title="card.title"
                            :typeDescription="card.type.description"
                            :currentPrice="card.price"
                            :oldPrice="card.old_price"
                            :type="card.type.title"
                            :to="{name:'product', params:{id: card.id}}"

                    ></vm-card>

            </div>
        </div>
    </section>
</template>

<script>
    import vmCard from './vm-card.vue'
    export default {
        components: {
            vmCard
        },
        props: {
            products:{}
        },

    }
</script>