<template>
    <div class="editor" v-html.once="html"></div>
</template>

<script>
    import MediumEditor from 'medium-editor'
    export default {
        data (){
            return {
                html: '',
                editor: null,
                result: null,
            }
        },
        props: ['value'],
        watch: {
            "value"(v){

                if (!v) {
                    this.editor.resetContent()
                }
                else if (this.result != v) {
                    this.editor.setContent(v)
                }

            }
        },
        mounted(){
            this.editor = new MediumEditor(this.$el, {placeholder: false}),

                this.html = this.value


            this.editor.subscribe('editableInput', () => {
                this.result = this.editor.getContent()
                this.$emit('input', this.result)
                this.$emit('on-input', this.result)
            });


        }
    }
</script>
<style lang="scss">

    .editor {
        height: auto;
        max-height: 200px;
        overflow-y: auto;
    }
</style>
<style scoped lang="scss">
    @import '~medium-editor/dist/css/medium-editor.css';
    @import '~medium-editor/dist/css/themes/beagle.css';

</style>