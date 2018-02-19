<template>
    <vue-multiselect
            :value="value"
            @input="$emit('input', $event)"
            label="title"
            track-by="id"
            placeholder="Type to search"
            :options="filter.data"
            :searchable="true"
            :loading="filter.ajax.isProcessing"
            :internal-search="false"
            :options-limit="100"

            @search-change="search"
            @open="initSearch"
            :limit-text="limitText"


            :multiple="true"
            :clear-on-select="false"
            :close-on-select="false"

    >
        <span slot="noResult">Oops! No results found.</span>
    </vue-multiselect>
</template>

<script>
    import vueMultiselect from 'vue-multiselect'

    import Filter from '../../../core/services/Filter'
    import Widget from '../../../core/models/Widget'
    import Pagination from '../../../core/services/Pagination'
    export default {
        components: {
            vueMultiselect
        },
        props: {
            value:{},

        },
        data(){
            return {
                filter: new Filter({
                    url: '/api/widgets/get-many',
                    query: {
                        title_like: null
                    },
                    data: [],
                    mapTo: Widget,
                    pagination: new Pagination({
                        per_page: null
                    })
                }),
            }
        },
        methods: {
            search(query) {
                this.filter.query.title_like = query
                this.filter.search({holding: true})
            },
            initSearch(query) {
                this.$emit('on-open')
                this.filter.search({holding: true})
            },
            limitText (count) {
                return `and ${count} other widgets`
            },
        },
    }
</script>