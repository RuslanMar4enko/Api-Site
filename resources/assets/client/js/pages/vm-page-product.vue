<template>
    <div>

        <section class="breadcrump">
            <div class="container">
                <div class="row">
                    <!--<a href="#">Главная > Горный > <span>Level R9</span></a>-->
                </div>
            </div>
        </section>
        <transition name="show">
            <div style="min-height: 1080px; padding-top: 100px;" v-if="!product.id">
                <div class="text-center"><vm-spinner></vm-spinner></div>
            </div>
        </transition>
        <section class="product1"  v-if="product.id">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-6 product1-2block col-sm-push-6">
                        <h1> {{ product.title }} <span> {{ product.price | currency }}</span></h1>
                        <p>{{ product.type && product.type.title }} {{ product.type && product.type.description }}</p>
                        <p  v-if="pickedColor">{{ pickedColor.color }}</p>
                        <hr/>
                        <div class="color">
                            <div
                                    class="black"
                                    v-for="color in product.colors"
                                    :style="'background-color: '+color.value"

                                    @click="pickColor(color)"
                            ></div>

                        </div>

                        <h1 v-if="product.sub_title">{{ product.sub_title }}</h1>
                        <h3>{{ product.description }}</h3>

                        <p v-html="product.body" class="text-justify"></p>
                        <hr/>
                    </div>


                    <div class="col-md-6 col-sm-6 product1-1block col-sm-pull-6" v-if="pickedColor">
                        <transition name="show" appear>
                            <!--<vm-sample-gallery v-if="pickedColor.images" :images="pickedColor.images"></vm-sample-gallery>-->
                            <vm-photoswipe-gallery
                                    v-if="pickedColor.images"
                                    class="col-xs-12 clearfix"
                                    ref="gallery"
                                    :images="pickedColor.images"
                            ></vm-photoswipe-gallery>
                        </transition>
                    </div>




                </div>
            </div>
        </section>
        <vm-widgets  v-if="product.id && product.widgets && product.widgets.length" :widgets="product.widgets"></vm-widgets>

        <vm-characteristics v-if="product.id && product.characteristics && product.characteristics.length" name="title" description="value" :characteristics="product.characteristics"></vm-characteristics>

        <vm-similar  v-if="product.id && product.similar_products && product.similar_products.length" :products="product.similar_products"></vm-similar>




    </div>
</template>

<script>
    import vmSampleGallery from '../components/vm-sample-gallery.vue'
    import vmPhotoswipeGallery from '../components/images/photoswipe-gallery.vue'
    import vmSimilar from '../components/vm-similar-products.vue'
    import vmWidgets from '../components/vm-widgets.vue'
    import vmCharacteristics from '../components/vm-characteristics.vue'
    import vmSpinner from '../components/vm-spinner.vue'
    import productFilter from '../instances/productFilter.js'
    import Product from '../../../core/models/Product'
    import Color from '../../../core/models/Color'
    import * as _ from 'lodash'
    import Filter from '../../../core/services/Filter'
    export default {
        components: {
            vmSampleGallery,
            vmWidgets,
            vmCharacteristics,
            vmSimilar,
            vmPhotoswipeGallery,
            vmSpinner,
        },
        data(){
            return {
                filter: new Filter({
                    url:'/api/products/get',
                    query: {
                        status: 'PUBLISHED'
                    },
                    data: new Product()
                }),
                pickedColor: new Color(),
            }
        },
        beforeRouteUpdate (to, from, next) {
            this.fetch(to.params.id).then(()=>{
                next()
            }).catch(()=>{
                next()
            })
        },
        created(){
            this.fetch(this.$route.params.id)
        },
        computed: {
            product(){
                return this.filter.data
            },


        },
        methods: {
            pickColor(color){
                this.pickedColor = color

            },
            fetch(id){
                return new Promise((rs,rj)=>{
                    this.filter.query.id= id
                    this.filter.search().then((data) => {


                        this.filter.data = new Product(data)

                        if(this.product && this.product.colors)
                            this.pickColor(this.product.colors[0])
                        rs()
                    }).catch(() => {
                        this.$router.replace('/404')
                        rj()
                    })
                })

            }
        },

    }
</script>