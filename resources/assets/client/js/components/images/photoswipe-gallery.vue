<template>
    <div class="main-gallery">

        <vm-photoswipe-viewer :images="images"
                              v-if="show"
                              :index="index"
                              @closed="show = false"
        ></vm-photoswipe-viewer>


        <div class="row gallery">
            <div class="treeimage">
                <div class="gallery-image-link"
                     v-if="first"
                     style="cursor: pointer;"
                     itemprop="associatedMedia"
                     itemscope
                     itemtype="http://schema.org/ImageObject"
                     :href="first.url"
                     @click.prevent="show = true"

                >
                    <img :src="first.product_large_thumbnail" alt="Preview Image">
                </div>
            </div>

            <div class="treeimage main-gallery__image-container">
                <div class="col-xs-4 gallery-image-link  main-gallery__image"
                     v-for="(image, key) in images"
                     style="cursor: pointer;"
                     itemprop="associatedMedia"
                     itemscope
                     itemtype="http://schema.org/ImageObject"
                     :href="image.url"
                     @click.prevent="index = key, show = true"
                     v-if="!lazy && key!==0"

                >
                    <img alt="Bicycle"
                         itemprop="thumbnail"
                         class="fa loading"
                         :class="{'hidden': key>3}"
                         :alt="image.name"
                         :src="image.product_little_thumbnail"
                         v-if="!lazy && key!==0"
                    >
                </div>
            </div>
        </div>

    </div>
</template>

<script>
    import _ from 'lodash'
    import vmPhotoswipeViewer from './photoswipe-viewer.vue'

    export default {
        data() {
            return {
                show: false,
                index: 0,
            }
        },
        computed: {
            shouldEagerLoad() {
                return this.lazy
            },
            first() {
                return this.images[0]
            }
        },
        methods: {
            showImage(image) {
                this.index = _.findIndex(this.images, {id: image.id})
                this.show = true
            }
        },
        components: {
            vmPhotoswipeViewer,
        },
        props: ['images', 'lazy'],

    }
</script>

<style scoped>
    /*.gallery {*/
    /*text-align: center;*/
    /*}*/

    /*.gallery .gallery-image-link{*/
    /*margin: 3px;*/
    /*}*/

    /*.gallery .img-thumbnail{*/
    /*height: 100px; width: 100px*/
    /*}*/

    .lg-item:not(.lg-complete) {
        background: transparent url("/img/cube.svg") center no-repeat;
        background-size: 70px 70px;
    }

    .loading {
        background: transparent url("/img/loading.gif") center no-repeat;
        background-size: 70px 70px;
    }
</style>