<template>
    <ul class="pagination pagination-sm inline">
        <li><span class="label label-default"><span>{{ pagination.page }}</span> / <span>{{ pagination.lastPage }}</span></span></li>
        <li :class="{'disabled': !canSubPage}"><a href="#" @click.prevent="subPage"><i class="fa fa-chevron-left"></i></a></li>
        <li :class="{'disabled': !canAddPage}"><a href="#" @click.prevent="addPage"><i class="fa fa-chevron-right"></i></a></li>
    </ul>
</template>

<script>
    export default {
        props: {
            value:{}
        },
        data(){
            return {
                pagination: {}
            }
        },
        created(){
            this.pagination = this.value
        },
        computed: {
            canAddPage(){
                return this.pagination.canAddPage
            },
            canSubPage(){
                return this.pagination.canSubPage
            },
        },
        methods: {
            addPage(){
                if(this.pagination.canAddPage){
                    this.pagination.addPage()
                    this.$emit('input', this.pagination)
                    this.$emit('add-page', this.pagination.page)
                }
            },
            subPage(){
                if(this.pagination.canSubPage){
                    this.pagination.subPage()
                    this.$emit('input', this.pagination)
                    this.$emit('sub-page', this.pagination.page)
                }
            },
        },
    }
</script>