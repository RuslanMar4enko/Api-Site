<template>
    <!-- TO DO List -->
    <div class="box box-primary">
        <div class="box-header">
            <i class="ion ion-clipboard"></i>

            <h3 class="box-title">Doctor List</h3>
            <div class="box-tools pull-right">
                <vm-pagination :filter="filter" @next="next" @prev="prev"></vm-pagination>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <div class="col-md-6">
                    <!--TODO вынесити в стили-->
                    <div class="box box-solid" style="box-shadow: none">
                        <!-- /.box-header -->
                        <div class="box-body" style="padding: 0">
                            <vm-filter @requested="search">
                                <slot></slot>
                            </vm-filter>

                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="box box-solid" style="box-shadow: none">

                        <!-- /.box-header -->
                        <div class="box-body" style="padding: 0">
                            <ul class="todo-list">
                                <slot name="item">
                                    <vm-list-explorer-item v-for="model in models" :key="model.id">
                                        <span v-text="model.title"></span>
                                    </vm-list-explorer-item>
                                </slot>
                            </ul>
                        </div>
                        <div v-show="filter.isProcessing" class="overlay">
                            <i class="fa fa-circle-o-notch fa-spin"></i>
                        </div>

                    </div>
                </div>
            </div>

        </div>

        <!-- /.box-body -->
        <div class="box-footer clearfix no-border">
            <button type="button" class="btn btn-default pull-right" @click="add"><i class="fa fa-plus"></i> Add item</button>
        </div>
    </div>
    <!-- /.box -->
</template>
<!--<style>-->

<!--</style>-->
<script>
    import vmFilter from './vm-filter.vue'
    import vmListExplorerItem from './vm-list-explorer-item.vue'
    import vmPagination from '../vm-pagination.vue'
    import Storage from './instances/Storage.js'
    import Filter from '../../../../Services/FilterForm.js'
    export default {
        created(){
            this.models = this.value
            this.search()
        },
        props: {
            filter: {
                required: true,
                type: Filter
            },
            url: {
                required: true
            },

            method: {
                default: 'get'
            },


            value: {}
        },
        data(){
            return {
                models:[],
                storage: Storage,

            }
        },
        methods: {
            search(){
                this.$emit('search', this.filter);
                this.filter.search().then((data) => {
                    this.onSearchSuccess(data)
                }).catch((data) => {
                    this.$emit('error', data);
                });

            },
            onSearchSuccess(data){
                this.models = data;
                this.$emit('input', this.models);
                this.$emit('success', data);
            },
            next(filter){
                this.$emit('next', filter)
            },
            prev(filter){
                this.$emit('prev', filter)
            },
            add(){
                this.$emit('add', this.filter)
            },

        },

        components: {
            vmFilter,
            vmListExplorerItem,
            vmPagination
        }

    }
</script>