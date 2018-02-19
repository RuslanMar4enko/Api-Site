<template>
    <div>
        <vm-list-explorer ref="list"
                          :parentId="parentId"
                          @on-pick="pickItem"
        ></vm-list-explorer>
        <vm-modal v-if="canShowManager" @on-close="canShowManager = false">
            <template slot="title"></template>
            <vm-entity-manager ref="manager" @on-save="onChange"></vm-entity-manager>
        </vm-modal>

    </div>
</template>

<script>
    import vmEntityManager from './vm-color-entity-manager.vue'
    import vmListExplorer from './vm-color-list-explorer.vue'
    import vmModal from './vm-modal.vue'

    export default {
        components: {
            vmListExplorer,
            vmEntityManager,
            vmModal
        },
        props: {
            parentId: {}
        },

        data(){
            return {
                canShowManager: false
            }
        },
        methods: {
            pickItem(item){
                this.canShowManager = true
                this.$nextTick(()=>{
                    this.$refs.manager.pickItem({...item, product: {id: this.parentId}})
                })

            },
            onChange(){
                this.canShowManager = true
                this.$refs.list.search()
            }
        },
    }
</script>