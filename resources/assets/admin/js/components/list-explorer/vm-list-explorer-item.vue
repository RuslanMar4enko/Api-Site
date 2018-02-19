<template>
    <li class="can-be-picked" :class="{'done': selected}">
        <!-- drag handle -->
        <span class="handle">
            <i class="fa fa-ellipsis-v"></i>
            <i class="fa fa-ellipsis-v"></i>
        </span>
        <!-- todo text -->
        <span class="text" @click="pick"><slot></slot></span>
        <!-- General tools such as edit or delete-->
        <div class="tools">
            <i class="fa fa-edit" @click="editItem($event)"></i>
            <i class="fa fa-trash-o" @click="deleteItem"></i>
        </div>
    </li>
</template>
<!--<style>-->

<!--</style>-->
<script>
    import _ from 'lodash'
    import Storage from './instances/Storage.js'
    export default {
        props: {
            value: {
                required: true
            }
        },
        data(){
          return {
              storage: Storage
          }
        },
        methods: {
            editItem(){
                Storage.pickedItem = this.value;
                this.$emit('edit', this.value);
            },
            deleteItem(){
                Storage.pickedItem =  this.value;
                this.$emit('delete', this.value)
            },
            pick(){
                Storage.pickedItem =  this.value;
                this.$emit('pick', this.value)
            }
        },
        computed: {
            selected(){
                return  _.isEqual(Storage.pickedItem, this.value)
            }
        },

    }
</script>