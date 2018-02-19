<template>
    <div class="row">
        <div class="col-xs-12">
            <img
                    v-if="first"
                    :src="first[thumbnailUrl]" :alt="first[name]"
            >
        </div>
        <div class="col-xs-12 treeimage">
            <div class="col-xs-4"
                 v-for="(image, index) in images"
                 v-show="index<4 && index>0"
            >
                <img alt="Bicycle"
                     v-if="image"
                     :src="image[thumbnailUrl]"
                >
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            images: {},
            name: {
                default: 'name'
            },
            thumbnailUrl: {
                default: 'thumbnail_url'
            }
        },
        computed: {
            first(){
                return this.images[0]
            }
        },
    }
</script>