<template>
    <div>
        <slot name="title"></slot>
        <div class="cards">
            <div class="bike-block cards__item" v-for="(item, index) in collection" v-show="index<max || canShowAll">
                <slot :item="item"></slot>
            </div>
        </div>
        <div class="show-more"><button class="btn btn-veloman btn-default" @click="canShowAll = true" v-show="!canShowAll && collection&&collection.length>max">{{ $t('Show More') }}</button></div>
        <div class="show-more"><button type="button" class="btn btn-veloman btn-default" @click="canShowAll = false" v-show="canShowAll">{{ $t('Hide More') }}</button></div>
    </div>
</template>

<script>
    export default {
        props: {
            collection:{},
            max:{
                "default": 8,
            },
        },
        data(){
            return {
                canShowAll: false
            }
        },
    }
</script>