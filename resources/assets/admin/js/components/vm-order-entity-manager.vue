<template>
    <vm-entity-manager :isProcessing="isProcessing" v-show="item.id">
        <vm-entity-manager-tabs>
            <vm-entity-manager-tab title="Details" :selected="true">
                <div class="box box-widget widget-user-2">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header bg-yellow">
                        <div class="widget-user-image">
                            <img class="img-circle" src="../../../../client/images/boy-512.png" alt="User Avatar">
                        </div>
                        <!-- /.widget-user-image -->
                        <h3 class="widget-user-username">{{ item.user.name }}</h3>
                        <h5 class="widget-user-desc" v-if="item.user.is_admin">Admin</h5>
                        <h5 class="widget-user-desc" v-else="item.user.is_admin">User</h5>
                    </div>
                    <div class="box-footer no-padding">
                        <ul class="nav nav-stacked">
                            <li><a >id <span class="pull-right badge bg-blue">{{ item.id }}</span></a></li>
                            <li><a >Bought At <span class="pull-right badge bg-blue">{{ item.bought_at }}</span></a></li>
                            <li><a >Canceled At <span class="pull-right badge bg-blue">{{ item.canceled_at }}</span></a></li>
                            <li><a >Open At <span class="pull-right badge bg-blue">{{ item.open_at }}</span></a></li>
                            <li><a >Status <span class="pull-right badge bg-blue">{{ item.status }}</span></a></li>
                            <li><a >User Phone <span class="pull-right badge bg-blue">{{ item.user.phone }}</span></a></li>
                            <li><a >User Email <span class="pull-right badge bg-blue">{{ item.user.email }}</span></a></li>
                            <li><a :href="`/tours/${item.tour_id}`">Tour Id <span class="pull-right badge bg-blue">{{ item.tour_id }}</span></a></li>
                        </ul>
                    </div>
                </div>
            </vm-entity-manager-tab>
        </vm-entity-manager-tabs>
    </vm-entity-manager>
</template>

<script>
    import vmEntityManager from './vm-entity-manager.vue'
    import vmEntityManagerTabs from './vm-entity-manager-tabs.vue'
    import vmEntityManagerTab from './vm-entity-manager-tab.vue'
    import Form from "../../services/Form";
    import Order from "../../models/Order";
    export default {
        components: {
            vmEntityManager,
            vmEntityManagerTabs,
            vmEntityManagerTab,
        },
        props: {
          isProcessing: {
              default: false
          }
        },
        data(){
            return {
                form:new Form({
                    data:new Order()
                })
            }
        },
        computed: {
            item(){
                return this.form.data
            }
        },
        methods: {
            /**
             * @public
             */
            pickItem(item){
                this.form.data = new Order(item)
            }
        },
    }
</script>