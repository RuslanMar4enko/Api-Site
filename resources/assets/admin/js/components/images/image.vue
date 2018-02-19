<template>
    <div class="image-thumbnail"
         :class="classes"
         draggable="true"
         @dragover.prevent
         @drop="$emit('drop', image), classes.isDraggedOver = false"
         @dragstart="$emit('drags', image)"
         @dragend="$emit('drags', null)"
         @dragleave="classes.isDraggedOver = false"
         @dragenter="classes.isDraggedOver = true"
    >
        <img :src="image.thumbnail">
        <div class="remove-image" @click="$emit('delete', image)">X</div>
    </div>
</template>

<script>
    export default {
        data (){
            return {
                classes: {
                    isDraggedOver: false,
                },
            }
        },
        props: ['image'],
        methods: {
//            drag (){
//
//            },
//            drop (){
//
//            },
//            dragstart (){
//                this.
//            },
//            dragend (){
//                this.
//            },
//            dragleave (){
//                this.
//            },
//            dragenter (){
//                this.
//            },
        },
    }
</script>

<style scoped>
    .image-thumbnail {
        position: relative;
        display: inline-block;
        margin: 5px;
        cursor: move;
    }

    .image-thumbnail.isDraggedOver {
        opacity: 0.3;
    }

    .image-thumbnail img {
        user-drag: none;
        user-select: none;
        pointer-events: none;
        width: 100px;
        height: 100px;
    }

    .image-thumbnail .remove-image {
        display: none;
        position: absolute;
        top: 5px;
        right: 5px;
        width: 20px;
        height: 20px;
        border-radius: 10px;
        background-color: rgba(11, 11, 26, 0.4);
        text-align: center;
        cursor: pointer;
        color: white;
    }

    .image-thumbnail:hover .remove-image {
        display: block;
    }

    .image-thumbnail .remove-image:hover {
        background-color: rgba(255, 42, 52, 0.74);
    }
</style>