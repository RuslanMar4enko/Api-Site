<template>
    <div>
        <vm-image v-for="(image, key) in images"
                  :key="key"
                  :image="image"
                  @delete="images.splice(key, 1)"
                  @drags="dragged = key"
                  @drop="drop(key)"
        ></vm-image>

        <vm-image-create v-show="canShowCreateImage" :description="description" @created="created"></vm-image-create>
    </div>
</template>

<script>
    import vmImage from './image.vue'
    import vmImageCreate from './image-create.vue'
    import $ from 'jquery'

    export default {
        data(){
            return {
                dragged: null,
            }
        },
        components: {
            vmImage,
            vmImageCreate,
        },
        props: {
            images:{},
            limit: {},
            description:{
                default(){
                    return {}
                }
            }
        },
        computed: {
            canShowCreateImage(){
                if (!this.limit){
                    return true
                }
                return this.images.length < this.limit
            }
        },
        methods: {

            drop(keyTo){
                let keyFrom = this.dragged
                let imageFrom = this.images[keyFrom]

                this.images.splice(keyFrom, 1)
                this.images.splice(keyTo, 0, imageFrom)
            },
            created(e){
                this.images.push(e)
                this.$emit('update:images', e)
                this.$emit('v-created', e)
            }
        },
    }
</script>

<style scoped>

</style>
