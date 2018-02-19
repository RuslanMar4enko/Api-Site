<template>
    <div class="callout" :class="{'callout-info': canShowInfo, 'callout-warning':isWarning, 'callout-danger':isDanger}" @click="test">
        <p v-if="canShowInfo" v-text="text"></p>
        <p v-if="isWarning" v-text="$t('validation errors')"></p>
        <p v-if="isDanger" v-text="$t('woops there is some error on server')"></p>
    </div>
</template>
<!--<style>-->

<!--</style>-->
<script>
    import * as _ from 'lodash'
    export default {
        props: {
            text: {},
            isInfo: {
                "default": false
            },
            isWarning: {
                "default": false
            },
            isDanger: {
                "default": false
            },
            value: {
                required: true
            }
        },
        data(){
            return {
                form: {},
            }
        },
        computed:{
            canShowInfo(){
                return this.isInfo && !_.isEmpty(this.text) && !this.isWarning && !this.isDanger;
            }
        },
        methods:{
          test(){
              console.log(this.canShowInfo)
          }
        },
        created(){
            this.form = this.value
        }
    }
</script>