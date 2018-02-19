<template>
    <vm-list-explorer :filter="filter" v-model="models" url="/api/bicycles" method="post" >
        <template>
            <vm-text-input :name="$t('name')" v-model="filter.data.name"></vm-text-input>
        </template>
        <template slot="item">
            <vm-list-explorer-item :value="model" v-for="model in models" :key="model.id">
                <span v-text="model.id"></span> <span v-text="model.id"></span>
            </vm-list-explorer-item>
        </template>
    </vm-list-explorer>
</template>
<!--<style>-->

<!--</style>-->
<script>
    import vmTextInput from './inputs/vm-text-input.vue'
    import vmListExplorer from './list-explorer/vm-list-explorer.vue'
    import vmListExplorerItem from './list-explorer/vm-list-explorer-item.vue'

    import Filter from '../../../Services/FilterForm.js'


    export default {
        data(){
            return {
                filter: new Filter({
                    name: 'name',
                    title: 'title',
                }).setUrl('/api/bicycles').setMethod('post'),
                models:[],
            }
        },
        methods: {},
        components: {
            vmListExplorer,
            vmListExplorerItem,
            vmTextInput
        }
    }
</script>