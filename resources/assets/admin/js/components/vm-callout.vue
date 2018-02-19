<template>
    <div v-show="isInfo||isWarning||isDanger||isSuccess" class="callout" :class="{'callout-info': canShowInfo, 'callout-warning':isWarning, 'callout-danger':isDanger, 'callout-success':propIsSuccess}">
        <p v-if="canShowInfo" v-text="text"></p>
        <p v-if="isWarning" v-text="$t('validation errors')"></p>
        <p v-if="isDanger" v-text="$t('woops there is some error on server')"></p>
        <p v-if="propIsSuccess" v-text="$t('Success')"></p>
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
            isSuccess: {
                "default": false
            },

        },
        watch:{
            "isSuccess"(value){
                let self = this;
                this.propIsSuccess = value;
                setTimeout(function () {
                    self.propIsSuccess = false
                }, 15000)
            }
        },
        data(){
            return {
                propIsSuccess: false,
            }
        },
        computed:{
            canShowInfo(){
                return this.isInfo && !_.isEmpty(this.text) && !this.isWarning && !this.isDanger && !this.propIsSuccess;
            },

        },
        methods:{

        },

    }
</script>