<template>
    <!-- Modal -->
    <div class="modal bs-example-modal-lg content-wrapper" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: block" v>
        <div class="modal-dialog modal-lg modal-dialog-nested" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"  @click="toggleDocument"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel"><slot name="title">title</slot></h4>
                </div>
                <div class="modal-body">
                    <slot>...</slot>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props:{

        },
        data(){
            return {
            }
        },
        methods:{
            toggleDocument(){
                this.$emit('on-close', false)
            }
        }
    }
</script>