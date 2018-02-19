<template>
    <!-- TO DO List -->
    <div class="box box-success">
        <div class="box-header">
            <i class="ion ion-clipboard"></i>

            <h3 class="box-title">
                <slot name="name"></slot>
            </h3>
            <div class="box-tools pull-right">
                <vm-pagination v-model="filter.pagination"></vm-pagination>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-lg-6">
                    <!--TODO вынесити в стили-->
                    <div class="box box-solid" style="box-shadow: none">
                        <!-- /.box-header -->
                        <div class="box-body" style="padding: 0">
                            <form role="form" @input="search">
                                <div class="form-group">
                                    <vm-form-group>
                                        <span slot="label">Order Id</span>
                                        <template scope="props">
                                            <input v-model="filter.query.id" :id="props.id" class="form-control" type="number" :min="1" title="User Id">
                                        </template>
                                    </vm-form-group>
                                    <vm-form-group>
                                        <span slot="label">User Name</span>
                                        <template scope="props">
                                            <input v-model="filter.query.user.name" :id="props.id" class="form-control" type="text" title="User Name">
                                        </template>
                                    </vm-form-group>
                                    <vm-form-group>
                                        <span slot="label">User Id</span>
                                        <template scope="props">
                                            <input v-model="filter.query.user_id" :id="props.id" class="form-control" type="number" :min="1" title="User Id">
                                        </template>
                                    </vm-form-group>

                                    <vm-form-group>
                                        <span slot="label">Status</span>
                                        <template scope="props">
                                            <select v-model="filter.query.status" id="props.id" class="form-control">
                                                <option :value="null"></option>
                                                <option value="open">Open</option>
                                                <option value="bought">Bought</option>
                                            </select>
                                        </template>
                                    </vm-form-group>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="box box-solid" style="box-shadow: none">

                        <!-- /.box-header -->
                        <div class="box-body" style="padding: 0">
                            <ul class="todo-list">

                                <li v-for="item in items" class="can-be-picked" :class="{'done': selected}">
                                        <span class="text picked-item-text" @click="pickItem(item)">

                                            {{ item.tour.title }}

                                        </span>
                                    <div class="tools">
                                        <!--<i class="fa fa-edit" @click="pickItem(item)"></i>-->
                                        <i class="fa fa-trash-o" @click="deleteItem(item)"></i>
                                    </div>
                                </li>


                            </ul>
                            <vm-callout :isDanger="formIsDanger"></vm-callout>
                        </div>
                        <div v-show="filter.ajax.isProcessing" class="overlay">
                            <i class="fa fa-circle-o-notch fa-spin"></i>
                        </div>

                    </div>
                </div>
            </div>

        </div>

        <div class="box-footer clearfix no-border">


            <div class="btn-group pull-right">
                <button type="button" class="btn btn-default" @click="search"><i class="fa fa-search"></i> <span v-text="$t('Search')"></span></button>
                <!--<button type="button" class="btn btn-default" @click="add"><i class="fa fa-eraser"></i> <span v-text="$t('Reset')"></span></button>-->
                <!--<button type="button" class="btn btn-default" @click="addItem"><i class="fa fa-plus"></i> <span v-text="$t('Add item')"></span></button>-->
                <slot name="buttons"></slot>
            </div>
        </div>

    </div>
</template>
<!--<style>-->

<!--</style>-->
<script>
    import vmPagination from './vm-pagination.vue'
    import vmFormGroup from './vm-form-group.vue'
    import vmCallout from './vm-callout.vue'
    import Form from "../../services/Form";
    import Pagination from "../../services/Pagination";
    import Filter from "../../services/Filter";
    import * as _ from "lodash";
    import Order from "../../models/Order";
    export default {
        components: {
            vmPagination,
            vmFormGroup,
            vmCallout
        },
        data(){
            return {
                filter: new Filter({
                    url: '/api/admin/orders/get-many',
                    query: {
                        id: null,
                        user_id: null,
                        status: null,
                        user: {
                            name: null,
                        }
                    },
                    pagination: new Pagination()
                }),
                form: new Form(),
                pickedItem: {},
                formIsDanger: false
            }
        },
        computed: {
            selected(){
                return false;
            },
            items(){
                return this.filter.data
            },

        },
        methods: {
            search(){
                this.formIsDanger = false;
                this.filter.search({holding: true})
            },
            addItem(){
                this.pickItem(new Order())
            },
            pickItem(item){
                this.formIsDanger = false;
                this.pickedItem = _.cloneDeep(item)
                this.$emit('on-pick', item)
            },
            deleteItem(item){
                if (!confirm('Are you sure?')) {
                    return;
                }
                this.formIsDanger = false;
                if (item.id)
                    this.form.submit({
                        url: '/api/admin/orders/delete',
                        data: {
                            id: item.id
                        }
                    }).then(() => {
                        this.search()
                        this.$emit('on-delete', item)
                    }).catch(() => {
                        this.formIsDanger = true;
                    })
            }
        },
    }
</script>